<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Iptsp Controller
 *
 * @property \App\Model\Table\IptspTable $Iptsp
 *
 * @method \App\Model\Entity\Iptsp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IptspController extends AppController
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
        ];
        $iptsps = $this->paginate($this->Iptsp);

        $this->set(compact('iptsps'));
    }

    /**
     * View method
     *
     * @param string|null $id Iptsp id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $iptsp = $this->Iptsp->get($id, [
            'contain' => ['Clients', 'CallbackHistory'],
        ]);

        $this->set('iptsp', $iptsp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $iptsp = $this->Iptsp->newEntity();
        if ($this->request->is('post')) {
            
            // pr($this->request->getData());
            // die();

            $iptsp = $this->Iptsp->patchEntity($iptsp, $this->request->getData());
            if ($this->Iptsp->save($iptsp)) {
                $this->Flash->success(__('The iptsp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iptsp could not be saved. Please, try again.'));
            
        }
        $clients = $this->Iptsp->Clients->find('list', 
        [
            'keyField'      => 'id',
            'valueField'    => 'fullname'
        ]);
        $this->set(compact('iptsp', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Iptsp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $iptsp = $this->Iptsp->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $iptsp = $this->Iptsp->patchEntity($iptsp, $this->request->getData());
            if ($this->Iptsp->save($iptsp)) {
                $this->Flash->success(__('The iptsp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iptsp could not be saved. Please, try again.'));
        }
        
        $clients = $this->Iptsp->Clients->find('list', 
        [
            'keyField'      => 'id',
            'valueField'    => 'fullname'
        ]);
        $this->set(compact('iptsp', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Iptsp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $iptsp = $this->Iptsp->get($id);
        if ($this->Iptsp->delete($iptsp)) {
            $this->Flash->success(__('The iptsp has been deleted.'));
        } else {
            $this->Flash->error(__('The iptsp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
