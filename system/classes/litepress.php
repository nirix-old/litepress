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
 * LitePress class.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class LitePress
{
	const VERSION = '0.1-dev';
	
	public static function version()
	{
		return static::VERSION;
	}
	
	public static function setting($setting)
	{
		static $settings;
		
		if ($settings === null)
		{
			$settings = array();
			$r = DB::select()->from('settings')->execute();
			foreach ($r->as_array() as $s)
			{
				$settings[$s['setting']] = $s['value'];
			}
			unset($r, $s);
		}
		
		return $settings[$setting];
	}
}