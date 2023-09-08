<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Opening Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string $name
 * @property string|null $hour_from
 * @property string|null $hour_to
 * @property string|null $comment
 * @property int|null $pos
 * @property bool|null $visible
 * @property string|null $action
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Opening extends Entity
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
        'hour_from' => true,
        'hour_to' => true,
        'comment' => true,
        'pos' => true,
        'visible' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
    ];
}
