<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DoctorsFixture
 */
class DoctorsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'dni' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'last_name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => '', 'precision' => null],
        'birthdate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'hospital_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Hospital al que esta adscripto', 'precision' => null, 'autoIncrement' => null],
        'is_director' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'hospital_id' => ['type' => 'index', 'columns' => ['hospital_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['dni'], 'length' => []],
            'doctors_ibfk_1' => ['type' => 'foreign', 'columns' => ['hospital_id'], 'references' => ['hospitals', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'dni' => '93e9ac4e-dd5c-4cae-bb92-67b7840e4233',
                'name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'birthdate' => '2020-11-07',
                'hospital_id' => 1,
                'is_director' => 1,
            ],
        ];
        parent::init();
    }
}
