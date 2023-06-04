<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iptsp $iptsp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Iptsp'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Callback History'), ['controller' => 'CallbackHistory', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Callback History'), ['controller' => 'CallbackHistory', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="iptsp form large-9 medium-8 columns content">
    <?= $this->Form->create($iptsp) ?>
    <fieldset>
        <legend><?= __('Add Iptsp') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('iptsp_user');
            echo $this->Form->control('iptsp_password');
            echo $this->Form->control('iptsp_ip');
            echo $this->Form->control('iptsp_port');
            echo $this->Form->control('iptsp_number');
            echo $this->Form->control('forwarding_number');
            echo $this->Form->control('last_registered');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
