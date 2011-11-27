<?php

class Observer_User extends Orm\Observer
{
	public function before_insert(Model_User $model)
	{
		$model->salt = rand(1000, 3000);
		$model->login_hash = sha1($model->salt . time() . $model->username);
		$model->password = Model_User::hash_password($model->password, $model->salt);
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