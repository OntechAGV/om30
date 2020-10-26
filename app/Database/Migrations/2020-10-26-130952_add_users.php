<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'username'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '128',
			],
			'email' => [
					'type'           => 'VARCHAR',
					'constraint'     => '128',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
		],

	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('tb_users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tb_users');
	}
}
