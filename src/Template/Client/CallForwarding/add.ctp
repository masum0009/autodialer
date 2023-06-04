<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CallbackHistory $callbackHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Callback History'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callbackHistory form large-9 medium-8 columns content">
    <?= $this->Form->create($callbackHistory) ?>
    <fieldset>
        <legend><?= __('Add Callback History') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('iptsp_id');
            echo $this->Form->control('call_from');
            echo $this->Form->control('call_to');
            echo $this->Form->control('call_status');
            echo $this->Form->control('call_duration');
            echo $this->Form->control('connect_time');
            echo $this->Form->control('establish_time');
            echo $this->Form->control('disconnect_time');
            echo $this->Form->control('disconnect_cause');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
