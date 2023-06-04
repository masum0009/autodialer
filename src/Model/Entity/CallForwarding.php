<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CallForwarding Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $campaigns_id
 * @property int $gateway_id
 * @property string $call_from
 * @property string $call_to
 * @property int $call_status
 * @property int $call_duration
 * @property int $connect_time
 * @property int $establish_time
 * @property int $disconnect_time
 * @property int $disconnect_cause
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Campaign $campaign
 * @property \App\Model\Entity\Gateway $gateway
 */
class CallForwarding extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'client_id' => true,
        'campaigns_id' => true,
        'gateway_id' => true,
        'call_from' => true,
        'call_to' => true,
        'call_status' => true,
        'call_duration' => true,
        'connect_time' => true,
        'establish_time' => true,
        'disconnect_time' => true,
        'disconnect_cause' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'campaign' => true,
        'gateway' => true,
    ];
}
