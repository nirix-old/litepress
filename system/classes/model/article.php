<?php
/**
 * LitePress
 * Copyright (C) Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright Nirix
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

/**
 * Article model
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 */
class Model_Article extends Model_Base
{
	protected static $_table_name = 'articles';
	protected static $_belongs_to = array('user');
	
	protected static $_properties = array(
		'id',
		'title',
		'slug',
		'body',
		'user_id',
		'status',
		'date',
		'created_at',
		'updated_at'
	);
	
	protected static $_observers = array(
		'Observer_Article',
		'Orm\\Observer_CreatedAt' => array('before_insert'),
		'Orm\\Observer_UpdatedAt' => array('before_save'),
		'Orm\\Observer_Slug' => array(
			'events' => array('before_insert'),
			'source' => 'title',
			'property' => 'slug',
		),
	);
	
	public function href()
	{
		return "/" . date("Y", $this->created_at) . "/" . date("d", $this->created_at) . "/" . $this->slug . '.' . $this->id;
	}
	
	public function is_valid()
	{
		$this->enable_validation();
				
		$this->_validation->add_field('title', 'Title', 'required|min_length[3]');
		$this->_validation->add_field('body', 'Article', 'required|min_length[3]');
		$this->_validation->add_field('status', 'Status', 'required');
		
		return $this->_validation->run();
	}
}
