<?php
/**
 * LitePress
 * Copyright (C) Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright LitePress Team
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

/**
 * Base model class
 *
 * @author Nirix <nrx@nirix.net>
 * @since 0.1
 */
class Model_Base extends \Orm\Model
{
	protected $_validation;
	
	public function enable_validation()
	{
		$this->_validation = Validation::forge();
		$this->_validation->set_message('unique', ':label is already in use.');
		$this->_validation->set_message('required', ':label is required.');
		$this->_validation->set_message('valid_email', 'Invalid email format.');
		
		$this->_validation->add_callable('Validations');
	}
	
	public function errors()
	{
		return $this->_validation->error();
	}
}