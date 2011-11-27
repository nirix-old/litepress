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
 * User controller for handling login, logout,
 * register and usercp pages.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_Users extends Controller_Frontend
{
	public function action_login()
	{
		$this->title('Login');
		$this->view = $this->theme->view('users/login');
		
		if (Input::param() != array())
		{
			if ($user = Model_User::authenticate_login(Input::param('username'), Input::param('password')))
			{
				Cookie::set('_sess', Crypt::encode($user->login_hash));
				Response::redirect(Input::param('redirect') ? Input::param('redirect') : '/');
			}
			else
			{
				if (Input::param('redirect'))
				{
					Session::set_flash('login_redirect', Input::param('redirect'));
				}
				$this->view->errors = array('Invalid username and/or password.');
			}
		}
	}

	public function action_logout()
	{
		Cookie::set('_sess', Crypt::encode(rand(100, 900)));
		Session::set_flash('notice', 'You are now logged out.');
		Response::redirect('/');
	}

	public function action_register()
	{
		$this->title('Register');
		$this->view = $this->theme->view('users/register');
		
		$user = Model_User::forge();
		$this->view->set('user', $user);
		
		if (Input::param() != array())
		{
			$user->values(array(
				'name' => Input::param('name'),
				'username' => Input::param('username'),
				'password' => Input::param('password'),
				'email' => Input::param('email')
			));
			
			if ($user->is_valid())
			{
				$user->save();
				Response::redirect('login');
			}
			else
			{
				$this->view->errors = $user->errors();
			}
		}
	}
	
	public function action_usercp()
	{
		if (!$this->current_user->logged_in())
		{
			Session::set_flash('error', 'You need to be logged in to access is page');
			Session::set_flash('login_redirect', Uri::current());
			Response::redirect('login');
		}
		
		$this->title('UserCP');
		$this->view = $this->theme->view('users/usercp');
		
		if (Input::param() != array())
		{
			$errors = array();
			if (Model_User::authenticate_login($this->current_user->username, Input::param('current_password')))
			{
				$this->current_user->email = Input::param('email');
				
				if (Input::param('new_password'))
				{
					$this->current_user->password = Input::param('new_password');
				}
				
				if ($this->current_user->is_valid())
				{
					$this->current_user->save();
				}
				else
				{
					$errors = $errors + $this->current_user->errors();
				}
			}
			else
			{
				$errors[] = 'Current Password is invalid.';
			}
			
			$this->view->set('errors', $errors);
		}
	}
}
