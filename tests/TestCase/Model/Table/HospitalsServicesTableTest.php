<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HospitalsServicesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HospitalsServicesTable Test Case
 */
class HospitalsServicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HospitalsServicesTable
     */
    protected $HospitalsServices;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.HospitalsServices',
        'app.Hospitals',
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
        $config = $this->getTableLocator()->exists('HospitalsServices') ? [] : ['className' => HospitalsServicesTable::class];
        $this->HospitalsServices = $this->getTableLocator()->get('HospitalsServices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HospitalsServices);

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
