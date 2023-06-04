<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Iptsp Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $iptsp_user
 * @property string $iptsp_password
 * @property string $iptsp_ip
 * @property int $iptsp_port
 * @property string $iptsp_number
 * @property string $forwarding_number
 * @property int $last_registered
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CallbackHistory[] $callback_history
 */
class Iptsp extends Entity
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
        'iptsp_user' => true,
        'iptsp_password' => true,
        'iptsp_ip' => true,
        'iptsp_port' => true,
        'iptsp_number' => true,
        'forwarding_number' => true,
        'last_registered' => true,
        'created' => true,
        'client' => true,
        'callback_history' => true,
    ];
}
