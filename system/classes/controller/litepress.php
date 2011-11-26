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
		
		return parent::before();
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