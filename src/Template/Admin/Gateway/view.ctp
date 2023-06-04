<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gateway $gateway
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gateway'), ['action' => 'edit', $gateway->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gateway'), ['action' => 'delete', $gateway->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gateway->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gateway'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gateway'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campaigns'), ['controller' => 'Campaigns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign'), ['controller' => 'Campaigns', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gateway view large-9 medium-8 columns content">
    <h3><?= h($gateway->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($gateway->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $gateway->has('user') ? $this->Html->link($gateway->user->name, ['controller' => 'Users', 'action' => 'view', $gateway->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($gateway->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($gateway->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($gateway->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prefix') ?></th>
            <td><?= h($gateway->prefix) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gateway->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Port') ?></th>
            <td><?= $this->Number->format($gateway->port) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call Rate') ?></th>
            <td><?= $this->Number->format($gateway->call_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call Pulse') ?></th>
            <td><?= $this->Number->format($gateway->call_pulse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Rate') ?></th>
            <td><?= $this->Number->format($gateway->service_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gateway->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gateway->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Campaigns') ?></h4>
        <?php if (!empty($gateway->campaigns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Calls Id') ?></th>
                <th scope="col"><?= __('File Name') ?></th>
                <th scope="col"><?= __('Contact Groups') ?></th>
                <th scope="col"><?= __('Call Duration') ?></th>
                <th scope="col"><?= __('Gateway Id') ?></th>
                <th scope="col"><?= __('Frequency') ?></th>
                <th scope="col"><?= __('Dialing') ?></th>
                <th scope="col"><?= __('Received') ?></th>
                <th scope="col"><?= __('Failed') ?></th>
                <th scope="col"><?= __('Busy') ?></th>
                <th scope="col"><?= __('Max Call Duration') ?></th>
                <th scope="col"><?= __('Max Call Retry') ?></th>
                <th scope="col"><?= __('Time Between Retries') ?></th>
                <th scope="col"><?= __('Play Count') ?></th>
                <th scope="col"><?= __('Caller Id Number') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Weekdays') ?></th>
                <th scope="col"><?= __('Start At') ?></th>
                <th scope="col"><?= __('Finished At') ?></th>
                <th scope="col"><?= __('Daily Start Time') ?></th>
                <th scope="col"><?= __('Daily Stop Time') ?></th>
                <th scope="col"><?= __('Timezone') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gateway->campaigns as $campaigns): ?>
            <tr>
                <td><?= h($campaigns->id) ?></td>
                <td><?= h($campaigns->name) ?></td>
                <td><?= h($campaigns->users_id) ?></td>
                <td><?= h($campaigns->calls_id) ?></td>
                <td><?= h($campaigns->file_name) ?></td>
                <td><?= h($campaigns->contact_groups) ?></td>
                <td><?= h($campaigns->call_duration) ?></td>
                <td><?= h($campaigns->gateway_id) ?></td>
                <td><?= h($campaigns->frequency) ?></td>
                <td><?= h($campaigns->dialing) ?></td>
                <td><?= h($campaigns->received) ?></td>
                <td><?= h($campaigns->failed) ?></td>
                <td><?= h($campaigns->busy) ?></td>
                <td><?= h($campaigns->max_call_duration) ?></td>
                <td><?= h($campaigns->max_call_retry) ?></td>
                <td><?= h($campaigns->time_between_retries) ?></td>
                <td><?= h($campaigns->play_count) ?></td>
                <td><?= h($campaigns->caller_id_number) ?></td>
                <td><?= h($campaigns->description) ?></td>
                <td><?= h($campaigns->weekdays) ?></td>
                <td><?= h($campaigns->start_at) ?></td>
                <td><?= h($campaigns->finished_at) ?></td>
                <td><?= h($campaigns->daily_start_time) ?></td>
                <td><?= h($campaigns->daily_stop_time) ?></td>
                <td><?= h($campaigns->timezone) ?></td>
                <td><?= h($campaigns->status) ?></td>
                <td><?= h($campaigns->created) ?></td>
                <td><?= h($campaigns->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Campaigns', 'action' => 'view', $campaigns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Campaigns', 'action' => 'edit', $campaigns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campaigns', 'action' => 'delete', $campaigns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaigns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
