<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MedicalRecordsFixture
 */
class MedicalRecordsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'dni' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'last_name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'birthdate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'phone' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'email' => ['type' => 'string', 'length' => 320, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'location_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ciudad donde vive', 'precision' => null, 'autoIncrement' => null],
        'address' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => 'direccion donde vive', 'precision' => null],
        '_indexes' => [
            'location_id' => ['type' => 'index', 'columns' => ['location_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'dni' => ['type' => 'unique', 'columns' => ['dni'], 'length' => []],
            'medical_records_ibfk_1' => ['type' => 'foreign', 'columns' => ['location_id'], 'references' => ['locations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'dni' => 'Lorem ipsum dolor ',
                'name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'birthdate' => '2020-11-07',
                'phone' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'location_id' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
