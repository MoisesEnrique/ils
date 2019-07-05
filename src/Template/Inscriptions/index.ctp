<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Inscription'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('courses_id'); ?></th>
            <th><?= $this->Paginator->sort('year'); ?></th>
            <th><?= $this->Paginator->sort('cycle'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inscriptions as $inscription): ?>
        <tr>
            <td><?= $this->Number->format($inscription->id) ?></td>
            <td>
                <?= $inscription->has('user') ? $this->Html->link($inscription->user->name, ['controller' => 'Users', 'action' => 'view', $inscription->user->id]) : '' ?>
            </td>
            <td>
                <?= $inscription->has('course') ? $this->Html->link($inscription->course->name, ['controller' => 'Courses', 'action' => 'view', $inscription->course->id]) : '' ?>
            </td>
            <td><?= h($inscription->year) ?></td>
            <td><?= $this->Number->format($inscription->cycle) ?></td>

            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $inscription->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $inscription->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $inscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscription->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
