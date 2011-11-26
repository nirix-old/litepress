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

class Model_User extends Model_Base
{
	public $_validation;
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
	
	public function is_valid()
	{
		parent::is_valid();
		
		$this->_validation->add_field('name', 'Full name', 'required|min_length[3]');
		$this->_validation->add_field('username', 'Username', 'required|min_length[3]');
		$this->_validation->add_field('password', 'Password', 'required|min_length[3]');
		$this->_validation->add_field('email', 'Email', 'required|valid_email');
		
		return $this->_validation->run();
	}
}
