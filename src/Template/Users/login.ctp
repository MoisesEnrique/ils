<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>


<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

?>
<!-- include the BotDetect layout stylesheet --> 
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?> 

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->input('email') ?>
        <?= $this->Form->input('password') ?>
        <!-- show captcha image html --> 
	    <?= captcha_image_html() ?> 

	    <!-- Captcha code user input textbox --> 
	    <?= $this->Form->input('CaptchaCode', [ 
			'label' => __('Retype the characters from the picture:'), 
			'maxlength' => '10', 
			'style' => 'width: 270px;', 
			'id' => 'CaptchaCode' 
	    ]) ?> 


    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>

<script type='text/javascript'>
	$(function(){
		$('.reload_captcha').click(function(e){
			e.preventDefault();
			$('.captcha').attr('src', $('.captcha').attr('src'));
		});		
	});
</script>