<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HospitalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HospitalsTable Test Case
 */
class HospitalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HospitalsTable
     */
    protected $Hospitals;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Hospitals',
        'app.Locations',
        'app.Consultations',
        'app.Doctors',
        'app.DoctorsServices',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Hospitals') ? [] : ['className' => HospitalsTable::class];
        $this->Hospitals = $this->getTableLocator()->get('Hospitals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Hospitals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
