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

/**
 * Base Database Config.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'active' => 'default',

	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'persistent' => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => false,
	),

	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 6379,
		)
	),

);
