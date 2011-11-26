<?php
/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 *
 * @since 0.1
 * @package LitePress
 */

class Controller_Users extends Controller_Frontend
{
	public function action_login()
	{
		$this->template->title[] = 'Login';
		$this->view = $this->theme->view('users/login');
		
		if (Input::param() != array())
		{
			if ($user = Model_User::authenticate_login(Input::param('username'), Input::param('password')))
			{
				Cookie::set('_sess', Crypt::encode($user->login_hash));
				Response::redirect();
			}
			else
			{
				$this->view->errors = array('Invalid username and/or password.');
			}
		}
	}

	public function action_logout()
	{
		Cookie::set('_sess', Crypt::encode(rand(100, 900)));
		Session::set_flash('notice', 'You are now logged out.');
		Response::redirect();
	}

	public function action_register()
	{
		$this->view = $this->theme->view('users/register');
		
		$user = Model_User::forge();
		
		$this->view->set('user', $user);
		$this->template->title[] = 'Register';
		
		
		if (Input::param() != array())
		{
			$user->values(array(
				'name' => Input::param('name'),
				'username' => Input::param('username'),
				'password' => Input::param('password'),
				'email' => Input::param('email')
			));
			
			/*try 
			{
				$user->save();
				Response::redirect('login');    
			}
			catch (Orm\ValidationFailed $e)
			{
				die('err');
			}*/
			
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
}
