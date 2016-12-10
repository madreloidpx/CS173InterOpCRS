<?php
	$server_link = 'http://localhost/crs/server.php';
	require_once('lib/nusoap.php');
	$c = new nusoap_client($server_link);
	
	$return = $c->call('newUser', array('username' => 'kaching', 'password' => 'm0n3yz1zl0v3', 'type' => 'staff'));
	echo "The result is '$return' ";
	
	$return = $c->call('setInfo', array('username' => 'kaching', 'type' => 'staff', 'lastname' => 'Krabs', 'firstname' => 'Mister', 'email' => 'krabbypatty@krustykrab.com', 'sex' => 'M', 'address' => 'krusty krab', 'contact' => '09198563611'));
	echo "The result is '$return' ";
	
	$return = $c->call('setAdminLevel', array('username' => 'kaching', 'position_level' => '3'));
	echo "The result is '$return' ";
	
?>