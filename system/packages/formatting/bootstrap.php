<?php
/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright Nirix
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

/**
 * Formatting autoloader setup
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 * @subpackage Formatting
 */
Autoloader::add_classes(array(
	'Formatting\\Textile' => __DIR__.'/classes/textile.php',
));
