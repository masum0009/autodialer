<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contact Groups'), ['controller' => 'ContactGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Group'), ['controller' => 'ContactGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contacts view large-9 medium-8 columns content">
    <h3><?= h($contact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contact->has('user') ? $this->Html->link($contact->user->name, ['controller' => 'Users', 'action' => 'view', $contact->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($contact->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Name') ?></th>
            <td><?= h($contact->contact_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Group') ?></th>
            <td><?= $contact->has('contact_group') ? $this->Html->link($contact->contact_group->id, ['controller' => 'ContactGroups', 'action' => 'view', $contact->contact_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($contact->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contact->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contact->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contact->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Extra Information') ?></h4>
        <?= $this->Text->autoParagraph(h($contact->extra_information)); ?>
    </div>
</div>
