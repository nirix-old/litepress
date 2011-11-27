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
 * Admin users controller.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_Admin_Users extends Controller_Backend
{
	public function before()
	{
		parent::before();
		$this->title('Users');
	}
	
	public function action_index()
	{
		if (!$this->current_user->group->is_admin)
		{
			return $this->no_permission();
		}
		
		$this->view = $this->theme->view('admin/users/index');
		$this->view->set('users', Model_User::find('all'));
	}
	
	public function action_edit($user_id)
	{
		$this->title('Edit');
		$this->view = $this->theme->view('admin/users/edit');
		
		$user = Model_User::find($user_id);
		$this->view->set('user', $user);
		$this->view->set('usergroups', $this->usergroups_select_array());
		
		if (Input::param() != array())
		{
			$user->values(array(
				'name' => Input::param('name'),
				'username' => Input::param('username'),
				'email' => Input::param('email'),
				'group_id' => Input::param('group'),
			));
			
			if ($user->is_valid())
			{
				$user->save();
				Session::set_flash('success', 'User saved');
				Response::redirect('-admin/users');
			}
			else
			{
				$this->view->set_global('errors', $user->errors());
			}
		}
	}
}