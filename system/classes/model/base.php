<?php

class Model_Base extends \Orm\Model
{
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