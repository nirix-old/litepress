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
 * Admin articles controller.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Controller_Admin_Articles extends Controller_Backend
{
	public function before()
	{
		parent::before();
		$this->title('Articles');
	}
	
	public function action_index()
	{
		$this->view = $this->theme->view('admin/articles/index');
		$this->view->set('articles', Model_Article::find('all'));
	}
	
	public function action_new()
	{
		$this->title('New');
		$this->view = $this->theme->view('admin/articles/new');
		
		$article = Model_Article::forge();
		$this->view->set('article', $article);
		
		if (Input::param() != array())
		{
			$article->values(array(
				'title' => Input::param('title'),
				'body' => Input::param('body'),
				'status' => Input::param('status'),
				'user_id' => $this->current_user->id
			));
			
			if ($article->is_valid())
			{
				$article->save();
				Session::set_flash('success', 'Article created');
				Response::redirect('-admin/articles');
			}
			else
			{
				$this->view->set('errors', $article->errors());
			}
		}
	}
	
	public function action_edit($article_id)
	{
		$this->title('Edit');
		$this->view = $this->theme->view('admin/articles/edit');
		
		$article = Model_Article::find($article_id);
		$this->view->set('article', $article);
		
		if (Input::param() != array())
		{
			$article->values(array(
				'title' => Input::param('title'),
				'body' => Input::param('body'),
				'status' => Input::param('status'),
				'user_id' => $this->current_user->id
			));
			
			if ($article->is_valid())
			{
				$article->save();
				Session::set_flash('success', 'Article saved');
				Response::redirect('-admin/articles');
			}
			else
			{
				$this->view->set('errors', $article->errors());
			}
		}
	}
	
	public function action_delete($article_id)
	{
		$article = Model_Article::find($article_id);
		$article->delete();
		Session::set_flash('notice', 'Article deleted');
		Response::redirect('-admin/articles');
	}
}