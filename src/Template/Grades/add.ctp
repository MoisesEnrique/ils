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

<?php
$this->end();

$this->start('tb_sidebar');
?>

<?php
$this->end();
?>
<?= $this->Form->create($grade); ?>
<fieldset>
    <legend><?= __('Add {0}', [__('Grade')]) ?></legend>
    <?php
	    echo $this->Form->control('course_id', ['options' => $courses]);
	    echo $this->Form->control('inscription_id', ['options' => $inscriptions]);
	    echo $this->Form->control('calification');
	    echo $this->Form->control('published');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
