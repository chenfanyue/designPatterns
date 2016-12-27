<?php

// Strategy design pattern and polymorphism.

// import helpers file, unnecessary.
require 'helpers.php';

interface Logger {
	public function log($data);
}

class LogToFile implements Logger{
	public function log($data){
		vd('log $data into a file.');
	}
}

class LogToAliyun implements Logger{
	public function log($data){
		vd('log $data into Aliyun web service.');
	}
}

// The class which needs the logging service.
class App 
{
	public function log($data, Logger $logger =null){
		$logger = $logger ?? new LogToFile;
		$logger->log($data);
	}
}

(new App)->log('some data', new LogToAliyun);
(new App)->log('some data');
