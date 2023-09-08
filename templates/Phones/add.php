<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone $phone
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Phones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="phones form content">
            <?= $this->Form->create($phone) ?>
            <fieldset>
                <legend><?= __('Add Phone') ?></legend>
                <?php
                    echo $this->Form->control('person_id');
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('ext');
                    echo $this->Form->control('email');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('iconType');
                    echo $this->Form->control('icon');
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
