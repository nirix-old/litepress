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
 * Back end controller to handle all admin/author requests.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_Backend extends Controller_LitePress
{
	public function before()
	{
		parent::before();
		
		if (!$this->current_user->group->is_admin or !$this->current_user->group->is_author)
		{
			$this->redirect_no_permission();
		}
	}
	
	/*public function router($method, $params = array())
	{
		if (!$this->current_user->group->is_admin or !$this->current_user->group->is_author)
		{
			$this->no_permission();
		}
		else
		{
			$method = 'action_' . $method;
			
			if (method_exists($this, $method))
			{
				$this->{$method}();
			}
			else
			{
				$this->show_404();
			}
		}
	}*/
}