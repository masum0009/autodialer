<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallForwardingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallForwardingTable Test Case
 */
class CallForwardingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CallForwardingTable
     */
    public $CallForwarding;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CallForwarding',
        'app.Clients',
        'app.Campaigns',
        'app.Gateways',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CallForwarding') ? [] : ['className' => CallForwardingTable::class];
        $this->CallForwarding = TableRegistry::getTableLocator()->get('CallForwarding', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallForwarding);

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
