<?php

namespace Fuel\Migrations;

class Create_groups {

	public function up()
	{
		\DBUtil::create_table('groups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'is_admin' => array('constraint' => 1, 'type' => 'int'),
			'is_author' => array('constraint' => 1, 'type' => 'int'),
			'create_articles' => array('constraint' => 1, 'type' => 'int'),
			'edit_articles' => array('constraint' => 1, 'type' => 'int'),
			'delete_articles' => array('constraint' => 1, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('groups');
	}
}