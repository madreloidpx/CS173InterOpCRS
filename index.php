<?php

try{
	$options=array('location' => 'http://localhost/server.php',
					'uri'=>'http://localhost/');

	$pi = new SoapClient(NULL, $options);

	echo $api->hello()
} catch (SOAPFault $exception){
	print $exception;
}
?>