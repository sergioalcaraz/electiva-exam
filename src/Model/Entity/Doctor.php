<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Doctor Entity
 *
 * @property string $dni
 * @property string $name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property int $hospital_id
 * @property bool $is_director
 *
 * @property \App\Model\Entity\Hospital $hospital
 * @property \App\Model\Entity\Service[] $services
 */
class Doctor extends Entity
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
        'last_name' => true,
        'birthdate' => true,
        'hospital_id' => true,
        'is_director' => true,
        'hospital' => true,
        'services' => true,
    ];
}
