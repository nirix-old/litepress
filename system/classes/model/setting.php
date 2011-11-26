<?php
/**
 * LitePress
 * Copyright (C) Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright Nirix
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

/**
 * Settings model
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 */
class Model_Setting extends Model_Base
{
	protected static $_table_name = 'settings';
	
	protected static $_properties = array(
		'id',
		'setting',
		'value'
	);
	
	public static $_observers = array();
}
