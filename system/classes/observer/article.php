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
 * Article model observer.
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 * @package LitePress
 */
class Observer_Article extends Orm\Observer
{
	public function before_insert(Model_Article $model)
	{
		$model->date = Date::forge()->format("%Y-%m-%d");
	}
}