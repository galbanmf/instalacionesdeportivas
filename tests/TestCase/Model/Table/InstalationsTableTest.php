<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstalationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstalationsTable Test Case
 */
class InstalationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InstalationsTable
     */
    public $Instalations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Instalations',
        'app.Pistas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Instalations') ? [] : ['className' => InstalationsTable::class];
        $this->Instalations = TableRegistry::getTableLocator()->get('Instalations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Instalations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
