<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CallbackHistory Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int $iptsp_id
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
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Iptsp $iptsp
 */
class CallbackHistory extends Entity
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
        'iptsp_id' => true,
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
        'user' => true,
        'iptsp' => true,
    ];
}
