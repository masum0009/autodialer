<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $company_name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $profileimage
 * @property string $call_forwarding_to
 * @property int $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Client extends Entity
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
        'username' => true,
        'password' => true,
        'fullname' => true,
        'company_name' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'profileimage' => true,
        'call_forwarding_to' => true,
        'call_rate' => true,
        'sms_rate' => true,
        'call_pulse' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
