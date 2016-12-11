<?php
	$server_link = 'http://localhost/crs/server.php';
	require_once('lib/nusoap.php');
	$c = new nusoap_client($server_link);
	
	$return = $c->call('newUser', array('username' => 'depaato', 'password' => 'br0k0r0s5d', 'type' => 'staff'));
	echo "The result is '$return' ";
	
	$return = $c->call('setInfo', array('username' => 'depaato', 'type' => 'staff', 'lastname' => 'Science', 'firstname' => 'BS Computer', 'email' => 'love@library.com', 'sex' => 'F', 'address' => 'laboratory', 'contact' => '300'));
	echo "The result is '$return' ";
	
	$return = $c->call('setAdminLevel', array('username' => 'depaato', 'position_level' => '2'));
	echo "The result is '$return' ";
	
	$return = $c->call('login', array('username' => 'default', 'password' => 'password', 'type' => 'staff'));
	echo "Logged in = '$return'";
?>