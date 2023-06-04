<?php
namespace App\Controller\Client;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $client_id = $this->request->getSession()->read('client_id'); 
        
        $contacts  = $this->Contacts->find('all')->where([
            'Contacts.client_id' => $client_id
        ])->contain(['ContactGroups'])->orderDesc('Contacts.id');
        
        $data = $this->request->query();
        if(key_exists('page', $data))
            unset($data['page']);

        if(count($data) > 0){

            if( isset($data['contact_name']) && !empty($data['contact_name']) )
            $contacts->where(['Contacts.contact_name LIKE' => "%" . trim($data['contact_name']) . "%"]);
        
            if( isset($data['mobile_no']) && !empty($data['mobile_no']) )
                $contacts->where(['Contacts.mobile_no' => trim($data['mobile_no'])]);

            if ( isset($data['contact_groups_id']) && $data['contact_groups_id'] != '' )
                $contacts->where(['Contacts.contact_groups_id' => $data['contact_groups_id']]);
        }
        
        $contacts = $this->paginate($contacts);
        $contactGroups = $this->Contacts->ContactGroups->find('list',
            [
                'keyField' => 'id',
                'valueField' => 'group_name'
            ])->where(['ContactGroups.client_id' => $client_id ]);
        
        $this->set(compact('contacts', 'contactGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Clients', 'ContactGroups'],
        ]);

        $this->set('contact', $contact);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($contact_gid = '')
    {
        $contact = $this->Contacts->newEntity();
        $client_id = $this->request->getSession()->read('client_id'); 
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // pr($data);
            // die();
            $data['client_id'] = $client_id;
            $existContact = $this->Contacts->find('all')->where([
                'Contacts.contact_groups_id' => $data['contact_groups_id'],
                'Contacts.client_id'          => $data['client_id'],
                'Contacts.mobile_no'         => $data['mobile_no']
            ])->first();
            
            // pr($data);
            // var_dump($existContact);
            // die();
            if(!$existContact){
                $contact = $this->Contacts->patchEntity($contact, $data);
                if ($this->Contacts->save($contact)) {
                    $this->Flash->success(__('The contact has been saved.'));
                    return $this->redirect(['action' => 'index', 'contact_groups_id' => $data['contact_groups_id']]);
                }
                else
                    $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
            else
                $this->Flash->error(__('The contact could not be saved. Contact already exists.'));
            
        }
        // $users = $this->Contacts->Users->find('list', ['limit' => 200]);
        $contactGroups = $this->Contacts->ContactGroups->find('list',
            [
                'keyField' => 'id',
                'valueField' => 'group_name'
            ])->where(['ContactGroups.client_id' => $client_id ]);
        $this->set(compact('contact', 'contactGroups', 'contact_gid'));
    }


    public function import()
    {
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['client_id'] = $this->request->getSession()->read('client_id'); 

            $ext = pathinfo($data['csv']['name'], PATHINFO_EXTENSION);
            if('csv' != $ext){
                $this->Flash->error(__('Invalid file extension. Please, upload only csv file.'));
                return $this->redirect(['action' => 'add']);
            }

            if(isset($data['csv']) && $_FILES['csv']['size'] !== 0) {
                    $uploaded   = 0;
                    $failed     = 0;
                    $duplicated = 0;

                    //need to check file extension

                	$file = fopen($_FILES['csv']['tmp_name'], "r");
                    // $header = fgetcsv($file);
                    while ($row = fgetcsv($file)) {
                        if( count(array_filter($row)) !== 0 ){
                            

                            if(count($row) >= 1){
                                if((int) $row[0] < 1000000000)
                                    continue;
                                
                                $data['mobile_no'] = $row[0];

                            }
                                

                            if(count($row) >= 2)
                                $data['contact_name'] = $row[1];
                            
                            if(count($row) >= 3)
                                $data['address'] = $row[2];

                            // $row = array_combine($header, $row);
                            // $data['contact_groups_id'] = $data['contact_groups_id'];
                            // $data['client_id'] = $this->request->getSession()->read('client_id'); 
                            
                            // pr($data);
                            // die();

                            $existContact = $this->Contacts->find('all')->where([
                                'Contacts.contact_groups_id' => $data['contact_groups_id'],
                                'Contacts.client_id'          => $data['client_id'],
                                'Contacts.mobile_no'         => $data['mobile_no']
                            ])->first();

                            if(!$existContact){
                                $contact = $this->Contacts->newEntity();
                                $contact = $this->Contacts->patchEntity($contact, $data);
                                if ($this->Contacts->save($contact)) 
                                    $uploaded++;
                                else
                                    $failed++;

                            }
                            else
                                $duplicated++;
                        }
                    }
                    fclose($file);
                    $this->Flash->success("{$uploaded} contacts uploaded, {$duplicated} contacts Duplicated and {$failed} contacts failed to upload");

                    return $this->redirect(['action' => 'index', 'contact_groups_id' => $data['contact_groups_id']]);

            }
        
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client_id = $this->request->getSession()->read('client_id'); 
        $contact = $this->Contacts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['client_id'] = $client_id;
            $existContact = $this->Contacts->find('all')->where([
                'Contacts.id'       => $id,
                'Contacts.client_id' => $data['client_id'],
            ])->first();

            if($existContact){
                if($existContact->contact_groups_id != $data['contact_groups_id'] ){
    
                    $existInGroup = $this->Contacts->find('all')->where([
                        'Contacts.client_id' => $data['client_id'],
                        'Contacts.contact_groups_id' => $data['contact_groups_id']
                    ])->first();

                    if($existInGroup){
                        $this->Flash->error(__('The contact already exists the group.'));
                        return $this->redirect(['action' => 'edit', $id]);
                    }
                }


                $contact = $this->Contacts->patchEntity($contact, $data);
                if ($this->Contacts->save($contact)) {
                    $this->Flash->success(__('The contact has been saved.'));

                    return $this->redirect(['action' => 'index', 'contact_groups_id' => $data['contact_groups_id']]);
                }
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        // $users = $this->Contacts->Users->find('list', ['limit' => 200]);
        // $contactGroups = $this->Contacts->ContactGroups->find('list', ['limit' => 200]);
        $contactGroups = $this->Contacts->ContactGroups->find('list',
            [
                'keyField' => 'id',
                'valueField' => 'group_name'
            ])->where(['ContactGroups.client_id' => $client_id ]);

        $this->set(compact('contact', 'contactGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
