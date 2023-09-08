<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonsFixture
 */
class PersonsFixture extends TestFixture
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
                'category_id' => 1,
                'city_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'phone2' => 'Lorem ipsum dolor sit amet',
                'fax' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'website' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'more' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'slug' => 'Lorem ipsum dolor sit amet',
                'iconType' => 'Lorem ipsum dolor sit amet',
                'icon' => 'Lorem ipsum dolor sit amet',
                'longitude' => 'Lorem ipsum dolor ',
                'latitude' => 'Lorem ipsum dolor ',
                'pos' => 1,
                'visible' => 1,
                'action' => 'Lorem ip',
                'created' => '2023-08-31 11:20:13',
                'modified' => '2023-08-31 11:20:13',
            ],
        ];
        parent::init();
    }
}
