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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h2 class="panel-title"><?= h($user->name.' '.$user->last_name) ?></h2>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Last Name') ?></td>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Password') ?></td>
            <td><?= h('*******') ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Age') ?></td>
            <td><?= $this->Number->format($user->age) ?></td>
        </tr>
        <tr>
            <td><?= __('DNI') ?></td>
            <td><?= $this->Number->format($user->dni, ['pattern' => '########']) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h2 class="panel-title"><?= __('Related Inscriptions') ?></h2>
    </div>
    <?php if (!empty($user->inscriptions)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                                
                <th><?= __('Courses Id') ?></th>
                <th><?= __('Year') ?></th>
                <th><?= __('Cycle') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->inscriptions as $inscriptions): ?>
                <tr>
                                      
                    <td><?= h($inscriptions->courses_id) ?></td>
                    <td><?= h($inscriptions->year) ?></td>
                    <td><?= h($inscriptions->cycle) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Inscriptions', 'action' => 'view', $inscriptions->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Inscriptions', 'action' => 'edit', $inscriptions->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Inscriptions', 'action' => 'delete', $inscriptions->id], ['confirm' => __('Are you sure you want to delete {0}?', $inscriptions->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body"><?= __('no related Inscriptions')?></p>
    <?php endif; ?>
</div>
