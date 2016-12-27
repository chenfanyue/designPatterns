<?php

namespace a;

abstract class Food {
	public function buy()
	{
		return $this->buyBread()->buyDrink();
	}

	protected function buyBread()
	{
		echo "buy some bread first.";
		return $this;
	}

	/**
	 * @return $this
	 */
	abstract protected function buyDrink();
}