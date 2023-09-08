<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Phone Entity
 *
 * @property int $id
 * @property string $user_id
 * @property int $person_id
 * @property string $name
 * @property string|null $description
 * @property string|null $phone
 * @property string|null $ext
 * @property string|null $email
 * @property string|null $slug
 * @property string|null $iconType
 * @property string|null $icon
 * @property int $pos
 * @property bool $visible
 * @property string $action
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Phone extends Entity
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
        'person_id' => true,
        'name' => true,
        'description' => true,
        'phone' => true,
        'ext' => true,
        'email' => true,
        'slug' => true,
        'iconType' => true,
        'icon' => true,
        'pos' => true,
        'visible' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
    ];
}
