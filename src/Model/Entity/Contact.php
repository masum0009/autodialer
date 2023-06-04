<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $mobile_no
 * @property string $contact_name
 * @property int|null $contact_groups_id
 * @property string $district
 * @property string $extra_information
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ContactGroup $contact_group
 */
class Contact extends Entity
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
        'mobile_no' => true,
        'contact_name' => true,
        'contact_groups_id' => true,
        'address' => true,
        'extra_information' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'contact_group' => true,
    ];
}
