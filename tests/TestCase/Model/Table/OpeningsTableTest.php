<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeningsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeningsTable Test Case
 */
class OpeningsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeningsTable
     */
    protected $Openings;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Openings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Openings') ? [] : ['className' => OpeningsTable::class];
        $this->Openings = $this->getTableLocator()->get('Openings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Openings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OpeningsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
