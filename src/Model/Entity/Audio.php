<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Audio Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $caption
 * @property string $filename
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 */
class Audio extends Entity
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
        'caption' => true,
        'filename' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
    ];
}
