<?php
namespace App\Shell;

use Cake\Cache\Cache;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use DateTime;
use Exception;
use Cake\Core\Configure;

class CronShell extends Shell {
    function output($resp){
       $date = new DateTime();
       $date = $date->format("y:m:d H:i:s");
       $this->out($date . " " . $resp);  
    }
    
    public function main() {        
        $this->output('cron starting' );
        while(1){
          $this->covertG729();
          $this->sendSMS();
          $this->callScheduleIn();
          $this->callScheduleOut();
          $this->callCompleted();
          sleep(60);
        }
        $this->output('cron completed' );
    }
    
    public function callScheduleIn()
    {
        // $this->out("Calling callscheduleIn method");
        date_default_timezone_set('Asia/Dhaka');
        $date = new DateTime();
        $currentDate = $date->format('Y-m-d');
        $currentTime = $date->format('H:i:s');
        $currentDay = $date->format('D');

        
        $Campaigns = TableRegistry::getTableLocator()->get('Campaigns');
		
        
        $campaigns = $Campaigns->find('all')->where([
            'Campaigns.start_at <=' => $currentDate,
            'Campaigns.finished_at >=' => $currentDate,
            'Campaigns.daily_start_time <=' => $currentTime,
            'Campaigns.daily_stop_time >=' => $currentTime,
            'Campaigns.weekdays like' => '%'.$currentDay.'%',  
            'Campaigns.status' => 1,
        ])->all();

        
        foreach ($campaigns as $key => $campaign) {
            $campaign->status = 2;
            if(!$Campaigns->save($campaign)){
                $this->output('Campaign status Could not update');
            }
        }
    }
    
    public function callScheduleOut()
    {
        // $this->out("Calling callscheduleOut method");
        date_default_timezone_set('Asia/Dhaka');
        $date = new DateTime();
        $currentDate = $date->format('Y-m-d');
        $currentTime = $date->format('H:i:s');
        $currentDay = $date->format('D');
        
        $Campaigns = TableRegistry::getTableLocator()->get('Campaigns');
        $campaigns = $Campaigns->find('all', array(
            
            'conditions' => array(
                'Campaigns.status' => 2,
                    'OR'=>array(
                        'Campaigns.finished_at <' => $currentDate,
                        'Campaigns.daily_start_time >=' => $currentTime,
                        'Campaigns.daily_stop_time <=' => $currentTime,
                        'Campaigns.weekdays not like' => '%'.$currentDay.'%',
                    )
        
            )
        
        ))->all();
        

        foreach ($campaigns as $key => $campaign) {
            $campaign->status = 1;
            if(!$Campaigns->save($campaign)){
                $this->output('Campaign status Could not update');
            }
        }
      
    }


    public function callCompleted()
    {
        // $this->out("Calling callCompleted method");
        $Calls  = TableRegistry::getTableLocator()->get('Calls');
        $Campaigns  = TableRegistry::getTableLocator()->get('Campaigns');
        $campaigns = $Calls->find('all')->contain(['Campaigns'])->distinct(['Calls.campaign_id'])->all();

        foreach( $campaigns as $cam){
      
            $count = $Calls->find('all')->where([
                'campaign_id' => $cam->campaign_id,
                'call_duration' => 0,
                'retry_count <' => $cam->campaign->max_call_retry
            ])->count();
            
            if($count == 0){
                $campaign = $Campaigns->get($cam->campaign_id);
                $campaign->status = 6;
                if(!$Campaigns->save($campaign))
                    $this->output("Campaign status could not be changed");
            }
        
        }
    }

    public function sendSMS(){
        // $this->out("Calling send sms method");
        $Calls  = TableRegistry::getTableLocator()->get('Calls');
        $Actions = TableRegistry::getTableLocator()->get("Actions");

        $sms_call = $Calls->find('all')->where([
            'event_received'    => 1,
            'call_action_type'  => 1,
            'call_action_status'=> 0
        ])->all();

        foreach($sms_call as $call){
            $action = $Actions->find('all')->where([
                'Actions.campaigns_id'  => $call->campaign_id,
                'Actions.client_id'     => $call->client_id,
                'Actions.key_press'     => $call->call_action_key
            ])->first();

            if($action){
                
                $sms = $this->gateway($call->contact_number, $action->action_data);
                if($sms){
                    $call->call_action_status = $this->smsCount($action->action_data);
                    $Calls->save($call);
                }
            }
        }

        $sms_call = $Calls->find('all')->where([
            'Calls.call_status'    => 4,
            'Calls.call_duration > '  => 0,
            'Calls.call_action_status'=> 0,
            'Campaigns.sms IS NOT ' => NULL 
        ])->contain(['Campaigns'])->all();
        //$this->out($sms_call->count());
        foreach($sms_call as $call){
            //  pr($call);
            if(!empty($call->campaign->sms)){
                $sms = $this->gateway($call->contact_number, $call->campaign->sms);
                if($sms){
                    $call->call_action_status = $this->smsCount($call->campaign->sms);;
                    $Calls->save($call);
                    $this->output("sms sent to {$call->contact_number}");
                }
            }
        }
    }

    public function gateway($contact, $content, $content_type = "text"){
        $this->output($contact);
        $url = "http://portal.metrotel.com.bd/smsapi";
        $data = [
            "api_key" => "C200095660b4d17c52d4d8.97195620",
            "type" => $content_type,
            "contacts" => $contact,
            "senderid" => "8809612441571",
            "msg" => $content,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        // var_dump($response);
        return $response;
    }

    public function covertG729(){
        $files = array();
        $run_rsync = false;

        if($jobs = Cache::read('files'))
            $files = $jobs;
        
        
        while(count($files)){
            $run_rsync = true;
            try{
                $file = array_pop($files);
                if(file_exists($file)){
                    $this->output("File conveting $file...");
                    $pathinfo = pathinfo($file);                                        
                    
                    if($pathinfo['extension'] == "mp3"){
                        $wav_file =  substr($file,0,-3) . "wav";
                        $cmd = "lame --decode  $file $wav_file";
                        echo "exec $cmd \n";                        
                        $output = shell_exec($cmd);
                        $file = $wav_file;
                    }
                    
                    $converted =  $pathinfo['dirname'] . DS . 'converted' . DS . $pathinfo['filename']; 
                    
                    $cmd =  " sox $file -r 8k -c 1 $converted" . ".wav";
                    echo "exec $cmd \n";   
                    $output = shell_exec($cmd);
                    
                    $cmd = "rasterisk -x 'file convert " . $converted . ".wav" .  "  $converted" . ".ulaw'";   
                    echo "exec $cmd \n";                  
                    $output = shell_exec($cmd);
                    
                    $cmd = "rasterisk -x 'file convert " .$converted . ".wav" .  "  $converted" . ".alaw'";   
                    echo "exec $cmd \n";                  
                    $output = shell_exec($cmd);
                    
                    $cmd = "rasterisk -x 'file convert " .$converted . ".wav" .  "  $converted" . ".g729'";   
                    echo "exec $cmd \n";                  
                    $output = shell_exec($cmd);
                    
                }
            }
            catch(Exception $e){
                $this->output('G729 file could not be converted' );
            }
            
        }
        $files = Cache::write('files', $files);

        if($run_rsync){
            $this->output("rsyncing...");
            $cmd = Configure::read('audio_rsync_cmd');    //'rsync -e "ssh -p 3322" -azvh /var/www/html/autodialer/webroot/files/uploads/ root@182.160.112.145:/root/autodialer/audio';
            // $cmd = "ls";
            if(!empty($cmd)) $output = exec($cmd);
            $cmd =  'chmod -R 0777 /var/www/html/autodialer/logs/ /var/www/html/autodialer/tmp/';
            shell_exec($cmd);
            $this->output($output);
        }
        
    }



    private function type($string){
        return (strlen($string) != strlen(utf8_decode(($string)))) ? "unicode" : "text";
    }

    private function smsCount($string){
        $len = strlen($string);
        $per_sms = 160;

        if ($len != strlen(utf8_decode($string)) && $len <= 70 ){
            $per_sms = 70;
        }
        else if($len != strlen(utf8_decode($string)) && $len > 70 ){
            $per_sms = 67;
        }
        else if($len > 160){
            $per_sms = 153;
        }
        else{
            $per_sms = 160;
        }

        return ceil( $len / $per_sms);
    }

    private function filterPhone($number){
        $number = preg_replace('/[^0-9]/', '', $number);
        $first_three_char = substr($number, 0, 3);

        $formats = ['880', '+88'];
        if(in_array($first_three_char, $formats) == false)
            return substr($number,0, 1) == 0 ? '+88' . $number : '+880' . $number;
        
        return $number;
    }
    
}