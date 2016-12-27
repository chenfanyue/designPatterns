<?php namespace Acme; // just wanna type less code :)
/** As the namespacing mechannism will search for
	unknown classes within the current namespace first.
	*/

require 'vendor/autoload.php';

use Acme\Book;
use Acme\BookInterface;
use Acme\KindleAdapter;

class Person{
	function read(BookInterface $book){
		$book->open();
		$book->turnPage();
	}
}

(new Person)->read(new eReaderToBookAdapter(new Kindle));