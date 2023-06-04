<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    
    public function beforeFilter(Event $event) {
        //  Parent_::beforeFilter();

        if(isset($this->request->params['prefix']) == false)
            return $this->redirect(['controller' => 'auth', 'action' => 'login', 'prefix' => 'admin']);

        $prefix = $this->request->params['prefix'];
        $session = $this->request->getSession();
    
        $current_controller_action = $this->request->controller."@".$this->request->action;
        $allow          = ['Auth@login'];
    
        
        if(!$session->read('logged_in') && !in_array($current_controller_action, $allow))
            return $this->redirect(['controller' => 'auth', 'action' => 'login']);

        if($session->read('logged_in') && in_array($current_controller_action, $allow))
            return $this->redirect(['controller' => 'dashboard', 'action' => 'index', 'prefix' => $session->read('role')]);

        if($session->read('logged_in') && strtolower($prefix) !=  $session->read('role'))
            return $this->redirect(['controller' => 'dashboard', 'action' => 'index', 'prefix' => $session->read('role')]);

      }
    

}
