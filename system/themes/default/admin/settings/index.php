<h2>Settings</h2>

<?php echo Form::open(); ?>
<?php foreach (LitePress::get_settings_info() as $id => $setting) { ?>
	<div class="group">
		<?php echo Form::label($setting['label'], "settings[{$id}]"); ?>
	<?php if ($setting['type'] == 'input') { ?>
		<?php echo Form::input("settings[{$id}]", LitePress::setting($id), array('id' => "settings[{$id}]")); ?>
	<?php } else if($setting['type'] == 'select') { ?>
		<?php echo Form::select("settings[{$id}]", LitePress::setting($id),$setting['options'], array('id' => "settings[{$id}]")); ?>
	<?php } else if($setting['type'] == 'yes_no') { ?>
		<?php echo Form::radio("settings[{$id}]", 1, LitePress::setting($id) ? array('checked') : array()); ?> Yes
		<?php echo Form::radio("settings[{$id}]", 0, !LitePress::setting($id) ? array('checked') : array()); ?> No
	<?php } ?>
	</div>
<?php } ?>
	<div class="group">
		<?php echo Form::submit('submit', 'Save'); ?>
	</div>
<?php echo Form::close(); ?>