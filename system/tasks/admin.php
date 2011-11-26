<?php
/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

namespace Fuel\Tasks;

/**
 * Admin tasks
 *
 * @since 0.1
 * @package LitePress
 * @subpackage Tasks
 */
class Admin
{
	/**
	 * php oil r admin
	 *
	 * @return string
	 */
	public static function run()
	{
		echo "useage: oil r admin:set username";
	}
	
	public static function set($username)
	{
		$user = \Model_User::find('first', array('where' => array('username' => $username)));
		$user->group_id = 1;
		$user->save();
		echo "{$username} is now an admin.";
	}
}