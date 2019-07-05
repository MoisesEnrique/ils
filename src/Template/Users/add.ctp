<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');



$this->start('tb_sidebar');
?>

<?php
$this->end();
?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Add {0}', [__('User')]) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('age');
    echo $this->Form->control('dni');
    echo $this->Form->control('role_id', ['options' => $roles]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
