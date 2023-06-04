<?php 

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;

class DashboardController extends AppController{

    public function index(){

        return $this->redirect(['controller' => 'clients', 'action' => 'index']);
    }

}