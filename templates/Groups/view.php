<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Group'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="groups view content">
            <h3><?= h($group->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($group->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($group->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($group->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('IconType') ?></th>
                    <td><?= h($group->iconType) ?></td>
                </tr>
                <tr>
                    <th><?= __('Icon') ?></th>
                    <td><?= h($group->icon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action') ?></th>
                    <td><?= h($group->action) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($group->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pos') ?></th>
                    <td><?= $this->Number->format($group->pos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($group->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($group->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visible') ?></th>
                    <td><?= $group->visible ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Persons') ?></h4>
                <?php if (!empty($group->persons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Group Id') ?></th>
                            <th><?= __('City Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Phone2') ?></th>
                            <th><?= __('Fax') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('More') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('IconType') ?></th>
                            <th><?= __('Icon') ?></th>
                            <th><?= __('Longitude') ?></th>
                            <th><?= __('Latitude') ?></th>
                            <th><?= __('Pos') ?></th>
                            <th><?= __('Visible') ?></th>
                            <th><?= __('Action') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($group->persons as $persons) : ?>
                        <tr>
                            <td><?= h($persons->id) ?></td>
                            <td><?= h($persons->group_id) ?></td>
                            <td><?= h($persons->city_id) ?></td>
                            <td><?= h($persons->name) ?></td>
                            <td><?= h($persons->description) ?></td>
                            <td><?= h($persons->phone) ?></td>
                            <td><?= h($persons->phone2) ?></td>
                            <td><?= h($persons->fax) ?></td>
                            <td><?= h($persons->email) ?></td>
                            <td><?= h($persons->website) ?></td>
                            <td><?= h($persons->address) ?></td>
                            <td><?= h($persons->more) ?></td>
                            <td><?= h($persons->slug) ?></td>
                            <td><?= h($persons->iconType) ?></td>
                            <td><?= h($persons->icon) ?></td>
                            <td><?= h($persons->longitude) ?></td>
                            <td><?= h($persons->latitude) ?></td>
                            <td><?= h($persons->pos) ?></td>
                            <td><?= h($persons->visible) ?></td>
                            <td><?= h($persons->action) ?></td>
                            <td><?= h($persons->created) ?></td>
                            <td><?= h($persons->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Persons', 'action' => 'view', $persons->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Persons', 'action' => 'edit', $persons->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Persons', 'action' => 'delete', $persons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persons->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
