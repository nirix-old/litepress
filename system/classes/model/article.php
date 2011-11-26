<?php
/**
 * LitePress
 * Copyright (C) Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 *
 * @since 0.1
 * @package LitePress
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
		'status'
	);
}
