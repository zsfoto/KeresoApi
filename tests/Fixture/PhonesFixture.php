<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PhonesFixture
 */
class PhonesFixture extends TestFixture
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
                'user_id' => 'Lorem ipsum dolor sit amet',
                'person_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'ext' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'iconType' => 'Lorem ipsum dolor sit amet',
                'icon' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'action' => 'Lorem ip',
                'created' => '2023-09-01 08:14:59',
                'modified' => '2023-09-01 08:14:59',
            ],
        ];
        parent::init();
    }
}
