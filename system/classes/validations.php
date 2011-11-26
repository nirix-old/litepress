<?php
/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 *
 * @since 0.1
 * @package LitePress
 */

class Validations
{
	public static function _validation_unique($val, $options = '')
	{
		list($table, $field) = explode('.', $options);
		$result = DB::select($field)->from($table)->where($field, '=', $val)->execute();
		return !($result->count() > 0);
	}
}