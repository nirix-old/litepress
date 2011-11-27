<h2>User Management</h2>

<table>
	<thead>
		<tr>
			<th>Username</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo Html::anchor("-admin/users/edit/{$user->id}", $user->username); ?></td>
			<td><?php echo Html::anchor("-admin/users/delete/{$user->id}", 'Delete', array('data-confirm' => "Really delete '{$user->username}' ?")); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>