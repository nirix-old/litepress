<h2>Edit User</h2>
<?php echo Form::open(); ?>
	<?php echo $theme->view('admin/users/_form', array('user' => $user, 'usergroups' => $usergroups))->render(); ?>
	<div class="group">
		<?php echo Form::submit('submit', 'Save'); ?>
	</div>
<?php echo Form::close(); ?>