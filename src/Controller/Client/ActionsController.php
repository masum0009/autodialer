<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use stdClass;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 *
 * @method \App\Model\Entity\Action[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController
{
    protected $key_press = [
        0 => 'Press 0',
        1 => 'Press 1',
        2 => 'Press 2',
        3 => 'Press 3',
        4 => 'Press 4',
        5 => 'Press 5',
        6 => 'Press 6',
        7 => 'Press 7',
        8 => 'Press 8',
        9 => 'Press 9'
    ];

    protected $actionList = [
        0 => 'Transfer call to Agent',
        1 => 'Sent SMS',
        2 => 'Text Action'
    ];


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($campaign_id  = null)
    {
 
        if($campaign_id == null) 
            return $this->redirect(['controller' => 'Campaigns', 'action' => 'index']);


        $client_id = $this->request->getSession()->read('client_id');
        $actions = $this->Actions->find('all')->where([ 
            'Actions.client_id' => $client_id,
            // 'Actions.campaigns_id' => $campaign_id
        ])->orderDesc('Actions.id');

        if($campaign_id != null)
            $actions->where(['Actions.campaigns_id' => $campaign_id]);
            
        $Calls = TableRegistry::getTableLocator()->get('Calls');
        $Campaign = TableRegistry::getTableLocator()->get('Campaigns');
        $campaign = $Campaign->get($campaign_id);

        // Default connection 
        $con = ConnectionManager::get('default');
        $sql = "SELECT call_action_key, COUNT(*) FROM calls WHERE campaign_id = '$campaign_id' AND event_received = '1' GROUP BY  call_action_key";
        $stmt = $con->execute($sql);
        $call_received_action_keys = $stmt->fetchAll();

        
        $this->set('cid', $campaign_id);
        $this->set(compact('campaign','actions', 'call_received_action_keys'));
        $this->set("actionList", $this->actionList);
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($campaign_id = null, $id = null)
    {
        if($campaign_id === null || $id === null)
            $this->redirect(['controller' => 'campaigns', 'action' => 'index']);

        $this->layout = "ajax";

        $action = $this->Actions->find('all')->where(['id' => $id])->first();

        if(!$action)
            $this->redirect(['controller' => 'campaigns', 'action' => 'index']);


        $Campaigns = TableRegistry::getTableLocator()->get('Campaigns');
        $Calls = TableRegistry::getTableLocator()->get('Calls');

        $campaign = $Campaigns->find('all')->where(['id' => $campaign_id])->first();

        if(!$campaign)
            $this->redirect(['controller' => 'campaigns', 'action' => 'index']);

        
        $calls = $Calls->find('all')->where([
            'Calls.campaign_id' => $campaign_id,
            'Calls.call_action_key' => $action->key_press
        ])->contain(['Contacts'])->all();
        
        $this->set('actionList', $this->actionList);
        $this->set(compact('action', 'campaign', 'calls'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($cid = null)
    {
        if($cid == null)
            return $this->redirect(['controller' => 'Campaigns', 'action' => 'index']);

        $exists_keys = $this->Actions->find('list',
        [
            'keyField' => 'id',
            'valueField' => 'key_press'
        ])->where(['Actions.campaigns_id' => $cid])->toArray();

        foreach($exists_keys as $key)
            unset($this->key_press[$key]);
        
        $Gateway = TableRegistry::getTableLocator()->get('Gateway');
        $client_id = $this->request->getSession()->read('client_id');

        $action = $this->Actions->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $action_exist = $this->Actions->find('all')->where([
                'Actions.key_press' => $data['key_press'],
                'Actions.campaigns_id' => $data['campaigns_id']
            ])->count();
            if($action_exist > 0){
                $this->Flash->error('The Key already set in the Campaign.');
                return $this->redirect(['action' => 'add', $data['campaigns_id']]);
            }


            if($data['action'] == 0){
                $data['action_data'] = implode(',', $data['data']);
            }

            if($data['action'] == 2 || $data['action'] == 1) $data['action_data'] = $data['data_field'];

            $data['client_id'] = $this->request->getSession()->read('client_id');

            $action = $this->Actions->patchEntity($action, $data);
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));
                return $this->redirect(['action' => 'index', $cid]);
            }

            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $campaigns = $this->Actions->Campaigns->find('list', ['limit' => 200]);
        $gateway = $Gateway->find('list',
        [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->where(['Gateway.client_id' => $client_id ]); //->orWhere(['Gateway.created_by_admin' => 1]);
        $this->set("key_press", $this->key_press);
        $this->set('cid', $cid);
        $this->set("actionList", $this->actionList);
        $this->set(compact('action', 'campaigns', 'gateway', 'exists_keys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $cid = null)
    {
        $client_id = $this->request->getSession()->read('client_id');
        $action = $this->Actions->find('all')->where([
            'Actions.id'            => $id,
            'Actions.campaigns_id'  => $cid,
            'Actions.client_id'     => $client_id
        ])->first();


        if(!$action){
            $this->Flash->error('You have no permission to update others action');
            return $this->redirect(['action' => 'index']);
        }

        $exists_keys = $this->Actions->find('list',
        [
            'keyField' => 'id',
            'valueField' => 'key_press'
        ])->where(['Actions.campaigns_id' => $cid])->toArray();

        foreach($exists_keys as $key){
            if($action->key_press != $key)
                unset($this->key_press[$key]);
        }
            
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['client_id']  = $client_id;

            $action_exist = $this->Actions->find('all')->where([
                'Actions.key_press' => $data['key_press'],
                'Actions.campaigns_id' => $data['campaigns_id'],
                'Actions.id != ' => $id
            ])->count();
            
            if($action_exist > 0){
                $this->Flash->error('The Key already set in the Campaign.');
                return $this->redirect(['action' => 'edit', $id, $cid]);
            }

            
            if($data['action'] == 0)
                $data['action_data'] = implode(',', $data['data']);
            
            else if($data['action'] == 2 || $data['action'] == 1) 
                $data['action_data'] = $data['data_field'];
        
            else
                $data['action_data'] = "";

  
            $action = $this->Actions->patchEntity($action, $data);
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));
              
                return $this->redirect(['controller' => 'Actions', 'action' => 'index', $cid]);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $campaigns = $this->Actions->Campaigns->find('list', ['limit' => 200]);
        $Gateway = TableRegistry::getTableLocator()->get('Gateway');
        $gateway = $Gateway->find('list',
        [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->where(['Gateway.client_id' => $client_id ]);//->orWhere(['Gateway.created_by_admin' => 1]);

        $this->set('cid', $cid);
        $this->set("key_press", $this->key_press);
        $this->set("actionList", $this->actionList);
        $this->set(compact('action', 'campaigns', 'gateway'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $campaign_id = null)
    {
     
        $this->request->allowMethod(['post', 'delete']);
        $client_id = $this->request->getSession()->read('client_id');
        $action = $this->Actions->find('all')->where([
            'Actions.id'            => $id,
            'Actions.campaigns_id'  => $campaign_id,
            'Actions.client_id'     => $client_id
        ])->first();

        if(!$action){
            $this->Flash->error('You have no permission to delete others action');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Actions->delete($action)) {
            $this->Flash->success(__('The action has been deleted.'));
        } else {
            $this->Flash->error(__('The action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $campaign_id]);
    }
}
