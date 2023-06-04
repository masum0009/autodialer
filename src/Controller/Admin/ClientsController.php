<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */


    
    public function index()
    {
        $clients = $this->paginate($this->Clients, ['order' => ['Clients.id' => 'desc']]);
        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
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
                        $data['call_forwarding_to'] = $data['phone'];
                        $data['password'] = md5($data['password']);

                        $client = $this->Clients->patchEntity($client, $data);
                        if ($this->Clients->save($client)) {
                            $this->Flash->success(__('The user has been saved.'));
                            return $this->redirect(['action' => 'index']);
                        }else{
                            $this->Flash->error(__('The user could not be saved. Please, try again.'));
                            pr($client->errors());
                            die();
                        }
                                
                    }
                    else
                        $this->Flash->error("There was some thing wrong. file could not be uploaded");
                }
                else
                    $this->Flash->error("Invalid file extension. only supported jpg, png, gif format");
            }
            else
                $this->Flash->error("Select a valid file. file could not be empty");
        }

        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
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
                        return $this->redirect(["action" => "edit", $id]);
                    }

                }
                else{
                    $this->Flash->error("Invalid file extension. only supported jpg, png, gif format");
                    return $this->redirect(["action" => "edit", $id]);
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
            $client = $this->Clients->patchEntity($client, $data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The Client has been saved.'));
                return $this->redirect(['action' => 'index']);

            }else{
                pr($client->errors());
                die();
                // $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
                
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);

        $upload_dir_path = WWW_ROOT . "files" . DS . "uploads" . DS . "profiles";
        if(isset($client->image) && file_exists($upload_dir_path . DS . $client->image))
            unlink($upload_dir_path . DS . $client->image);
        
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

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
