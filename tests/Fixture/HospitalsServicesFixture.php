<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HospitalsServicesFixture
 */
class HospitalsServicesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'hospital_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'service_id' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'beds_total' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'beds_available' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'hospital_id' => ['type' => 'index', 'columns' => ['hospital_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['service_id', 'hospital_id'], 'length' => []],
            'hospitals_services_ibfk_1' => ['type' => 'foreign', 'columns' => ['hospital_id'], 'references' => ['hospitals', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'hospitals_services_ibfk_2' => ['type' => 'foreign', 'columns' => ['service_id'], 'references' => ['services', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'hospital_id' => 1,
                'service_id' => 'c4d61e0c-c0e4-452b-9804-2d1f9e85f5ed',
                'beds_total' => 1,
                'beds_available' => 1,
            ],
        ];
        parent::init();
    }
}
