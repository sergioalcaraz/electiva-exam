<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MedicalRecord Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property string $phone
 * @property string $email
 * @property int $location_id
 * @property string $address
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Consultation[] $consultations
 */
class MedicalRecord extends Entity
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
        'dni' => true,
        'name' => true,
        'last_name' => true,
        'birthdate' => true,
        'phone' => true,
        'email' => true,
        'location_id' => true,
        'address' => true,
        'location' => true,
        'consultations' => true,
    ];
}
