<?php
	$server_link = 'http://localhost/crs/server.php';
	require_once('lib/nusoap.php');
	$c = new nusoap_client($server_link);
	
	$return = $c->call('newUser', array('username' => 'sensei', 'password' => 'd51suk1', 'type' => 'staff'));
	echo "The result is '$return' ";
	
	$return = $c->call('setInfo', array('username' => 'sensei', 'type' => 'staff', 'lastname' => 'Onizuka', 'firstname' => 'Great Teacher', 'email' => 'onizuka@thegreat.com', 'sex' => 'M', 'address' => 'school', 'contact' => ''));
	echo "The result is '$return' ";
	
	$return = $c->call('setAdminLevel', array('username' => 'sensei', 'position_level' => '1'));
	echo "The result is '$return' ";
	
?>