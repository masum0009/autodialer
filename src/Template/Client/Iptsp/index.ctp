<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iptsp[]|\Cake\Collection\CollectionInterface $iptsp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Iptsp'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Callback History'), ['controller' => 'CallbackHistory', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Callback History'), ['controller' => 'CallbackHistory', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="iptsp index large-9 medium-8 columns content">
    <h3><?= __('Iptsp') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iptsp_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iptsp_password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iptsp_ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iptsp_port') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iptsp_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forwarding_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_registered') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($iptsp as $iptsp): ?>
            <tr>
                <td><?= $this->Number->format($iptsp->id) ?></td>
                <td><?= $iptsp->has('user') ? $this->Html->link($iptsp->user->name, ['controller' => 'Users', 'action' => 'view', $iptsp->user->id]) : '' ?></td>
                <td><?= h($iptsp->iptsp_user) ?></td>
                <td><?= h($iptsp->iptsp_password) ?></td>
                <td><?= h($iptsp->iptsp_ip) ?></td>
                <td><?= $this->Number->format($iptsp->iptsp_port) ?></td>
                <td><?= h($iptsp->iptsp_number) ?></td>
                <td><?= h($iptsp->forwarding_number) ?></td>
                <td><?= $this->Number->format($iptsp->last_registered) ?></td>
                <td><?= h($iptsp->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $iptsp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $iptsp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $iptsp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iptsp->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
