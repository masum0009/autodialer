<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CallbackHistory $callbackHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Callback History'), ['action' => 'edit', $callbackHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Callback History'), ['action' => 'delete', $callbackHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callbackHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Callback History'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Callback History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callbackHistory view large-9 medium-8 columns content">
    <h3><?= h($callbackHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $callbackHistory->has('user') ? $this->Html->link($callbackHistory->user->name, ['controller' => 'Users', 'action' => 'view', $callbackHistory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call From') ?></th>
            <td><?= h($callbackHistory->call_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call To') ?></th>
            <td><?= h($callbackHistory->call_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($callbackHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iptsp Id') ?></th>
            <td><?= $this->Number->format($callbackHistory->iptsp_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call Status') ?></th>
            <td><?= $this->Number->format($callbackHistory->call_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call Duration') ?></th>
            <td><?= $this->Number->format($callbackHistory->call_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Connect Time') ?></th>
            <td><?= $this->Number->format($callbackHistory->connect_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Establish Time') ?></th>
            <td><?= $this->Number->format($callbackHistory->establish_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disconnect Time') ?></th>
            <td><?= $this->Number->format($callbackHistory->disconnect_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disconnect Cause') ?></th>
            <td><?= $this->Number->format($callbackHistory->disconnect_cause) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($callbackHistory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($callbackHistory->modified) ?></td>
        </tr>
    </table>
</div>
