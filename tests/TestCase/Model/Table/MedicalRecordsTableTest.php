<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicalRecordsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicalRecordsTable Test Case
 */
class MedicalRecordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicalRecordsTable
     */
    protected $MedicalRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MedicalRecords',
        'app.Locations',
        'app.Consultations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MedicalRecords') ? [] : ['className' => MedicalRecordsTable::class];
        $this->MedicalRecords = $this->getTableLocator()->get('MedicalRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MedicalRecords);

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
