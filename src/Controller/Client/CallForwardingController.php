<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CallForwarding Controller
 *
 * @property \App\Model\Table\CallForwardingTable $CallForwarding
 *
 * @method \App\Model\Entity\CallForwarding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CallForwardingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function index($campaign_id = null)
    {
        $Campaigns  = TableRegistry::getTableLocator()->get('Campaigns');
        $campaign   = $Campaigns->find('all')->where(['id' => $campaign_id])->first();

        $callForwarding = $this->CallForwarding->find('all')->where(['CallForwarding.campaigns_id' => $campaign->id])->orderDesc('CallForwarding.id');
        
        $callForwarding = $this->paginate($callForwarding);

        $callstatus = array(
            0 => 'Not Start',
            1 => 'Trying',
            2 => 'Ringing',
            3 => 'Calling',
            4 => 'Received'
        );
        $this->set('callstatus', $callstatus);
        $this->set(compact('callForwarding', 'campaign'));
    }



    /**
     * View method
     *
     * @param string|null $id Call Forwarding id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callForwarding = $this->CallForwarding->get($id, [
            'contain' => ['Clients', 'Campaigns', 'Gateway'],
        ]);

        $this->set('callForwarding', $callForwarding);
    }

    /**
     * Delete method
     *
     * @param string|null $id Call Forwarding id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callForwarding = $this->CallForwarding->get($id);
        if ($this->CallForwarding->delete($callForwarding)) {
            $this->Flash->success(__('The call forwarding has been deleted.'));
        } else {
            $this->Flash->error(__('The call forwarding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
