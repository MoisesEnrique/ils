<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grade $grade
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $grade->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Inscriptions'), ['controller' => 'Inscriptions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Inscription'), ['controller' => 'Inscriptions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $grade->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Inscriptions'), ['controller' => 'Inscriptions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Inscription'), ['controller' => 'Inscriptions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($grade); ?>
<fieldset>
    <legend><?= __('Edit {0}', [__('Grade')]) ?></legend>
    <?php
    echo $this->Form->control('calification');
    echo $this->Form->control('published');
    echo $this->Form->control('course_id', ['options' => $courses]);
    echo $this->Form->control('inscription_id', ['options' => $inscriptions]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
