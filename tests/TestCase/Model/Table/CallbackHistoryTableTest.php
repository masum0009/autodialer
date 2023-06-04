<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallbackHistoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallbackHistoryTable Test Case
 */
class CallbackHistoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CallbackHistoryTable
     */
    public $CallbackHistory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CallbackHistory',
        'app.Users',
        'app.Iptsps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CallbackHistory') ? [] : ['className' => CallbackHistoryTable::class];
        $this->CallbackHistory = TableRegistry::getTableLocator()->get('CallbackHistory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallbackHistory);

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
