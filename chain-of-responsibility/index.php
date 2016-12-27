<?php
// chain of responsibility.
// template-methods-pattern also used here.

abstract class Checker {
	protected $successor = null;

	public abstract function check(HomeStatus $status);

	public function succeedWith(Checker $checker){
		$this->successor = $checker;
	}

	protected function nextIfExists(HomeStatus $status){
		if($this->successor){
			$this->successor->check($status);
		}
	}
}

class Locks extends Checker {
	public function check(HomeStatus $status){
		if(!$status->locked){
			throw new Exception("Doors are not all locked!", 1);
		}
		echo "Great, doors are all locked.".PHP_EOL;

		$this->nextIfExists($status);
	}
}

class Lights extends Checker {
	public function check(HomeStatus $status){
		if(!$status->lightsOff){
			throw new Exception("Lights are not all closed!", 1);
		}
		echo "Great, lights are all closed.".PHP_EOL;

		$this->nextIfExists($status);		
	}
}

class Alarm extends Checker {
	public function check(HomeStatus $status){
		if(!$status->alarmOn){
			throw new Exception("Alarm is not set!", 1);
		}
		echo "Great, alarm is set.".PHP_EOL;

		$this->nextIfExists($status);		
	}
}

// HomeStatus is kind of a status register.
class HomeStatus {
	public $locked = true;
	public $lightsOff = true;
	public $alarmOn = true;
}

class CheckTask {
	protected $status;

	function __construct(HomeStatus $status)
	{
		$this->status = $status;
	}

	public function beginFrom(Checker $checker){
		$checker->check($this->status);
	}
}

$locks = new Locks;
$lights=new Lights;
$alarm=new Alarm;

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

// $locks->check(new HomeStatus);
(new CheckTask(new HomeStatus))->beginFrom($locks);
