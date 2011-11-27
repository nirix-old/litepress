<h2>Articles Management</h2>

<table>
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($articles as $article): ?>
		<tr>
			<td><?php echo Html::anchor("-admin/articles/edit/{$article->id}", $article->title); ?></td>
			<td><?php echo Html::anchor("-admin/articles/delete/{$article->id}", 'Delete', array('data-confirm' => "Really delete article '{$article->title}' ?")); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>