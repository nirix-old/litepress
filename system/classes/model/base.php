<?php

class Model_Base extends \Orm\Model
{
	public function is_valid()
	{
		$this->_validation = Validation::forge();
		$this->_validation->set_message('required', ':label is required.');
		$this->_validation->set_message('valid_email', 'Invalid email format.');
	}
	
	public function errors()
	{
		return $this->_validation->error();
	}
}