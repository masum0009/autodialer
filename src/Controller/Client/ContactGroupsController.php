<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ContactGroups Controller
 *
 * @property \App\Model\Table\ContactGroupsTable $ContactGroups
 *
 * @method \App\Model\Entity\ContactGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactGroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $Contacts = TableRegistry::getTableLocator()->get('Contacts');
        $this->paginate = [
            'contain' => ['Clients'],
            'order'=> ['ContactGroups.id' => 'DESC']
        ];

        $contactGroup = $this->ContactGroups->find('all')->where([
            'ContactGroups.client_id' => $this->request->getSession()->read('client_id')
        ]);
        $total_contacts = array();

        foreach($contactGroup as $key => $group){
            //$contactGroup[$key]->total_contacts = $Contacts->find('all')->where(['contact_groups_id' => $group->id])->count();
            $total_contacts[$group->id] = $Contacts->find('all')->where(['contact_groups_id' => $group->id])->count();
        }
        $contactGroups = $this->paginate($contactGroup);

        $this->set(compact('contactGroups', 'total_contacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     /*
    public function view($id = null)
    {
        $contactGroup = $this->ContactGroups->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('contactGroup', $contactGroup);
    }
    */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactGroup = $this->ContactGroups->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // pr($data);
            $group_exist = $this->ContactGroups->find('all')->where([
                'ContactGroups.group_name' => $data['group_name'],
                'ContactGroups.client_id' => $this->request->getSession()->read('client_id')
            ])->first();
            if($group_exist){
                $this->Flash->error(__('The contact group  name already exists.'));
                return $this->redirect(['action' => 'index']);
            }

            
            $data['client_id'] = $this->request->getSession()->read('client_id');

            $contactGroup = $this->ContactGroups->patchEntity($contactGroup, $data);
            if ($this->ContactGroups->save($contactGroup)){
                $this->Flash->success(__('The contact group has been saved.'));
                if(isset($data['ref']) && $data['ref'] == 'contact')
                    return $this->redirect(['controller' => 'Contacts', 'action' => 'add']);
            }

            else
                $this->Flash->error(__('The contact group could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactGroup = $this->ContactGroups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $group_exist = $this->ContactGroups->find('all')->where([
                'ContactGroups.group_name' => $data['group_name'],
                'ContactGroups.client_id' => $this->request->getSession()->read('client_id')
            ])->first();
            if($group_exist){
                $contactGroup = $this->ContactGroups->patchEntity($contactGroup, $data);
                if ($this->ContactGroups->save($contactGroup)) 
                    $this->Flash->success(__('The contact group has been saved.'));
                else
                    $this->Flash->error(__('The contact group could not be saved. Please, try again.'));
            }
            else
                $this->Flash->error(__('The contact group  name already exists.'));

        }

        return $this->redirect(['action' => 'index']);
    }

    public function export($id){
        $client_id = $this->request->getSession()->read('client_id');
        $group = $this->ContactGroups->find('all')->where(['id' => $id, 'client_id' => $client_id])->first();
        if(!$group){
            $this->Flash->error("you don't export others contacts");
            return $this->redirect(['action' => 'index']);
        }
        

        $filename = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $group->group_name);
        $filename = mb_ereg_replace("([\.]{2,})", '', $filename);
        $filename = str_replace(' ', '-', $filename) . '.csv';
        
    
        $Contacts = TableRegistry::getTableLocator()->get('Contacts');
        $contacts = $Contacts->find('all')->where([
            'contact_groups_id' => $id,
            'client_id' => $client_id
        ])->all();
        

        if($contacts->count() > 0){
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename={$filename}");
            $output = fopen('php://output', 'w');
            fputcsv($output, ['mobile_no', 'contact_name', 'address']);

            foreach($contacts as $contact){
                $data= [
                    $contact->mobile_no, 
                    $contact->contact_name,
                    $contact->address
                ];
                fputcsv($output, $data);
            }

            fclose($output);
            exit;
        }
        $this->Flash->error('No contact available in this group');
        return $this->redirect(['action' => 'index']);
    }

    
    public function delete($id = null)
    {
        $Contacts = TableRegistry::getTableLocator()->get('Contacts');
        $this->request->allowMethod(['post', 'delete']);
        $contactGroup = $this->ContactGroups->find('all')->where([
            'ContactGroups.id' => $id,
            'ContactGroups.client_id' => $this->request->getSession()->read('client_id')
            ])->first();
        
        if(!$contactGroup){
            $this->Flash->error(__("The contact group doesn't exists."));
            return $this->redirect(['action' => 'index']);
        }

        $contacts = $Contacts->find('all')->where(['contact_groups_id' => $contactGroup->id])->count();
        if($contacts){
            $this->Flash->error(__("Some contacts already exist in the group."));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->ContactGroups->delete($contactGroup)) {
            $this->Flash->success(__('The contact group has been deleted.'));
        } else {
            $this->Flash->error(__('The contact group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
