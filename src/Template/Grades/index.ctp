<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Grade'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Inscriptions'), ['controller' => 'Inscriptions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Inscription'), ['controller' => 'Inscriptions', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('calification'); ?></th>
            <th><?= $this->Paginator->sort('published'); ?></th>
            <th><?= $this->Paginator->sort('course_id'); ?></th>
            <th><?= $this->Paginator->sort('inscription_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grades as $grade): ?>
        <tr>
            <td><?= $this->Number->format($grade->id) ?></td>
            <td><?= $this->Number->format($grade->calification) ?></td>
            <td><?= h($grade->published) ?></td>
            <td>
                <?= $grade->has('course') ? $this->Html->link($grade->course->name, ['controller' => 'Courses', 'action' => 'view', $grade->course->id]) : '' ?>
            </td>
            <td>
                <?= $grade->has('inscription') ? $this->Html->link($grade->inscription->id, ['controller' => 'Inscriptions', 'action' => 'view', $grade->inscription->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $grade->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $grade->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
