<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitiesFixture
 */
class CitiesFixture extends TestFixture
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
                'zip' => 'Lorem ip',
                'county_short' => '',
                'longitude' => 'Lorem ipsum dolor ',
                'latitude' => 'Lorem ipsum dolor ',
                'created' => '2023-08-31 11:24:44',
                'modified' => '2023-08-31 11:24:44',
            ],
        ];
        parent::init();
    }
}
