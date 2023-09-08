<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opening $opening
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Opening'), ['action' => 'edit', $opening->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Opening'), ['action' => 'delete', $opening->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opening->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Openings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Opening'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="openings view content">
            <h3><?= h($opening->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($opening->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hour From') ?></th>
                    <td><?= h($opening->hour_from) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hour To') ?></th>
                    <td><?= h($opening->hour_to) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comment') ?></th>
                    <td><?= h($opening->comment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action') ?></th>
                    <td><?= h($opening->action) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($opening->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Person Id') ?></th>
                    <td><?= $this->Number->format($opening->person_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pos') ?></th>
                    <td><?= $opening->pos === null ? '' : $this->Number->format($opening->pos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($opening->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($opening->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visible') ?></th>
                    <td><?= $opening->visible ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
