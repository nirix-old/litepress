<h2>LitePress AdminCP</h2>
<ul>
<?php if ($current_user->group->is_admin) { ?>
	<li><?php echo Html::anchor('-admin/settings', 'Settings'); ?></li>
	<li><?php echo Html::anchor('-admin/users', 'Users'); ?></li>
<?php } ?>
	<li><?php echo Html::anchor('-admin/articles/new', 'New article'); ?></li>
	<li><?php echo Html::anchor('-admin/articles', 'Manage articles'); ?></li>
</ul>