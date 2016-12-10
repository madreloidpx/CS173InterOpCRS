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
	
	$return = $c->call('login', array('username' => 'default', 'password' => 'password', 'type' => 'staff'));
	echo "Logged in = '$return'";
	
	$return = $c->call('createAnnouncement', array('username' => 'sensei', 'level' => '1', 'title' => 'I wanna be a great teacher...', 'content' => '...but the monsters sometimes attack me hard. I am getting crazy at this rate. SHUT UP! SHUT UP! SHUT UP! Oh no.'));
?>