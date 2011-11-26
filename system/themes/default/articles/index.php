<?php foreach ($articles as $article): ?>
	<article>
		<h2><?php echo $article->title; ?></h2>
		<div class="article_content">
			<?php echo $article->body; ?>
		</div>
		<div class="article_meta">
			<?php echo $article->user->username; ?>
		</div>
	</article>
<?php endforeach; ?>