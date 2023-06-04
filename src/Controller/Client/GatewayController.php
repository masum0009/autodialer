<?php
namespace App\Controller\Client;

use App\Controller\AppController;

/**
 * Gateway Controller
 *
 * @property \App\Model\Table\GatewayTable $Gateway
 *
 * @method \App\Model\Entity\Gateway[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GatewayController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients'],
            'order'=> ['Gateway.id' => 'DESC']
        ];

        $gateway = $this->Gateway->find('all')->where([
            'Gateway.client_id' => $this->request->getSession()->read('client_id')
        ]);//->orWhere(['Gateway.client_id' => 0]);

        $gateway = $this->paginate($gateway);
        $this->set('gateways', $gateway);
    }

    /**
     * View method
     *
     * @param string|null $id Gateway id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function view($id = null)
    {
        $gateway = $this->Gateway->get($id, [
            'contain' => ['Users', 'Campaigns'],
        ]);

        $this->set('gateway', $gateway);
    }
    */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gateway = $this->Gateway->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['client_id'] = $this->request->getSession()->read('client_id');
            $gateway = $this->Gateway->patchEntity($gateway,$data);
            if ($this->Gateway->save($gateway)) {
                $this->Flash->success(__('The gateway has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gateway could not be saved. Please, try again.'));
        }
        $this->set(compact('gateway'));
        $this->set('codecs',$this->Gateway->getCodecs());
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Gateway id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gateway = $this->Gateway->find()->where([
            'id' => $id,
            'client_id' => $this->request->getSession()->read('client_id')
        ])->first();

        if(!$gateway)
            return $this->redirect(['action' => 'index']);
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $gateway = $this->Gateway->patchEntity($gateway, $this->request->getData());
            if ($this->Gateway->save($gateway)) {
                $this->Flash->success(__('The gateway has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gateway could not be saved. Please, try again.'));
        }
        $this->set(compact('gateway'));
        $this->set('codecs',$this->Gateway->getCodecs());
    }

    /**
     * Delete method
     *
     * @param string|null $id Gateway id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gateway = $this->Gateway->find()->where([
            'id' => $id,
            'client_id' => $this->request->getSession()->read('client_id')
        ])->first();

        if(!$gateway)
            return $this->redirect(['action' => 'index']);

        
        if ($this->Gateway->delete($gateway)) {
            $this->Flash->success(__('The gateway has been deleted.'));
        } else {
            $this->Flash->error(__('The gateway could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
