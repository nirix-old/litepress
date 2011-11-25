<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo implode(' / ', $title); ?></title>
		<link rel="stylesheet" href="<?php echo Uri::create('assets/css/screen.css'); ?>">
		<link rel="stylesheet" href="<?php echo Uri::create('assets/css/master.css'); ?>">
		<link rel="stylesheet" href="<?php echo Uri::create('assets/css/print.css'); ?>" media="print">
	</head>
	<body>
		<div id="wrapper">
			<header id="header">
				<h1>LitePress</h1>
			</header>
			<?php if (Session::get_flash('notice')): ?>
				<div class="notice"><p><?php echo implode('</p><p>', (array) Session::get_flash('notice')); ?></div></p>
			<?php endif; ?>
			<section id="page">
				<?php echo $content; ?>
			</section>
			<footer id="footer">
				LitePress &copy; <abbr title="Rainbird Studios">RBS</abbr><br />Page rendered in {exec_time}s using {mem_usage}mb of memory.
			</footer>
		</div>
	</body>
</html>