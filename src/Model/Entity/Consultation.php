<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consultation Entity
 *
 * @property int $id
 * @property int $medical_record_id
 * @property \Cake\I18n\FrozenTime $consultation_date
 * @property int $hospital_id
 * @property string $service_id
 * @property string $doctor_dni
 * @property string $diagnosis
 * @property string $treatment
 * @property bool $is_admitted
 * @property int $room
 * @property \Cake\I18n\FrozenTime|null $discharged_date
 *
 * @property \App\Model\Entity\MedicalRecord $medical_record
 * @property \App\Model\Entity\Hospital $hospital
 * @property \App\Model\Entity\Service $service
 */
class Consultation extends Entity
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
        'medical_record_id' => true,
        'consultation_date' => true,
        'hospital_id' => true,
        'service_id' => true,
        'doctor_dni' => true,
        'diagnosis' => true,
        'treatment' => true,
        'is_admitted' => true,
        'room' => true,
        'discharged_date' => true,
        'medical_record' => true,
        'hospital' => true,
        'service' => true,
    ];
}
