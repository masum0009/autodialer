<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Call Entity
 *
 * @property int $id
 * @property int $campaign_id
 * @property int $client_id
 * @property int $contact_id
 * @property string $contact_number
 * @property int $retry_count
 * @property int $call_status
 * @property int $call_duration
 * @property int $connect_time
 * @property int $establish_time
 * @property int $disconnect_time
 * @property int $disconnect_cause
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Campaign[] $campaigns
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Contact $contact
 */
class Call extends Entity
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
        'campaign_id' => true,
        'client_id' => true,
        'contact_id' => true,
        'contact_number' => true,
        'retry_count' => true,
        'call_status' => true,
        'call_duration' => true,
        'call_action_key' => true,
        'call_action_type'  => true,
        'call_action_status' => true,
        'connect_time' => true,
        'establish_time' => true,
        'disconnect_time' => true,
        'disconnect_cause' => true,
        'created' => true,
        'modified' => true,
        'campaigns' => true,
        'client' => true,
        'contact' => true,
    ];
}
