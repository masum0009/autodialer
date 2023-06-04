<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Dashboard Controller
 *
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');
        $Campaigns = TableRegistry::getTableLocator()->get("Campaigns");
        $CallForwarding = TableRegistry::getTableLocator()->get("CallForwarding");
        $Calls = TableRegistry::getTableLocator()->get("Calls");
        $Contacts = TableRegistry::getTableLocator()->get("Contacts");
        $Gateway = TableRegistry::getTableLocator()->get("Gateway");

        $client_id = $this->request->getSession()->read('client_id');
        $option = array();
        $campCount = $Campaigns->find('all')->where(['Campaigns.client_id' => $client_id])->count();
        $campSuccess = $Campaigns->find('all')->where(['Campaigns.client_id' => $client_id,  'Campaigns.status' => 6])->count();
        $callBack = $CallForwarding->find('all')->where(['CallForwarding.client_id' => $client_id])->count();
        
        $year=date("Y");
        $month_call_success=array(0,0,0,0,0,0,0,0,0,0,0,0);
        $callSuccessData = $conn->execute("SELECT MONTH(`created`) as month,COUNT(id) as total FROM calls WHERE YEAR(`created`) = $year AND `client_id`=$client_id AND  `call_duration`>0 AND `call_status`=4 GROUP BY MONTH(`created`)");

        foreach ($callSuccessData as $data){
            if(isset($data['month']))
                $month_call_success[$data['month']]=intval($data['total']);
        }


        $month_call_failed=array(0,0,0,0,0,0,0,0,0,0,0,0);
        $callFailedData = $conn->execute("SELECT MONTH(`created`) as month,COUNT(id) as total FROM calls WHERE YEAR(`created`) = $year AND `client_id`=$client_id AND `call_duration`=0 AND `call_status`=4 GROUP BY MONTH(`created`)");
        foreach ($callFailedData as $data){
            if(isset($data['month']))
                $month_call_failed[$data['month']]=intval($data['total']);
        }

        $month_call_pending=array(0,0,0,0,0,0,0,0,0,0,0,0);
        $callPendingData = $conn->execute("SELECT MONTH(`created`) as month,COUNT(id) as total FROM calls WHERE YEAR(`created`) = $year AND `client_id`=$client_id AND `call_status`!=4 GROUP BY MONTH(`created`)");
        foreach ($callPendingData as $data){
            if(isset($data['month']))
                $month_call_pending[$data['month']]=intval($data['total']);
        }

        $total_array=array($month_call_success,$month_call_failed,$month_call_pending);
        $contactCount = $Contacts->find('all', array(
                'fields' => 'DISTINCT Contact.mobile_no',
                'conditions' => array(
                    'Contacts.client_id ' => $client_id,
                )
            )
        )->count();
        
        $callCount = $Calls->find('all', array(
            'conditions' => array(
                'Calls.client_id ' => $client_id,
                'Calls.call_status ' => 4,
                'Calls.call_duration >' => 0,
            )
        ))->count();

        $callFailedCount = $Calls->find('all', array(
            'conditions' => array(
                'Calls.client_id ' => $client_id,
                'Calls.call_status ' => 4,
                'Calls.call_duration =' => 0,
            )
        ))->count();



        $callTotalCount = $Calls->find('all', array(
            'conditions' => array(
                'Calls.client_id ' => $client_id
            )
        ))->count();


        
        $gatewayCount = $Gateway->find('all', array(
            'conditions' => array(
                'Gateway.client_id ' => $client_id,
            )
        ))->count();
        
        $camPersentage=00;
        if($campSuccess>0 && $campCount>0){
            $camPersentage=round((($campSuccess*100)/$campCount),2);
        }

        $callPersentage=00;
        if($callCount>0 && $callTotalCount>0){
            $callPersentage=round((($callCount*100)/$callTotalCount),2);
        }

        $callFailedPersentage=00;
        if($callFailedCount>0 && $callTotalCount>0){
            $callFailedPersentage=round((($callFailedCount*100)/$callTotalCount),2);
        }
		
		
        $callPending=$callTotalCount-$callCount-$callFailedCount;
        $callPendingPersentage=00;
        if($callPending>0){
            $callPendingPersentage=100-$callPersentage-$callFailedPersentage;
        }
		// pr($total_array);
        // die();

		$this->set('callBack', $callBack);
        $this->set('gatewayCount', $gatewayCount);
        $this->set('total_array', json_encode($total_array));
        $this->set('callCount', $callCount);
        $this->set('callFailedCount', $callFailedCount);
        $this->set('callPending', $callPending);
        $this->set('callTotalCount', $callTotalCount);
        $this->set('contactCount', $contactCount);
        $this->set('campCount', $campCount);
        $this->set('camPersentage', $camPersentage);
        $this->set('callSuccessPersentage', $callPersentage);
        $this->set('callFailedPersentage', $callFailedPersentage);
        $this->set('callPendingPersentage', $callPendingPersentage);

    }

}
