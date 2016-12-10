<?php
	$server_link = 'http://localhost/crs/server.php'
	require_once('lib/nusoap.php');
	$c = new nusoap_client($server_link);
?>