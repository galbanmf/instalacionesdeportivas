<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsosTable Test Case
 */
class UsosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsosTable
     */
    public $Usos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Usos',
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
        $config = TableRegistry::getTableLocator()->exists('Usos') ? [] : ['className' => UsosTable::class];
        $this->Usos = TableRegistry::getTableLocator()->get('Usos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Usos);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
