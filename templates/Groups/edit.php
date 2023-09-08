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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $group->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="groups form content">
            <?= $this->Form->create($group) ?>
            <fieldset>
                <legend><?= __('Edit Group') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
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
