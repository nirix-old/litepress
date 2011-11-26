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
		
		$this->template->title[] = 'LitePress Admin';
		
		if (!$this->current_user->group->is_admin or !$this->current_user->group->is_author)
		{
			$this->redirect_no_permission();
		}
	}
}