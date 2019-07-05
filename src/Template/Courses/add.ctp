<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');

$this->end();

$this->start('tb_sidebar');
?>

<?php
$this->end();
?>
<?= $this->Form->create($course); ?>
<fieldset>
    <legend><?= __('Add {0}', [__('Course')]) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('teoric_hours');
    echo $this->Form->control('practice_hours');
    echo $this->Form->control('credits');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
