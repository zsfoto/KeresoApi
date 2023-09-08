<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeningsFixture
 */
class OpeningsFixture extends TestFixture
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
                'person_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'hour_from' => 'Lorem ipsum dolor sit amet',
                'hour_to' => 'Lorem ipsum dolor sit amet',
                'comment' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'action' => 'Lorem ip',
                'created' => '2023-08-31 11:20:40',
                'modified' => '2023-08-31 11:20:40',
            ],
        ];
        parent::init();
    }
}
