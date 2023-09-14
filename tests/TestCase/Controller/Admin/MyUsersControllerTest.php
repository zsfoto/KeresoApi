<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\MyUsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\MyUsersController Test Case
 *
 * @uses \App\Controller\Admin\MyUsersController
 */
class MyUsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MyUsers',
        'app.SocialAccounts',
        'app.Persons',
        'app.Phones',
        'app.Openings',
        'app.Categories',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Admin\MyUsersController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Admin\MyUsersController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Admin\MyUsersController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Admin\MyUsersController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Admin\MyUsersController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
