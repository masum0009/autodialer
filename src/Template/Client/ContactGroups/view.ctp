<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactGroup $contactGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact Group'), ['action' => 'edit', $contactGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact Group'), ['action' => 'delete', $contactGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contactGroups view large-9 medium-8 columns content">
    <h3><?= h($contactGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contactGroup->has('user') ? $this->Html->link($contactGroup->user->name, ['controller' => 'Users', 'action' => 'view', $contactGroup->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group Name') ?></th>
            <td><?= h($contactGroup->group_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contactGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contactGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contactGroup->modified) ?></td>
        </tr>
    </table>
</div>
