<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Grade'), ['action' => 'edit', $grade->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Grade'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?> </li>
<li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Inscriptions'), ['controller' => 'Inscriptions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Inscription'), ['controller' => 'Inscriptions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Grade'), ['action' => 'edit', $grade->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Grade'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?> </li>
<li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Inscriptions'), ['controller' => 'Inscriptions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Inscription'), ['controller' => 'Inscriptions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($grade->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Course') ?></td>
            <td><?= $grade->has('course') ? $this->Html->link($grade->course->name, ['controller' => 'Courses', 'action' => 'view', $grade->course->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Inscription') ?></td>
            <td><?= $grade->has('inscription') ? $this->Html->link($grade->inscription->id, ['controller' => 'Inscriptions', 'action' => 'view', $grade->inscription->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($grade->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Calification') ?></td>
            <td><?= $this->Number->format($grade->calification) ?></td>
        </tr>
        <tr>
            <td><?= __('Published') ?></td>
            <td><?= h($grade->published) ?></td>
        </tr>
    </table>
</div>

