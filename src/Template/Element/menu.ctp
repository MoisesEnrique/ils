<?= $this->Html->css('menuprincipal.css') ?>

<div class="menu1">
	<?= $this->Html->link(__('Home - ILS'), ['controller' => 'Pages','action' => 'index']) ?>

	<div class="submenu1">
		<button class="submenu1btn"><?=__('Users') ?> <i class="fa fa-caret-down"></i></button>
		<div class="submenu1-content">
		  	<?= $this->Html->link(__('New User'), ['controller' => 'Users','action' => 'add']) ?>
		  	<?= $this->Html->link(__('List Users'), ['controller' => 'Users','action' => 'index']) ?>
		</div>
	</div> 

	<div class="submenu1">
		<button class="submenu1btn"><?= __('Roles') ?> <i class="fa fa-caret-down"></i></button>
		<div class="submenu1-content">
			<?= $this->Html->link(__('New Role'), ['controller' => 'Roles','action' => 'add']) ?>
			<?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?>
		</div>
	</div> 

	<div class="submenu1">
		<button class="submenu1btn"><?= __('Courses') ?> <i class="fa fa-caret-down"></i></button>
		<div class="submenu1-content">
			<?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?>
			<?= $this->Html->link(__('List Course'), ['controller' => 'Courses', 'action' => 'index']) ?>
		</div>
	</div>

	<div class="submenu1">
		<button class="submenu1btn"><?= __('Inscriptions') ?> <i class="fa fa-caret-down"></i></button>
		<div class="submenu1-content">
			<?= $this->Html->link(__('New Inscription'), ['controller' => 'Inscriptions', 'action' => 'add']); ?>
			<?= $this->Html->link(__('List Inscriptions'), ['controller' => 'Inscriptions', 'action' => 'index']); ?>
		</div>
	</div>
	
	<div class="submenu1">
		<button class="submenu1btn"><?= __('Grades') ?> <i class="fa fa-caret-down"></i></button>
		<div class="submenu1-content">
			<?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?>
			<?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?>
		</div>
	</div>

	<div class="submenu1">
		<button class="submenu1btn"><?= __('Language') ?> <i class="fa fa-caret-down"></i></button>
		<div class="submenu1-content">
			<?= $this->Html->image('icons/32/peru_flag.ico', ['url'=>['controller' => 'App', 'action' => 'change-language', 'es_PE']]) ?>
			<?= $this->Html->image('icons/32/eeuu_flag.ico', ['url'=>['controller' => 'App', 'action' => 'change-language', 'en_US']]) ?>
		</div>
	</div>
	<div class="submenu1 nav navbar-nav navbar-right">
		<?php if (is_null($this->request->session()->read('Auth.User'))) {
				echo $this->Html->link(__('Login'), ['controller' => 'Users','action' => 'login', '_full'=>true]);
			}
			else {
				echo $this->Html->link($current_user['name'].' '.__('(Logout)'), ['controller' => 'Users','action' => 'logout', '_full'=>true]);
			}
		?>
	</div>
</div>

