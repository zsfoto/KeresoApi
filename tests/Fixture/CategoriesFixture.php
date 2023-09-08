<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'iconType' => 'Lorem ipsum dolor sit amet',
                'icon' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'action' => 'Lorem ip',
                'created' => '2023-08-31 11:20:05',
                'modified' => '2023-08-31 11:20:05',
            ],
        ];
        parent::init();
    }
}
