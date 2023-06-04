<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IptspTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IptspTable Test Case
 */
class IptspTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IptspTable
     */
    public $Iptsp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Iptsp',
        'app.Users',
        'app.CallbackHistory',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Iptsp') ? [] : ['className' => IptspTable::class];
        $this->Iptsp = TableRegistry::getTableLocator()->get('Iptsp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Iptsp);

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
