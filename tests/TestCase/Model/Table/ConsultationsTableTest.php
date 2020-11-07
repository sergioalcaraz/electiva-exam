<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsultationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsultationsTable Test Case
 */
class ConsultationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsultationsTable
     */
    protected $Consultations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Consultations',
        'app.MedicalRecords',
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
        $config = $this->getTableLocator()->exists('Consultations') ? [] : ['className' => ConsultationsTable::class];
        $this->Consultations = $this->getTableLocator()->get('Consultations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Consultations);

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
