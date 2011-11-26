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
 * Settings page controller
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_Admin_Settings extends Controller_Backend
{
	public function action_index()
	{
		$this->title('Settings');
		$this->view = $this->theme->view('admin/settings/index');
		
		if (Input::param() != array())
		{
			// This is very, VERY temporary, as there is pretty much
			// only one setting so far...
			Model_Setting::find(1)->values(array('value' => Input::param('title')))->save();
			Session::set_flash('success', 'Settings saved');
			Response::redirect(Uri::current());
		}
	}
}