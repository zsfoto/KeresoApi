<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Person> $persons
 */
?>
            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><?= __('Home') ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= __('List our companies') ?></li>
                                </ol>
                            </nav>

                            <h2 class="text-white"><?= __('List our companies') ?></h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="pt-5 section-bg">
                <div class="container">
                    <div class="row">

						<div class="col-lg-12 col-12">

                            <a href="/persons/add" class="btn btn-success btn-info mb-3"><?= __('Add new') ?></a>

                            <table class="table table-striped table-hover" style="border: 2px solid lightgray;">
                                <tr>
                                    <th class="p-3"><?= __('Name') ?></th>
                                    <th class="p-3"><?= __('Address') ?></th>
                                    <th class="p-3"><?= __('Phones') ?></th>
                                    <th class="p-3"><?= __('Actions') ?></th>
                                </tr>
<?php foreach($persons as $person) {?>
                                <tr>
                                    <td class="p-3">
                                    <b><?= $person->name ?></b><br>
                                        <?= $person->description ?>
                                    </td>
                                    <td class="p-3"><?= $person->address ?></td>
                                    <td class="p-3">
                                        <?= $person->phone ?><br>
                                        <?= $person->phone2 ?>
                                    </td>
                                    <td class="p-3">
<?php if($person->action != 'del') { ?>
                                        <a href="/persons/edit/<?= $person->id ?>" class="btn btn-sm btn-success btn-info me-3"><i class="bi-pen"></i></a>
                                        <a href="/persons/delete/<?= $person->id ?>" class="btn btn-sm btn-success btn-danger"><i class="bi-trash"></i></a>
<?php }else{ ?>
                                        <a href="/persons/recoveryDeleted/<?= $person->id ?>" class="btn btn-sm btn-warning btn-info me-3"><i class="bi-arrow-left"></i></a>
<?php } ?>

                                    </td>
                                </tr>
<?php } ?>
                            </table>

						</div>

						
                    </div>
                </div>
            </section>




<?php /*
<div class="persons index content">
    <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Persons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('city_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('phone2') ?></th>
                    <th><?= $this->Paginator->sort('fax') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('website') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('iconType') ?></th>
                    <th><?= $this->Paginator->sort('icon') ?></th>
                    <th><?= $this->Paginator->sort('longitude') ?></th>
                    <th><?= $this->Paginator->sort('latitude') ?></th>
                    <th><?= $this->Paginator->sort('pos') ?></th>
                    <th><?= $this->Paginator->sort('visible') ?></th>
                    <th><?= $this->Paginator->sort('action') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>
                    <td><?= $this->Number->format($person->id) ?></td>
                    <td><?= $person->has('category') ? $this->Html->link($person->category->name, ['controller' => 'Categories', 'action' => 'view', $person->category->id]) : '' ?></td>
                    <td><?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id]) : '' ?></td>
                    <td><?= h($person->name) ?></td>
                    <td><?= h($person->description) ?></td>
                    <td><?= h($person->phone) ?></td>
                    <td><?= h($person->phone2) ?></td>
                    <td><?= h($person->fax) ?></td>
                    <td><?= h($person->email) ?></td>
                    <td><?= h($person->website) ?></td>
                    <td><?= h($person->address) ?></td>
                    <td><?= h($person->slug) ?></td>
                    <td><?= h($person->iconType) ?></td>
                    <td><?= h($person->icon) ?></td>
                    <td><?= h($person->longitude) ?></td>
                    <td><?= h($person->latitude) ?></td>
                    <td><?= $this->Number->format($person->pos) ?></td>
                    <td><?= h($person->visible) ?></td>
                    <td><?= h($person->action) ?></td>
                    <td><?= h($person->created) ?></td>
                    <td><?= h($person->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
*/ ?>