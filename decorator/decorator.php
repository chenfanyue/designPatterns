<?php
// Decorator pattern

interface CarService {
	public function getCost();
}

class BasicInspection implements CarService {
	public function getCost() {
		return 25;
	}
}

class OilChange implements CarService {
	protected $carService;

	function __construct(CarService $carService){
		$this->carService = $carService;
	}

	public function getCost() {
		return 100 + $this->carService->getCost();
	}
}

class TireChange implements CarService {
	protected $carService;

	function __construct(CarService $carService){
		$this->carService = $carService;
	}

	public function getCost() {
		return 200 + $this->carService->getCost();
	}
}

echo (new TireChange(new OilChange(new BasicInspection)))->getCost();
