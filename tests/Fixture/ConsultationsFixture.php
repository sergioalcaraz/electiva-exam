<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsultationsFixture
 */
class ConsultationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'medical_record_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id de la cabecera medical_records', 'precision' => null, 'autoIncrement' => null],
        'consultation_date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'hospital_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hospital donde fue consultado', 'precision' => null, 'autoIncrement' => null],
        'service_id' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => 'servicio al que fue atendido', 'precision' => null],
        'doctor_dni' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => 'medico que atendio', 'precision' => null],
        'diagnosis' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => 'diagnostico', 'precision' => null],
        'treatment' => ['type' => 'string', 'length' => 400, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_520_ci', 'comment' => 'tratamiento', 'precision' => null],
        'is_admitted' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'es ingresado', 'precision' => null],
        'room' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'discharged_date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'medical_record_id' => ['type' => 'index', 'columns' => ['medical_record_id'], 'length' => []],
            'hospital_id' => ['type' => 'index', 'columns' => ['hospital_id'], 'length' => []],
            'service_id' => ['type' => 'index', 'columns' => ['service_id'], 'length' => []],
            'doctor_id' => ['type' => 'index', 'columns' => ['doctor_dni'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'consultations_ibfk_1' => ['type' => 'foreign', 'columns' => ['medical_record_id'], 'references' => ['medical_records', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'consultations_ibfk_4' => ['type' => 'foreign', 'columns' => ['service_id'], 'references' => ['services', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'consultations_ibfk_3' => ['type' => 'foreign', 'columns' => ['doctor_dni'], 'references' => ['doctors', 'dni'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'consultations_ibfk_2' => ['type' => 'foreign', 'columns' => ['hospital_id'], 'references' => ['hospitals', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'medical_record_id' => 1,
                'consultation_date' => '2020-11-07 04:15:54',
                'hospital_id' => 1,
                'service_id' => 'Lorem ip',
                'doctor_dni' => 'Lorem ipsum dolor ',
                'diagnosis' => 'Lorem ipsum dolor sit amet',
                'treatment' => 'Lorem ipsum dolor sit amet',
                'is_admitted' => 1,
                'room' => 1,
                'discharged_date' => '2020-11-07 04:15:54',
            ],
        ];
        parent::init();
    }
}
