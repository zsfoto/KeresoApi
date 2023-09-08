<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $cities
 * @var string[]|\Cake\Collection\CollectionInterface $myUsers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Edit Person') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $myUsers]);
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('city_id', ['options' => $cities]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('phone2');
                    echo $this->Form->control('fax');
                    echo $this->Form->control('email');
                    echo $this->Form->control('website');
                    echo $this->Form->control('address');
                    echo $this->Form->control('more');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('iconType');
                    echo $this->Form->control('icon');
                    echo $this->Form->control('longitude');
                    echo $this->Form->control('latitude');
                    echo $this->Form->control('pos');
                    echo $this->Form->control('visible');
                    echo $this->Form->control('action');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
