<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campaign Entity
 *
 * @property int $id
 * @property string $name
 * @property string $client_id
 * @property int $call_id
 * @property string $file_name
 * @property string $contact_groups
 * @property int $call_duration
 * @property int $gateway_id
 * @property int $frequency
 * @property int $dialing
 * @property int $received
 * @property int $failed
 * @property int $busy
 * @property int $max_call_duration
 * @property int $max_call_retry
 * @property int $time_between_retries
 * @property int $play_count
 * @property int $caller_id_number
 * @property string $description
 * @property string $weekdays
 * @property \Cake\I18n\FrozenDate $start_at
 * @property \Cake\I18n\FrozenDate $finished_at
 * @property \Cake\I18n\FrozenTime $daily_start_time
 * @property \Cake\I18n\FrozenTime $daily_stop_time
 * @property string $timezone
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Call $call
 * @property \App\Model\Entity\Gateway $gateway
 */
class Campaign extends Entity
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
        'name' => true,
        'client_id' => true,
        'call_id' => true,
        'audios_id' => true,
        'contact_groups' => true,
        'call_duration' => true,
        'gateway_id' => true,
        'pbx_gateway_id' => true,
        'pbx_number'    => true,
        'frequency' => true,
        'dialing' => true,
        'received' => true,
        'failed' => true,
        'busy' => true,
        'max_call_duration' => true,
        'max_call_retry' => true,
        'time_between_retries' => true,
        'play_count' => true,
        'caller_id_number' => true,
        'description' => true,
        'weekdays' => true,
        'start_at' => true,
        'finished_at' => true,
        'daily_start_time' => true,
        'daily_stop_time' => true,
        'timezone' => true,
        'status' => true,
        'sms'   => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'call' => true,
        'gateway' => true,
    ];
}
