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
 * User model observer.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Observer_User extends Orm\Observer
{
	public function before_insert(Model_User $model)
	{
		$model->salt = rand(1000, 3000);
		$model->login_hash = sha1($model->salt . time() . $model->username);
		$model->password = Model_User::hash_password($model->password, $model->salt);
		$model->validated = 1; // For now, later it'll be controlled by the settings.
	}

	public function before_update(Model_User $model)
	{
		// Check if the password has been changed
		// if so, hash the new one.
		if ($model->is_changed('password'))
		{
			$this->hash_password($model);
		}
	}

	private function hash_password(Model_User $model)
	{
		$model->password = Model_User::hash_password($model->password, $model->salt);
	}
}