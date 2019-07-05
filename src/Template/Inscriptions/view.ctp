<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Inscription'), ['action' => 'edit', $inscription->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Inscription'), ['action' => 'delete', $inscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscription->id)]) ?> </li>
<li><?= $this->Html->link(__('List Inscriptions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Inscription'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Inscription'), ['action' => 'edit', $inscription->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Inscription'), ['action' => 'delete', $inscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscription->id)]) ?> </li>
<li><?= $this->Html->link(__('List Inscriptions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Inscription'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($inscription->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $inscription->has('user') ? $this->Html->link($inscription->user->name, ['controller' => 'Users', 'action' => 'view', $inscription->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Course') ?></td>
            <td><?= $inscription->has('course') ? $this->Html->link($inscription->course->name, ['controller' => 'Courses', 'action' => 'view', $inscription->course->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Year') ?></td>
            <td><?= h($inscription->year) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($inscription->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Cycle') ?></td>
            <td><?= $this->Number->format($inscription->cycle) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Grades') ?></h3>
    </div>
    <?php if (!empty($inscription->grades)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Calification') ?></th>
                <th><?= __('Published') ?></th>
                <th><?= __('Course Id') ?></th>
                <th><?= __('Inscription Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($inscription->grades as $grades): ?>
                <tr>
                    <td><?= h($grades->id) ?></td>
                    <td><?= h($grades->calification) ?></td>
                    <td><?= h($grades->published) ?></td>
                    <td><?= h($grades->course_id) ?></td>
                    <td><?= h($grades->inscription_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Grades', 'action' => 'view', $grades->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Grades', 'action' => 'edit', $grades->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Grades', 'action' => 'delete', $grades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grades->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Grades</p>
    <?php endif; ?>
</div>
