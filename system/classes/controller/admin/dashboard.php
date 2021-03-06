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
 * Admin dashboard controller.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_Admin_Dashboard extends Controller_Backend
{
	public function action_index()
	{
		$this->view = $this->theme->view('admin/dashboard/index');
	}
}