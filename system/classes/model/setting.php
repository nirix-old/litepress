<?php

class Model_Setting extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'setting',
		'value'
	);
		
	protected static $_table_name = 'settings';

}
