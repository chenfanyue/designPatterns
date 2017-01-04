<?php

class CustomerIsGoldTest extends PHPUnit_Framework_TestCase
{
	/** @test */
	function a_customer()
	{
		$spec = new CustomerIsGold;
		$goldCustomer=new Customer(['type'=>'gold']);
		$silverCustomer=new Customer(['type'=>'silver']);
		$this->assertTrue($spec->isSatisfiedBy($goldCustomer));
		$this->assertFalse($spec->isSatisfiedBy($silverCustomer));
	}
}