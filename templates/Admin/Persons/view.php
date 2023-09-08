<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('My User') ?></th>
                    <td><?= $person->has('my_user') ? $this->Html->link($person->my_user->email, ['controller' => 'MyUsers', 'action' => 'view', $person->my_user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $person->has('category') ? $this->Html->link($person->category->name, ['controller' => 'Categories', 'action' => 'view', $person->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($person->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($person->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($person->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone2') ?></th>
                    <td><?= h($person->phone2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fax') ?></th>
                    <td><?= h($person->fax) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($person->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($person->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($person->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('IconType') ?></th>
                    <td><?= h($person->iconType) ?></td>
                </tr>
                <tr>
                    <th><?= __('Icon') ?></th>
                    <td><?= h($person->icon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Longitude') ?></th>
                    <td><?= h($person->longitude) ?></td>
                </tr>
                <tr>
                    <th><?= __('Latitude') ?></th>
                    <td><?= h($person->latitude) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action') ?></th>
                    <td><?= h($person->action) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pos') ?></th>
                    <td><?= $this->Number->format($person->pos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($person->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visible') ?></th>
                    <td><?= $person->visible ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('More') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($person->more)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Openings') ?></h4>
                <?php if (!empty($person->openings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Hour From') ?></th>
                            <th><?= __('Hour To') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Pos') ?></th>
                            <th><?= __('Visible') ?></th>
                            <th><?= __('Action') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->openings as $openings) : ?>
                        <tr>
                            <td><?= h($openings->id) ?></td>
                            <td><?= h($openings->user_id) ?></td>
                            <td><?= h($openings->person_id) ?></td>
                            <td><?= h($openings->name) ?></td>
                            <td><?= h($openings->hour_from) ?></td>
                            <td><?= h($openings->hour_to) ?></td>
                            <td><?= h($openings->comment) ?></td>
                            <td><?= h($openings->pos) ?></td>
                            <td><?= h($openings->visible) ?></td>
                            <td><?= h($openings->action) ?></td>
                            <td><?= h($openings->created) ?></td>
                            <td><?= h($openings->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Openings', 'action' => 'view', $openings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Openings', 'action' => 'edit', $openings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Openings', 'action' => 'delete', $openings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Phones') ?></h4>
                <?php if (!empty($person->phones)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Ext') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('IconType') ?></th>
                            <th><?= __('Icon') ?></th>
                            <th><?= __('Pos') ?></th>
                            <th><?= __('Visible') ?></th>
                            <th><?= __('Action') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->phones as $phones) : ?>
                        <tr>
                            <td><?= h($phones->id) ?></td>
                            <td><?= h($phones->user_id) ?></td>
                            <td><?= h($phones->person_id) ?></td>
                            <td><?= h($phones->name) ?></td>
                            <td><?= h($phones->description) ?></td>
                            <td><?= h($phones->phone) ?></td>
                            <td><?= h($phones->ext) ?></td>
                            <td><?= h($phones->email) ?></td>
                            <td><?= h($phones->slug) ?></td>
                            <td><?= h($phones->iconType) ?></td>
                            <td><?= h($phones->icon) ?></td>
                            <td><?= h($phones->pos) ?></td>
                            <td><?= h($phones->visible) ?></td>
                            <td><?= h($phones->action) ?></td>
                            <td><?= h($phones->created) ?></td>
                            <td><?= h($phones->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Phones', 'action' => 'view', $phones->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Phones', 'action' => 'edit', $phones->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phones', 'action' => 'delete', $phones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phones->id)]) ?>
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
