<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Opening> $openings
 */
?>
<div class="openings index content">
    <?= $this->Html->link(__('New Opening'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Openings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('hour_from') ?></th>
                    <th><?= $this->Paginator->sort('hour_to') ?></th>
                    <th><?= $this->Paginator->sort('comment') ?></th>
                    <th><?= $this->Paginator->sort('pos') ?></th>
                    <th><?= $this->Paginator->sort('visible') ?></th>
                    <th><?= $this->Paginator->sort('action') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($openings as $opening): ?>
                <tr>
                    <td><?= $this->Number->format($opening->id) ?></td>
                    <td><?= $this->Number->format($opening->person_id) ?></td>
                    <td><?= h($opening->name) ?></td>
                    <td><?= h($opening->hour_from) ?></td>
                    <td><?= h($opening->hour_to) ?></td>
                    <td><?= h($opening->comment) ?></td>
                    <td><?= $opening->pos === null ? '' : $this->Number->format($opening->pos) ?></td>
                    <td><?= h($opening->visible) ?></td>
                    <td><?= h($opening->action) ?></td>
                    <td><?= h($opening->created) ?></td>
                    <td><?= h($opening->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $opening->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $opening->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $opening->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opening->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
