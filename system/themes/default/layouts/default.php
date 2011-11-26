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
				<nav id="nav">
					<ul>
					<?php if (!$current_user->logged_in()): ?>
						<li><?php echo Html::anchor('login', 'Login'); ?></li>
						<li><?php echo Html::anchor('register', 'Register'); ?></li>
					<?php else: ?>
						<li><?php echo Html::anchor('usercp', 'UserCP'); ?></li>
						<li><?php echo Html::anchor('logout', 'Logout'); ?></li>
					<?php endif; ?>
					</ul>
				</nav>
			</header>
			<?php if (Session::get_flash('notice')): ?>
				<div class="notice"><?php echo implode('<br />', (array) Session::get_flash('notice')); ?></div>
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