<?php
	$server_link = 'http://localhost/crs/server.php';
	require_once('lib/nusoap.php');
	$c = new nusoap_client($server_link);
	
	$return = $c->call('newUser', array('username' => 'default', 'password' => 'passw0rd', 'type' => 'student'));
	echo "The result is '$return' ";
	
	$return = $c->call('setInfo', array('username' => 'default', 'type' => 'student', 'lastname' => 'Dela Cruz', 'firstname' => 'Jesus', 'email' => 'iamurhero@earth.com', 'sex' => 'M', 'address' => 'heaven', 'contact' => '86236'));
	echo "The result is '$return' ";
	
	$return = $c->call('setStudentInfo', array('username' => 'default', 'bracket' => 'E', 'student_number' => '201696969'));
	echo "The result is '$return' ";
	
	$return = $c->call('login', array('username' => 'default', 'password' => 'password', 'type' => 'student'));
	echo "Logged in = '$return'";
?>