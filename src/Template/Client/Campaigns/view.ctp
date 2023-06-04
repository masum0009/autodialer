<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campaign'), ['action' => 'edit', $campaign->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campaign'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campaigns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls'), ['controller' => 'Calls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Call'), ['controller' => 'Calls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campaigns view large-9 medium-8 columns content">
    <h3><?= h($campaign->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($campaign->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $campaign->has('user') ? $this->Html->link($campaign->user->name, ['controller' => 'Users', 'action' => 'view', $campaign->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call') ?></th>
            <td><?= $campaign->has('call') ? $this->Html->link($campaign->call->id, ['controller' => 'Calls', 'action' => 'view', $campaign->call->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Name') ?></th>
            <td><?= h($campaign->file_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Groups') ?></th>
            <td><?= h($campaign->contact_groups) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weekdays') ?></th>
            <td><?= h($campaign->weekdays) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timezone') ?></th>
            <td><?= h($campaign->timezone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($campaign->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call Duration') ?></th>
            <td><?= $this->Number->format($campaign->call_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gateway Id') ?></th>
            <td><?= $this->Number->format($campaign->gateway_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $this->Number->format($campaign->frequency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dialing') ?></th>
            <td><?= $this->Number->format($campaign->dialing) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Received') ?></th>
            <td><?= $this->Number->format($campaign->received) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Failed') ?></th>
            <td><?= $this->Number->format($campaign->failed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Busy') ?></th>
            <td><?= $this->Number->format($campaign->busy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Call Duration') ?></th>
            <td><?= $this->Number->format($campaign->max_call_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Call Retry') ?></th>
            <td><?= $this->Number->format($campaign->max_call_retry) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time Between Retries') ?></th>
            <td><?= $this->Number->format($campaign->time_between_retries) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Play Count') ?></th>
            <td><?= $this->Number->format($campaign->play_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caller Id Number') ?></th>
            <td><?= $this->Number->format($campaign->caller_id_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($campaign->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start At') ?></th>
            <td><?= h($campaign->start_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finished At') ?></th>
            <td><?= h($campaign->finished_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Daily Start Time') ?></th>
            <td><?= h($campaign->daily_start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Daily Stop Time') ?></th>
            <td><?= h($campaign->daily_stop_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($campaign->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($campaign->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($campaign->description)); ?>
    </div>
</div>
