	<article>
		<h2><?php echo Uri::current() == Uri::create($article->href()) ? $article->title : Html::anchor($article->href(), $article->title); ?></h2>
		<div class="article_content">
			<?php echo \Formatting\Textile::format($article->body); ?>
		</div>
		<div class="article_meta">
			<?php echo Date::time_ago($article->created_at); ?> by <?php echo $article->user->username; ?>
		</div>
	</article>