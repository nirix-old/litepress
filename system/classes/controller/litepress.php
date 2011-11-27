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
 * Base controller for LitePress.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_LitePress extends \Controller
{
	public $theme;
	public $view;
	public $template;
	public $auto_render = true;
	public $_render = array(
		'theme' => 'default',
		'layout' => 'default'
	);
	
	public function before()
	{
		$this->theme = new Theme(array(
			'paths' => array(APPPATH . 'themes/'),
			'active' => $this->_render['theme'],
			'view_ext' => '.php'
		));
		
		$this->template = $this->theme->view('layouts/' . $this->_render['layout']);
		$this->template->set_global('title', array(LitePress::setting('title')));
		$this->template->set_global('theme', $this->theme);
		
		$this->_get_user();
		
		return parent::before();
	}
	
	/**
	 * Shortcut for adding to the page title array.
	 * 
	 * @param string $title
	 */
	public function title($title)
	{
		$this->template->title[] = $title;
	}
	
	/**
	 * Check if the user is logged in and fetches their information
	 * if not then assign the guest info and pass it to the views.
	 */
	private function _get_user()
	{
		if (Cookie::get('_sess') and $user = Model_User::find('first', array('where' => array('login_hash' => Crypt::decode(Cookie::get('_sess'))))))
		{
			$this->current_user = $user;
			$this->current_user->_set_logged_in(true);
		}
		else
		{
			$this->current_user = Model_User::forge(array('username' => 'Guest', 'group_id' => 5));
			$this->current_user->_set_logged_in(false);
		}
		$this->template->set_global('current_user', $this->current_user);
	}
	
	/**
	 * Displays the no permission page.
	 */
	public function no_permission()
	{
		$this->view = $this->theme->view('errors/no_permission');
	}
	
	/**
	 * Sets the error and login_redirect flash values and
	 * redirects to the login page.
	 */
	public function redirect_no_permission()
	{
		Session::set_flash('error', 'It would appear that you don\'t have permission to access this page.');
		Session::set_flash('login_redirect', Uri::current());
		Response::redirect('login');
	}
	
	/**
	 * Sets the response status and view content for the 404 page.
	 */
	public function show_404()
	{
		$this->response->status = 404;
		$this->view = $this->theme->view('errors/404');
		
		$titles = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$title = $titles[array_rand($titles)];
		
		$this->template->title[] = $title;
		$this->view->message_title = $title;
	}
	
	public function usergroups_select_array()
	{
		$groups = array();
		
		foreach (Model_Group::find('all') as $group)
		{
			$groups[$group->id] = $group->name;
		}
		
		return $groups;
	}
	
	public function after($response)
	{
		if ($this->view !== null)
		{
			$this->template->content = $this->view;
		}
		
		if ($this->auto_render === true and ! $response instanceof \Response)
		{
			$response = $this->response; 
			$response->body = $this->template;
		}

		return parent::after($response);
	}
}