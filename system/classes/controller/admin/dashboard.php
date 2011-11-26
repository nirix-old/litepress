<?php

class Controller_Admin_Dashboard extends Controller_Backend
{
	public function action_index()
	{
		$this->view = $this->theme->view('admin/dashboard/index');
	}
}