<?php
	$conn = mysqli_connect('localhost','root','', 'crs');
	
	function getUserInfo($symbol){}
	
	function getStudentInfo($symbol){}
	
	function getAcademicStatus($symbol){}
	
	function getEnrollmentStatus($symbol){}
	
	function getStudentBracket($symbol){}
	
	function getAnnouncment($symbol){}
	
	function getGrades($symbol){}
	
	function setInfo($symbol){}
	
	function setStudentInfo($symbol){}
	
	function setAcademicStatus($symbol){}
	
	function setEnlistmentStatus($symbol){}
	
	function setGrades($symbol){}
	
	function setAdminLevel($symbol){}
	
	function newUser($symbol){}
	
	function login($symbol){}
	
	function createAnnouncement($symbol){}

	require('lib/nusoap.php');
	$server = new soap_server();
	$server->configureWSDL('crsServer', 'urn:server');
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)? $HTTP_RAW_POST_DATA : '';
	$server->service(file_get_contents("php://input"));

?>