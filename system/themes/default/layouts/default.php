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
				<h1><?php echo Html::anchor('/', LitePress::setting('title')); ?></h1>
				<nav id="nav">
					<ul>
					<?php if ($current_user->group->is_admin or $current_user->group->is_author): ?>
						<li><?php echo Html::anchor('-admin', 'AdminCP'); ?></li>
					<?php endif; ?>
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
			<?php if (Session::get_flash('success')): ?>
				<div class="success"><?php echo implode('<br />', (array) Session::get_flash('success')); ?></div>
			<?php endif; ?>
			<?php if (Session::get_flash('error')): ?>
				<div class="error"><?php echo implode('<br />', (array) Session::get_flash('error')); ?></div>
			<?php endif; ?>
			<?php if (Session::get_flash('notice')): ?>
				<div class="notice"><?php echo implode('<br />', (array) Session::get_flash('notice')); ?></div>
			<?php endif; ?>
			<section id="page">
				<?php echo $content; ?>
			</section>
			<footer id="footer">
				LitePress <?php echo LitePress::version(); ?> &copy; <?php echo Html::anchor('http://nirix.net/go=litepress', 'Nirix'); ?><br />Page rendered in {exec_time}s using {mem_usage}mb of memory.
			</footer>
		</div>
	</body>
</html>