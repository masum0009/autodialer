<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iptsp $iptsp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Iptsp'), ['action' => 'edit', $iptsp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Iptsp'), ['action' => 'delete', $iptsp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iptsp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Iptsp'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Iptsp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Callback History'), ['controller' => 'CallbackHistory', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Callback History'), ['controller' => 'CallbackHistory', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="iptsp view large-9 medium-8 columns content">
    <h3><?= h($iptsp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $iptsp->has('user') ? $this->Html->link($iptsp->user->name, ['controller' => 'Users', 'action' => 'view', $iptsp->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iptsp User') ?></th>
            <td><?= h($iptsp->iptsp_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iptsp Password') ?></th>
            <td><?= h($iptsp->iptsp_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iptsp Ip') ?></th>
            <td><?= h($iptsp->iptsp_ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iptsp Number') ?></th>
            <td><?= h($iptsp->iptsp_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forwarding Number') ?></th>
            <td><?= h($iptsp->forwarding_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($iptsp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iptsp Port') ?></th>
            <td><?= $this->Number->format($iptsp->iptsp_port) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Registered') ?></th>
            <td><?= $this->Number->format($iptsp->last_registered) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($iptsp->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Callback History') ?></h4>
        <?php if (!empty($iptsp->callback_history)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Iptsp Id') ?></th>
                <th scope="col"><?= __('Call From') ?></th>
                <th scope="col"><?= __('Call To') ?></th>
                <th scope="col"><?= __('Call Status') ?></th>
                <th scope="col"><?= __('Call Duration') ?></th>
                <th scope="col"><?= __('Connect Time') ?></th>
                <th scope="col"><?= __('Establish Time') ?></th>
                <th scope="col"><?= __('Disconnect Time') ?></th>
                <th scope="col"><?= __('Disconnect Cause') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($iptsp->callback_history as $callbackHistory): ?>
            <tr>
                <td><?= h($callbackHistory->id) ?></td>
                <td><?= h($callbackHistory->users_id) ?></td>
                <td><?= h($callbackHistory->iptsp_id) ?></td>
                <td><?= h($callbackHistory->call_from) ?></td>
                <td><?= h($callbackHistory->call_to) ?></td>
                <td><?= h($callbackHistory->call_status) ?></td>
                <td><?= h($callbackHistory->call_duration) ?></td>
                <td><?= h($callbackHistory->connect_time) ?></td>
                <td><?= h($callbackHistory->establish_time) ?></td>
                <td><?= h($callbackHistory->disconnect_time) ?></td>
                <td><?= h($callbackHistory->disconnect_cause) ?></td>
                <td><?= h($callbackHistory->created) ?></td>
                <td><?= h($callbackHistory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CallbackHistory', 'action' => 'view', $callbackHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CallbackHistory', 'action' => 'edit', $callbackHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CallbackHistory', 'action' => 'delete', $callbackHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callbackHistory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
