<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>

<?php
$this->end();

$this->start('tb_sidebar');
?>

</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h2 class="panel-title"><?= h($course->name) ?></h2>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($course->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Teoric Hours') ?></td>
            <td><?= $this->Number->format($course->teoric_hours) ?></td>
        </tr>
        <tr>
            <td><?= __('Practice Hours') ?></td>
            <td><?= $this->Number->format($course->practice_hours) ?></td>
        </tr>
        <tr>
            <td><?= __('Credits') ?></td>
            <td><?= $this->Number->format($course->credits) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h2 class="panel-title"><?= __('Related Grades') ?></h2>
    </div>
    <?php if (!empty($course->grades)): ?>
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
            <?php foreach ($course->grades as $grades): ?>
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
        <p class="panel-body"><?= __('no related Grades') ?></p>
    <?php endif; ?>
</div>
