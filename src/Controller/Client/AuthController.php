<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Auth Controller
 *
 *
 * @method \App\Model\Entity\Auth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{


    function beforeRender(Event $event){
        $this->viewBuilder()->setLayout('auth');
    }

    public function login(){
        
        if($this->request->is('post')){
            $Clients = TableRegistry::getTableLocator()->get('Clients');
            $session = $this->request->getSession();

            $data = $this->request->getData();
            // pr($data);
            // die();
            $username = $data['username'];
            $password = $data['password'];
            // $remember = $data['remember'];
            // dd(md5('123456789'));

            $client = $Clients->find()->where(['username'=>$username, 'password' => md5($password)])->first();

            if($client){
                if($client->active == 1){

                    $session->write([
                        'logged_in' => true,
                        'client' => $client,
                        'client_id' => $client->id,
                        'role' => 'client'
                    ]);

                    $this->Flash->success(__('You are successfully logged in.'));
                    return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
                }else{
                    $this->Flash->error(__('Your account has been disabled.'));
                }
            }else{
                $this->Flash->error(__('username or password wrong.'));
            }
        }
        
    }
    
    public function logout(){
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect(['controller' => 'auth', 'action' => 'login']);
    }

}
