<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property string $id
 * @property string $name
 * @property string $comentary
 *
 * @property \App\Model\Entity\Consultation[] $consultations
 * @property \App\Model\Entity\Doctor[] $doctors
 * @property \App\Model\Entity\Hospital[] $hospitals
 */
class Service extends Entity
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
        'comentary' => true,
        'consultations' => true,
        'doctors' => true,
        'hospitals' => true,
    ];
}
