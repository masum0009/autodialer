<?php
  define('DS','/');
 $file = '/var/www/html/autodialer/webroot/files/uploads/audio/1636886133588-voicem-14-11-2021-1636886623294.wav';
                if(file_exists($file)){
                    //$this->output("File conveting $file...");
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