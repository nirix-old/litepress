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
		$this->template->title = array();
		
		$this->_get_user();
		
		return parent::before();
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