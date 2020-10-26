<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPatients extends Migration
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
			'id_user'       => [
					'type'           => 'INT',
					'constraint'     => 5,
			],
			'name' => [
					'type'           => 'VARCHAR',
					'constraint'     => '128',
			],
			'mother_name' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'birthday' => [
				'type'           => 'DATE',
			],
			'cpf' => [
				'type'           => 'VARCHAR',
				'constraint'     => '45',
			],
			'cns' => [
				'type'           => 'VARCHAR',
				'constraint'     => '45',
			],
			'photo' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
				'null'	     => true,
			],
			'address' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'number' => [
				'type'           => 'INT',
			],
			'complement' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
				'null'	     => true,
			],
			'city' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'district' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'state' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'country' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'cep' => [
				'type'           => 'VARCHAR',
				'constraint'     => '45',
			],			

	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('tb_patients');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tb_patients');
	}
}
