<?php
/**
 * LitePress
 * Copyright (C) Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 *
 * @since 0.1
 * @package LitePress
 */

class Model_User extends \Orm\Model
{
	protected static $_table_name = 'users';
	//protected static $_belongs_to = array('group');
	
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'salt',
		'email',
		'name',
		'group_id',
		'login_hash',
		'created_at',
		'updated_at'
	);
}
