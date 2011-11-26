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
 * Articles controller to handle all public article page requests.
 *
 * @since 0.1
 * @package LitePress
 */
class Controller_Articles extends Controller_Frontend
{
	public function action_index()
	{
		$articles = Model_Article::find('all', array('where' => array('status' => 1), 'order_by' => array('created_at' => 'desc')));
		$this->template->content = $this->theme->view('articles/index', array('articles' => $articles));
	}
}