<h2>Articles Management</h2>

<table>
	<thead>
		<th>Title</th>
		<th></th>
	</thead>
	<tbody>
	<?php foreach ($articles as $article): ?>
		<tr>
			<td><?php echo Html::anchor("-admin/articles/{$article->id}/edit", $article->title); ?></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>