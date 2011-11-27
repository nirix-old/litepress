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
 * User model
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 */
class Model_User extends Model_Base
{
	protected static $_table_name = 'users';
	protected static $_belongs_to = array('group');
	
	protected $_logged_in;
	
	protected static $_observers = array(
		'Observer_User',
		'Orm\\Observer_CreatedAt' => array('before_insert'),
		'Orm\\Observer_UpdatedAt' => array('before_save'),
		'Orm\\Observer_Validation' => array('before_save')
	);
	
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'salt',
		'email',
		'name',
		'group_id' => array('default' => 4),
		'login_hash',
		'created_at',
		'updated_at'
	);
	
	/**
	 * Checks if the user data is valid
	 *
	 * @return bool
	 */
	public function is_valid()
	{
		$this->enable_validation();
		
		$this->_validation->add_field('name', 'Full name', 'required|min_length[3]');
		$this->_validation->add_field('username', 'Username', 'min_length[3]' . ($this->is_new() ? '|required|unique[users.username]' : ''));
		$this->_validation->add_field('password', 'Password', 'min_length[3]' . ($this->is_new() ? '|required' : ''));
		$this->_validation->add_field('email', 'Email', 'required|valid_email' . ($this->is_new() ? '|unique[users.email]' : ''));
		
		return $this->_validation->run();
	}
	
	/**
	 * Authenticates a username and password.
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return mixed
	 */
	public static function authenticate_login($username, $password)
	{
		$user = static::find('first', array('where' => array('username' => $username)));
		return (isset($user->password) and static::hash_password($password, $user->salt) == $user->password) ? $user : false;
	}
	
	/**
	 * Hashes the password with the salt
	 *
	 * @param string $password
	 * @param mixed $salt
	 *
	 * @return string
	 */
	public static function hash_password($password, $salt)
	{
		return sha1($salt . $password . $salt);
	}
	
	/**
	 * Checks if the user is logged in, to be used with $current_user->logged_in();
	 *
	 * @return bool
	 */
	public function logged_in()
	{
		return $this->_logged_in;
	}
	
	/**
	 * Sets the logged in value;
	 *
	 * @param bool $val
	 */
	public function _set_logged_in($val)
	{
		$this->_logged_in = $val;
	}
}
