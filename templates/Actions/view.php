<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action $action
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Action'), ['action' => 'edit', $action->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Action'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Action'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actions view content">
            <h3><?= h($action->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $action->has('product') ? $this->Html->link($action->product->name, ['controller' => 'Products', 'action' => 'view', $action->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $action->has('user') ? $this->Html->link($action->user->id, ['controller' => 'Users', 'action' => 'view', $action->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($action->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller User Id') ?></th>
                    <td><?= $this->Number->format($action->seller_user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($action->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action Date') ?></th>
                    <td><?= h($action->action_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($action->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($action->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
