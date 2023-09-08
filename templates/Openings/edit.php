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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $opening->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $opening->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Openings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="openings form content">
            <?= $this->Form->create($opening) ?>
            <fieldset>
                <legend><?= __('Edit Opening') ?></legend>
                <?php
                    echo $this->Form->control('person_id');
                    echo $this->Form->control('name');
                    echo $this->Form->control('hour_from');
                    echo $this->Form->control('hour_to');
                    echo $this->Form->control('comment');
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
