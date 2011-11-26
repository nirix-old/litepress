<?php
/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright Nirix
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

namespace Formatting;

/**
 * Textile formatting wrapper.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 * @subpackage Formatting
 */
class Textile
{
	protected static $textile;
	
	public static function format($text)
	{
		if (static::$textile === null)
		{
			require __DIR__ . '/../classTextile.php';
			static::$textile = new \Textile();
		}
		
		return static::$textile->TextileThis($text);
	}
}