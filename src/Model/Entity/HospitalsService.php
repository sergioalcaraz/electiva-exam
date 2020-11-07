<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HospitalsService Entity
 *
 * @property int $hospital_id
 * @property string $service_id
 * @property int $beds_total
 * @property int $beds_available
 *
 * @property \App\Model\Entity\Hospital $hospital
 * @property \App\Model\Entity\Service $service
 */
class HospitalsService extends Entity
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
        'beds_total' => true,
        'beds_available' => true,
        'hospital' => true,
        'service' => true,
    ];
}
