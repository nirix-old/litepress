<?php
/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 *
 * @since 0.1
 * @package LitePress
 * @subpackage Config
 */

return array(
	'_root_'  => 'articles/index',  // The default route
	'_404_'   => 'errors/404',    // The main 404 route
	
	'(login|logout|register|usercp)' => 'users/$1', // User routes
	
	'-admin' => 'admin/dashboard/index',
	'-admin/(:any)' => 'admin/$1/index',
);