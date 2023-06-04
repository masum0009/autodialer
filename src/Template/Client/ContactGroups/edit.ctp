<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactGroup $contactGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contact Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contactGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($contactGroup) ?>
    <fieldset>
        <legend><?= __('Edit Contact Group') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('group_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
