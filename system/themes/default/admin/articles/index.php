<h2>Articles Management</h2>

<table>
	<thead>
		<th>Title</th>
		<th></th>
	</thead>
	<tbody>
	<?php foreach ($articles as $article): ?>
		<tr>
			<td><?php echo Html::anchor("-admin/articles/edit/{$article->id}", $article->title); ?></td>
			<td><?php echo Html::anchor("-admin/articles/delete/{$article->id}", 'Delete'); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>