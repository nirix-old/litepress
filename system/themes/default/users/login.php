<?php echo Form::open(); ?>
<?php if (Session::get_flash('login_redirect')) { ?>
	<?php echo Form::hidden('redirect', Session::get_flash('login_redirect')); ?>
<?php } ?>
<?php if (isset($errors)) { ?>
	<div class="error">
		<?php echo implode('<br />', $errors); ?>
	</div>
<?php } ?>
	<div class="group">
		<?php echo Form::label('Username', 'username'); ?>
		<?php echo Form::input('username', '', array('id'=>'username')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Password', 'password'); ?>
		<?php echo Form::password('password', '', array('id'=>'password')); ?>
	</div>
	<div class="group">
		<?php echo Form::submit('submit', 'Login'); ?>
	</div>
<?php echo Form::close(); ?>