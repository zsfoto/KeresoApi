<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $city_id
 * @property string $name
 * @property string|null $description
 * @property string|null $phone
 * @property string|null $phone2
 * @property string|null $fax
 * @property string|null $email
 * @property string|null $website
 * @property string|null $address
 * @property string|null $more
 * @property string|null $slug
 * @property string|null $iconType
 * @property string|null $icon
 * @property string|null $longitude
 * @property string|null $latitude
 * @property int $pos
 * @property bool $visible
 * @property string $action
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Opening[] $openings
 * @property \App\Model\Entity\Phone[] $phones
 */
class Person extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'category_id' => true,
        'city_id' => true,
        'name' => true,
        'description' => true,
        'phone' => true,
        'ext' => true,
        'phone2' => true,
        'ext2' => true,
        'fax' => true,
        'ext_fax' => true,
        'email' => true,
        'website' => true,
        'address' => true,
        'more' => true,
        'keywords' => true,
        'slug' => true,
        'iconType' => true,
        'icon' => true,
        'longitude' => true,
        'latitude' => true,
        'googlemap_url' => true,
        'pos' => true,
        'visible' => true,
        'action' => true,
		'phone_count' => true,
		'opening_count' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'city' => true,
        'openings' => true,
        'phones' => true,
    ];
}
