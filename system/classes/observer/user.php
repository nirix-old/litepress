<?php

class Observer_User extends Orm\Observer
{
    public function before_insert(Model_User $model)
    {
		$model->salt = rand(1000, 3000);
		$model->login_hash = sha1($model->salt . time() . $model->username);
		$model->password = Model_User::hash_password($model->password, $model->salt);
    }
}