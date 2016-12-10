<?php
	$server_link = 'http://localhost/crs/server.php';
	require_once('lib/nusoap.php');
	$c = new nusoap_client($server_link);
	
	$return = $c->call('newUser', array('username' => 'p0tad1lawan', 'password' => 'du30parin', 'type' => 'staff'));
	echo "The result is '$return' ";
	
	$return = $c->call('setInfo', array('username' => 'p0tad1lawan', 'type' => 'staff', 'lastname' => 'Marcos', 'firstname' => 'Sandro', 'email' => 'scholarngbayan@wallet.com', 'sex' => 'S', 'address' => 'libingan ng mga bayani', 'contact' => '8888'));
	echo "The result is '$return' ";
	
	$return = $c->call('setAdminLevel', array('username' => 'p0tad1lawan', 'position_level' => '4'));
	echo "The result is '$return' ";
	
	$return = $c->call('login', array('username' => 'default', 'password' => 'password', 'type' => 'staff'));
	echo "Logged in = '$return'";
?>