<?php foreach ($articles as $article) {
	echo $theme->view('articles/_article', array('article' => $article));
} ?>