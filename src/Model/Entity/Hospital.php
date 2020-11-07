<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hospital Entity
 *
 * @property int $id
 * @property string $name
 * @property int $location_id
 * @property string $phone
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Consultation[] $consultations
 * @property \App\Model\Entity\Doctor[] $doctors
 * @property \App\Model\Entity\DoctorsService[] $doctors_services
 * @property \App\Model\Entity\Service[] $services
 */
class Hospital extends Entity
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
        'location_id' => true,
        'phone' => true,
        'location' => true,
        'consultations' => true,
        'doctors' => true,
        'doctors_services' => true,
        'services' => true,
    ];
}
