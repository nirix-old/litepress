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
 * Group model
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 */
class Model_Group extends Model_Base
{
	protected static $_properties = array(
		'id',
		'name',
		'is_admin',
		'is_author',
		'create_articles',
		'edit_articles',
		'delete_articles',
		'created_at',
		'updated_at'
	);
		
	protected static $_table_name = 'groups';

}
