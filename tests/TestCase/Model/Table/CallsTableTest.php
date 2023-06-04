<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsTable Test Case
 */
class CallsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsTable
     */
    public $Calls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Calls',
        'app.Campaigns',
        'app.Clients',
        'app.Contacts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Calls') ? [] : ['className' => CallsTable::class];
        $this->Calls = TableRegistry::getTableLocator()->get('Calls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calls);

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
