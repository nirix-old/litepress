<?php if (isset($errors)): ?>
	<div class="error">
		<?php echo Html::ul($errors); ?>
	</div>
<?php endif; ?>
	<div class="group">
		<?php echo Form::label('Full name', 'title'); ?>
		<?php echo Form::input('name', $user->name, array('id' => 'name')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Username', 'username'); ?>
		<?php echo Form::input('username', $user->username, array('id' => 'username')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Email', 'email'); ?>
		<?php echo Form::input('email', $user->email, array('id' => 'email', 'type' => 'email')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Group', 'group'); ?>
		<?php echo Form::select('group', $user->group_id, $usergroups, array('id' => 'group')); ?>
	</div>