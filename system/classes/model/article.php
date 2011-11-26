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
class Model_Article extends \Orm\Model
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
		'created_at',
		'updated_at'
	);
	
	protected static $_observers = array(
		'Orm\\Observer_Slug' => array(
			'events' => array('before_insert'),
			'source' => 'title',
			'property' => 'slug',
		),
	);
}
