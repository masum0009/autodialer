<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Client Controller
 *
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function edit()
    {
        $Clients = TableRegistry::getTableLocator()->get('Clients');
        $client_id  =  $this->request->getSession()->read('client_id'); 
        $client  = $Clients->find('all')->where(['Clients.id' => $client_id])->first();
        
        if(!$client)
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            // pr($data);
            // die();

            if(isset($data['image']) && $_FILES['image']['size'] !== 0) {
                $filename   = $data['image']['name'];
                $valid_ext  =  ["jpg", "jpeg", "png", "gif"];
                $ext        = $this->extension($filename);
            
                if(in_array($ext, $valid_ext) == true){
                    $filename = $this->filename($filename). "." . $ext;
                    $upload_dir_path = WWW_ROOT . "files" . DS . "uploads" . DS . "profiles";
                    if(!file_exists($upload_dir_path))
                        mkdir($upload_dir_path, 0777, true);

                    if (move_uploaded_file($data['image']['tmp_name'], $upload_dir_path . DS . $filename)){
                        $data['profileimage'] = $filename;
                        if(empty($client->image) == false && file_exists($upload_dir_path . DS . $client->image))
                            unlink($upload_dir_path . DS . $client->image);

                    }
                    else{
                        $this->Flash->error("There was some thing wrong. file could not be uploaded");
                        return $this->redirect(["controller" => "Client", "action" => "index"]);
                    }

                }
                else{
                    $this->Flash->error("Invalid file extension. only supported jpg, png, gif format");
                    return $this->redirect(["controller" => "Client", "action" => "index"]);
                }
                    
            }else
                $data['profileimage'] = $client->profileimage;
                

            
            if(isset($data['password']) && empty($data['password']) === false )
            {
                $data['password'] = md5($data['password']);
            }
            else
                $data['password'] = $client->password;

            $data['call_forwarding_to'] = $data['phone'];
            $client = $Clients->patchEntity($client, $data);
            if ($Clients->save($client)) {
                $this->Flash->success(__('The Client has been saved.'));
                return $this->redirect(['action' => 'edit']);

            }else{
                pr($client->errors());
                die();
                // $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
                
        }
        $this->set(compact('client'));
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
