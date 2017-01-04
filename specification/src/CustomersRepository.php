<?php

class CustomersRepository{

	public function bySpecification($specification)
	{
		$query=Customer::query();
		$customers=$specification->asScope($query);
		return $customers->get();
	}

	public function all()
	{
		return Customer::all();
	}
}