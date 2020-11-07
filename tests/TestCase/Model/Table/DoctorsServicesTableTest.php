<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorsServicesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorsServicesTable Test Case
 */
class DoctorsServicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorsServicesTable
     */
    protected $DoctorsServices;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DoctorsServices',
        'app.Services',
        'app.Hospitals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DoctorsServices') ? [] : ['className' => DoctorsServicesTable::class];
        $this->DoctorsServices = $this->getTableLocator()->get('DoctorsServices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DoctorsServices);

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
