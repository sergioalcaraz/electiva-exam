<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorsTable Test Case
 */
class DoctorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorsTable
     */
    protected $Doctors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Doctors',
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
        $config = $this->getTableLocator()->exists('Doctors') ? [] : ['className' => DoctorsTable::class];
        $this->Doctors = $this->getTableLocator()->get('Doctors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Doctors);

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
