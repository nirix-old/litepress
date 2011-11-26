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

class Controllers_User extends Controller_Frontend
{
	public function action_login()
	{
		$this->template->title[] = 'Login';
		$this->template->content = $this->theme->view('users/login');
	}

	public function action_logout()
	{
	}

	public function action_register()
	{
		$this->template->title[] = 'Register';
		$this->template->content = $this->theme->view('users/register');
	}
}
