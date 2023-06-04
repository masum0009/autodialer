<?php
namespace App\Controller\Admin;

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
            $Users = TableRegistry::getTableLocator()->get('Users');
            $session = $this->request->getSession();

            $data = $this->request->getData();
            $username = $data['username'];
            $password = $data['password'];
//            $remember = $data['remember'];
//            dd(md5('123456789'));

            $user = $Users->find()->where(['username'=>$username, 'password' => md5($password)])->first();

            if($user){
                if($user->status == 1){

                    $session->write([
                        'logged_in' => true,
                        'user' => $user,
                        'user_id' => $user->id,
                        'role' => 'admin'
                    ]);

                    $this->Flash->success(__('You are successfully logged in.'));
                    // if($user->role == 2 )
                    //     return $this->redirect("/client");
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
