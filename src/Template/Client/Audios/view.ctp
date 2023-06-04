<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audio $audio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Audio'), ['action' => 'edit', $audio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Audio'), ['action' => 'delete', $audio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $audio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Audios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Audio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="audios view large-9 medium-8 columns content">
    <h3><?= h($audio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $audio->has('client') ? $this->Html->link($audio->client->id, ['controller' => 'Clients', 'action' => 'view', $audio->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caption') ?></th>
            <td><?= h($audio->caption) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filename') ?></th>
            <td><?= h($audio->filename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($audio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($audio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($audio->modified) ?></td>
        </tr>
    </table>
</div>
