<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action[]|\Cake\Collection\CollectionInterface $actions
 */
?>
<div class="actions index content">
    <?= $this->Html->link(__('New Action'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('action_date') ?></th>
                    <th><?= $this->Paginator->sort('seller_user_id') ?></th>
                    <th><?= $this->Paginator->sort('buyer_user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actions as $action): ?>
                <tr>
                    <td><?= $this->Number->format($action->id) ?></td>
                    <td><?= $action->has('product') ? $this->Html->link($action->product->name, ['controller' => 'Products', 'action' => 'view', $action->product->id]) : '' ?></td>
                    <td><?= h($action->action_date) ?></td>
                    <td><?= $this->Number->format($action->seller_user_id) ?></td>
                    <td><?= $action->has('user') ? $this->Html->link($action->user->id, ['controller' => 'Users', 'action' => 'view', $action->user->id]) : '' ?></td>
                    <td><?= h($action->created) ?></td>
                    <td><?= h($action->modified) ?></td>
                    <td><?= $this->Number->format($action->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $action->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $action->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
