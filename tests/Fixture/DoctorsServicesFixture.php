<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DoctorsServicesFixture
 */
class DoctorsServicesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'doctor_dni' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'service_id' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'hospital_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'service_id' => ['type' => 'index', 'columns' => ['service_id'], 'length' => []],
            'hospital_id' => ['type' => 'index', 'columns' => ['hospital_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['doctor_dni', 'service_id', 'hospital_id'], 'length' => []],
            'doctors_services_ibfk_1' => ['type' => 'foreign', 'columns' => ['doctor_dni'], 'references' => ['doctors', 'dni'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'doctors_services_ibfk_3' => ['type' => 'foreign', 'columns' => ['hospital_id'], 'references' => ['hospitals', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'doctors_services_ibfk_2' => ['type' => 'foreign', 'columns' => ['service_id'], 'references' => ['services', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_520_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'doctor_dni' => '4703fa13-12d2-4b91-90a0-8c6ffef7b5a5',
                'service_id' => '5afbe0df-5b18-4413-a33e-fa43f2c3b6ba',
                'hospital_id' => 1,
            ],
        ];
        parent::init();
    }
}
