<?php

use Illuminate\Database\Capsule\Manager as Database;

class CustomersRepositoryTest extends PHPUnit_Framework_TestCase
{
	protected $customers;

	public function setUp()
	{
		$this->setUpDatabase();
		$this->migrateTables();

		$this->customers=new CustomersRepository;
	}

	protected function setUpDatabase()
	{
		$db=new Database;

		$db->addConnection([
			'driver'=>'sqlite',
			'database'=>':memory:'
		]);

		$db->bootEloquent();

		$db->setAsGlobal();
	}

	protected function migrateTables()
	{
		Database::schema()->create('customers',function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('type');
			$table->timestamps();
		});

		Customer::create(['name'=>'Joe','type'=>'gold']);
		Customer::create(['name'=>'Jane','type'=>'silver']);
	}

	/** @test */
	function all_customers()
	{
		$results=$this->customers->all();
		$this->assertCount(2,$results);
	}

	/** @test */
	function all_matched_customers()
	{
		$results=$this->customers->bySpecification(new CustomerIsGold);

		$this->assertCount(1, $results);
	}
}