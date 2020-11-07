<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DoctorsService Entity
 *
 * @property string $doctor_dni
 * @property string $service_id
 * @property int $hospital_id
 *
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\Hospital $hospital
 */
class DoctorsService extends Entity
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
        'service' => true,
        'hospital' => true,
        'doctor_dni' => true,
        'service_id' => true,
        'hospital_id' => true
    ];
}
