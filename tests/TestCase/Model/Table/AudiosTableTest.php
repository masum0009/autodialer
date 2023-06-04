<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AudiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AudiosTable Test Case
 */
class AudiosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AudiosTable
     */
    public $Audios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Audios',
        'app.Clients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Audios') ? [] : ['className' => AudiosTable::class];
        $this->Audios = TableRegistry::getTableLocator()->get('Audios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Audios);

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
