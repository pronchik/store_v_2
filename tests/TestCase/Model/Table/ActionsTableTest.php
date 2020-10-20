<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActionsTable Test Case
 */
class ActionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActionsTable
     */
    protected $Actions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Actions',
        'app.Products',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Actions') ? [] : ['className' => ActionsTable::class];
        $this->Actions = $this->getTableLocator()->get('Actions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Actions);

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
