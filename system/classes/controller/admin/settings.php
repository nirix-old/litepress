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
		if (!$this->current_user->group->is_admin)
		{
			return $this->no_permission();
		}
		
		$this->title('Settings');
		$this->view = $this->theme->view('admin/settings/index');
		
		if (Input::param() != array())
		{
			foreach (Input::param('settings') as $setting => $value)
			{
				$s = Model_Setting::find('first', array('where' => array('setting' => $setting)));
				$s->value = $value;
				$s->save();
			}
			
			Session::set_flash('success', 'Settings saved');
			Response::redirect(Uri::current());
		}
	}
}