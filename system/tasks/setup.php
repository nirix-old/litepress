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
 * Setup tasks
 *
 * @since 0.1
 * @package LitePress
 * @subpackage Tasks
 */
class Setup
{
	/**
	 * php oil r setup
	 *
	 * @return string
	 */
	public static function run()
	{
		echo "Welcome to LitePress, please run 'php oil r migrate'\n", "then 'php oil r setup:install'";
	}
	
	public static function install()
	{
		//\Migrate::latest();
		
		// Insert the default settings and user groups
		echo "\nInserting defaults...";
		\DB::insert('settings')->columns(array('setting', 'value'))->values(array('title', 'LitePress'))->execute();
		\DB::insert('settings')->columns(array('setting', 'value'))->values(array('theme', 'default'))->execute();
		
		$groups = array(
			array('Admin', 1, 1, 1, 1, 1),
			array('Author', 0, 1, 1, 1, 1),
			array('Reader', 0, 0, 0, 0, 0),
			array('Validating', 0, 0, 0, 0, 0),
			array('Guest', 0, 0, 0, 0, 0)
		);
		
		foreach ($groups as $group)
		{
			$row = \Model_Group::forge(array(
				'name' => $group[0],
				'is_admin' => $group[1],
				'is_author' => $group[2],
				'create_articles' => $group[3],
				'edit_articles' => $group[4],
				'delete_articles' => $group[5],
			));
			$row->save();
		}
		
		// Create an admin account
		echo "\nCreating admin account...";
		$admin_password = strtolower(substr(sha1(time() . rand(1, 100)), 0, 5));
		$admin = \Model_User::forge(array('name' => 'Admin', 'username' => 'Admin', 'password' => $admin_password, 'email' => 'you@example.com', 'group_id' => 1));
		$admin->save();
		echo "\nAdmin account created,", "\nUsername: Admin\n", "Password: " . $admin_password;
	}
}