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

class Controller_Errors extends Controller_Frontend
{
	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		
		$this->template->title[] = 'Woops';
		$this->template->content = $this->theme->view('errors/404', array('message_title' => $messages[array_rand($messages)]));
	}
}
