<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CallbackHistory Controller
 *
 * @property \App\Model\Table\CallbackHistoryTable $CallbackHistory
 *
 * @method \App\Model\Entity\CallbackHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CallbackHistoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $call_histries = $this->CallbackHistory->find('all',
            [
                'order' => 'CallbackHistory.created DESC'   
            ])
            ->where(['CallbackHistory.client_id' => $this->request->getSession()->read('client_id') ])->contain(['Clients']); // Need to add Iptsp model in contain
        
        if( $this->request->is('post')){
            $data           = $this->request->getData();
            if( isset($data['call_from']) && !empty($data['call_from']))
                $call_histries->where(['CallbackHistory.call_from' => $data['call_from']]);
            
            if(isset($data['call_status_id']) && $data['call_status_id'] != '')
                $call_histries->where(['CallbackHistory.call_status' => $data['call_status_id']]);

        }
        
        $call_histries = $this->paginate($call_histries);

        $callstatus = array(
            /*0 => 'Not Start',
            1 => 'Trying',
            2 => 'Ringing',*/
			0 => 'Missed call',
            1 => 'Received call'
            
        );
        $this->set('callstatus', $callstatus);
        $this->set(compact('call_histries'));
    }

    public function update(){
        $Iptsp = TableRegistry::getTableLocator()->get("Iptsp");
        $client_id = $this->request->getSession()->read('client_id');

        $iptsp = $Iptsp->find('all')->where(['Iptsp.client_id' => $client_id])->first();

        if(!$iptsp){
            $this->Flash->error('Please contact admin to add call forwarding number option enable');
            return $this->redirect(array('action' => 'index'));
        }

        if($this->request->is('post')){
            $forwarding_number = $this->request->getData('forwarding_number');
            $iptsp->forwarding_number = $forwarding_number;
            if($Iptsp->save($iptsp)){
                $this->Flash->success('Call Forwarding Number has been changed');
            }
            else
                $this->Flash->success('Call Forwarding Number could not be changed');
        }

        $this->set('forwarding_number', $iptsp->forwarding_number);
    }

    /**
     * View method
     *
     * @param string|null $id Callback History id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callbackHistory = $this->CallbackHistory->get($id, [
            'contain' => ['Users', 'Iptsps'],
        ]);

        $this->set('callbackHistory', $callbackHistory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callbackHistory = $this->CallbackHistory->newEntity();
        if ($this->request->is('post')) {
            $callbackHistory = $this->CallbackHistory->patchEntity($callbackHistory, $this->request->getData());
            if ($this->CallbackHistory->save($callbackHistory)) {
                $this->Flash->success(__('The callback history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The callback history could not be saved. Please, try again.'));
        }
        $users = $this->CallbackHistory->Users->find('list', ['limit' => 200]);
        $iptsps = $this->CallbackHistory->Iptsps->find('list', ['limit' => 200]);
        $this->set(compact('callbackHistory', 'users', 'iptsps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Callback History id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callbackHistory = $this->CallbackHistory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callbackHistory = $this->CallbackHistory->patchEntity($callbackHistory, $this->request->getData());
            if ($this->CallbackHistory->save($callbackHistory)) {
                $this->Flash->success(__('The callback history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The callback history could not be saved. Please, try again.'));
        }
        $users = $this->CallbackHistory->Users->find('list', ['limit' => 200]);
        $iptsps = $this->CallbackHistory->Iptsps->find('list', ['limit' => 200]);
        $this->set(compact('callbackHistory', 'users', 'iptsps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Callback History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callbackHistory = $this->CallbackHistory->get($id);
        if ($this->CallbackHistory->delete($callbackHistory)) {
            $this->Flash->success(__('The callback history has been deleted.'));
        } else {
            $this->Flash->error(__('The callback history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
