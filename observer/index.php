<?php

interface Actor
{
    public function attach($observer);
    public function detach($observer);
    public function ask(string $question);
}

interface Observer
{
    public function answer(string $question);
}

class FamousStar implements Actor
{
	protected $observer;

	// array can be used to attach more observers.
	public function attach($observer)
	{
		$this->observer=$observer;
	}

    public function detach($observer)
    {
    	unset($this->observer);
    }

    public function ask(string $question)
    {
    	$this->observer->answer($question);
    }
}

class Fan implements Observer
{
    public function answer(string $question)
    {
    	echo "I've heard your question: ".$question;
    	echo PHP_EOL;
    	echo "The answer is: really perfect!";
    }
}

$actor = new FamousStar;
$fan = new Fan;

$actor->attach($fan);
$actor->ask('Is my performance good?');
