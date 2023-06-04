<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Exception;

/**
 * Audios Controller
 *
 * @property \App\Model\Table\AudiosTable $Audios
 *
 * @method \App\Model\Entity\Audio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AudiosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $old_path = getcwd();
        // pr($old_path);

        // chdir(WWW_ROOT . "files" . DS . "uploads" .DS);
        // pr(getcwd());
        // $output = exec("sh /var/www/html/autodialer/webroot/files/uploads/script.sh");
        // pr($output);
        // $g729Path = substr($filepath,0,-3) ."g729";
        // $output = shell_exec("./script.sh {$new_filepath} {$g729Path}");
        // chdir($old_path);
        // pr(getcwd());
        // die();


        $audios = $this->Audios->find('all')->where([
            'Audios.client_id' => $this->request->getSession()->read('client_id')
        ])->orderDesc('Audios.id')->all();
        
        $this->set(compact('audios'));
    }

    /**
     * View method
     *
     * @param string|null $id Audio id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $audio = $this->Audios->get($id, [
            'contain' => ['Clients'],
        ]);

        $this->set('audio', $audio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client_id = $this->request->getSession()->read('client_id');
        $audio = $this->Audios->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if(isset($data['file']) && $_FILES['file']['size'] !== 0) {
                $filename   = $data['file']['name'];
                $ext        = $this->extension($filename);


                if($ext == "wav" || $ext == "mp3"){
                
                    $filename = $this->filename($filename). "." . $ext;
                    $upload_dir_path = WWW_ROOT . "files" . DS . "uploads" . DS . "audio";
                    $filepath = $upload_dir_path . DS . $filename;
                    if(!file_exists($upload_dir_path))
                        mkdir($upload_dir_path, 0777, true);

                       
                    if (move_uploaded_file($data['file']['tmp_name'], $filepath)){
                      /*  if($ext == "mp3"){
                            $cmd = " lame --decode  $filepath " . substr($filepath,0,-3) . "wav";
                            $filepath = substr($filepath,0,-3) . "wav";
                            $output = shell_exec($cmd);
                        } 
                    
                        $exts = [
                            'ul' => 'ulaw',
                            'al' => 'alaw'
                        ];

                        foreach($exts as $key => $ext){
                            try{
                                $new_filepath = substr($filepath,0,-3) . $ext;
                                $cmd = "sox -V {$filepath} -r 8000 -c 1 -t {$key} {$new_filepath}";
                                // pr($cmd);
                                $output = shell_exec($cmd);
                                // pr($output);
                            }
                            catch(Exception $e){ 
                                $this->Flash->error("{$ext} file can not converted, please try again");
                             }
                        }
                        */
                        
                        if(file_exists($filepath)){
                            $file_jobs = array();
                            $files = Cache::read('files');
                            if($files)
                                $file_jobs = $files;

                            $file_jobs[] = $filepath;
                            Cache::write('files', $file_jobs);

                            // try{
                               

                                //$old_path = getcwd();
                                //chdir(WWW_ROOT . "files" . DS . "uploads" .DS);
                                //$g729Path = substr($filepath,0,-3) ."g729";
                                //$output = shell_exec("./script.sh {$new_filepath} {$g729Path}");
                                //chdir($old_path);

                                // $cmd = "rasterisk -x 'file convert " .$new_filepath . " " . substr($filepath,0,-3) ."g729'";

                                // $output=null;
                                // $retval=null;
                                // exec($cmd, $output, $retval);
                                // $output = shell_exec($cmd);
                                //pr($output); 
                            // }
                            // catch(Exception $e){
                            //     $this->Flash->error("g729 file can not converted, please try again");
                            // }
                        }
                            
                 
                        $data['filename'] = $filename;
                        $data['client_id'] = $client_id;
                        
                        $audio = $this->Audios->patchEntity($audio,$data);
                        if ($this->Audios->save($audio)) {
                            $this->Flash->success(__('The audio has been saved.'));

                            return $this->redirect(['action' => 'index']);
                        }
                        else
                            $this->Flash->error(__('The audio could not be saved. Please, try again.'));
                    }
                    else 
                        $this->Flash->error('File could not be uploaded');
                }
                else
                    $this->Flash->error("Invalid file extension. only supported wav format");
                
            }
        }
        $clients = $this->Audios->Clients->find('list', ['limit' => 200]);
        $this->set(compact('audio', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Audio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $audio = $this->Audios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $audio = $this->Audios->patchEntity($audio, $this->request->getData());
            if ($this->Audios->save($audio)) {
                $this->Flash->success(__('The audio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audio could not be saved. Please, try again.'));
        }
        $clients = $this->Audios->Clients->find('list', ['limit' => 200]);
        $this->set(compact('audio', 'clients'));
    }
    
    public function refreash($id = null)
    {
         $audio = $this->Audios->get($id, [
            'contain' => [],
        ]);
       // pr($audio);
        $upload_dir_path = WWW_ROOT . "files" . DS . "uploads" . DS . "audio";
        $filepath = $upload_dir_path . DS . $audio->filename;
        //die($filepath);
        Cache::write('files',[$filepath]);
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Audio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client_id = $this->request->getSession()->read('client_id');
        $audio = $this->Audios->get($id);

        foreach(["mp3","wav", "ulaw", "alaw", "g729"] as $ext){
            $filename = explode('.', $audio->filename)[0] . "." . $ext;
            // pr($filename);
            if(file_exists('files/uploads/audio/'.$filename ))
                unlink('files/uploads/audio/'. $filename);
             if(file_exists('files/uploads/audio/converted/'.$filename ))
                unlink('files/uploads/audio/converted/'. $filename);    
        }

        // die();
        if ($this->Audios->delete($audio)) 
            $this->Flash->success(__('The audio has been deleted.'));
        else 
            $this->Flash->error(__('The audio could not be deleted. Please, try again.'));
        

        return $this->redirect(['action' => 'index']);
    }


    private function clean($string) {
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

    private function filename($str = null){
        $str = $this->clean(strtolower($str));
        $milliseconds = round(microtime(true) * 1000);
        $now = date('d-m-Y')."-".$milliseconds;
        return substr($str,0,20)."-".$now;
    }

    private function path($path){
        $path = str_replace('/',DS,$path);
        $path = substr($path,0,1) == '\\' ? substr($path, 1) : $path;
        return WWW_ROOT.$path;
    }
    private function extension($path){
        return strtolower(pathinfo($path, PATHINFO_EXTENSION));
    }
}
