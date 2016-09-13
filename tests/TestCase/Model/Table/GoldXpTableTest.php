<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoldXpTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoldXpTable Test Case
 */
class GoldXpTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoldXpTable
     */
    public $GoldXp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gold_xp',
        'app.matches'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GoldXp') ? [] : ['className' => 'App\Model\Table\GoldXpTable'];
        $this->GoldXp = TableRegistry::get('GoldXp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GoldXp);

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
