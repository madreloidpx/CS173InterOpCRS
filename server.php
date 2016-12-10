<?php

class CRS {
	function hello() {
		return "Hello";
	}
}

$options=array('uri'=>'http://localhost/');

$server = new SoapServer(NULL, $options);

$server->serClass('CRS');

$server->handle();

?>