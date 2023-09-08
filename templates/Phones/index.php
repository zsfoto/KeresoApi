<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Phone> $phones
 */
?>
<div class="phones index content">
    <?= $this->Html->link(__('New Phone'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Phones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('ext') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('iconType') ?></th>
                    <th><?= $this->Paginator->sort('icon') ?></th>
                    <th><?= $this->Paginator->sort('pos') ?></th>
                    <th><?= $this->Paginator->sort('visible') ?></th>
                    <th><?= $this->Paginator->sort('action') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($phones as $phone): ?>
                <tr>
                    <td><?= $this->Number->format($phone->id) ?></td>
                    <td><?= $this->Number->format($phone->person_id) ?></td>
                    <td><?= h($phone->name) ?></td>
                    <td><?= h($phone->description) ?></td>
                    <td><?= h($phone->phone) ?></td>
                    <td><?= h($phone->ext) ?></td>
                    <td><?= h($phone->email) ?></td>
                    <td><?= h($phone->slug) ?></td>
                    <td><?= h($phone->iconType) ?></td>
                    <td><?= h($phone->icon) ?></td>
                    <td><?= $this->Number->format($phone->pos) ?></td>
                    <td><?= h($phone->visible) ?></td>
                    <td><?= h($phone->action) ?></td>
                    <td><?= h($phone->created) ?></td>
                    <td><?= h($phone->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $phone->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phone->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phone->id)]) ?>
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
