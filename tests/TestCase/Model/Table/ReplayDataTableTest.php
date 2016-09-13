<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReplayDataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReplayDataTable Test Case
 */
class ReplayDataTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReplayDataTable
     */
    public $ReplayData;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.replay_data'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReplayData') ? [] : ['className' => 'App\Model\Table\ReplayDataTable'];
        $this->ReplayData = TableRegistry::get('ReplayData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReplayData);

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
