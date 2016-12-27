<?php

namespace Acme;

class eReaderToBookAdapter implements BookInterface
{
	protected $eReader;

	function __construct(eReaderInterface $eReader)
	{
		$this->eReader = $eReader;
	}
	
    public function open(){
    	return $this->eReader->turnOn();
    }

    public function turnPage(){
    	return $this->eReader->pressNextButton();
    }
}