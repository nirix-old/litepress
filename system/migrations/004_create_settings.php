<?php

namespace Fuel\Migrations;

class Create_settings {

	public function up()
	{
		\DBUtil::create_table('settings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'setting' => array('constraint' => 255, 'type' => 'varchar'),
			'value' => array('type' => 'text'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('settings');
	}
}