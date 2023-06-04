<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gateway Entity
 *
 * @property int $id
 * @property string $name
 * @property int $client_id
 * @property string $ip
 * @property int $port
 * @property float $call_rate
 * @property int $call_pulse
 * @property float $service_rate
 * @property string $username
 * @property string $password
 * @property string $prefix
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Campaign[] $campaigns
 */
class Gateway extends Entity
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
        'ip' => true,
        'port' => true,
        'call_rate' => true,
        'call_pulse' => true,
        'service_rate' => true,
        'user' => true,
        'password' => true,
        'prefix' => true,
        'codec' => true,
        'created_by_admin' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'campaigns' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        // 'password',
    ];
}
