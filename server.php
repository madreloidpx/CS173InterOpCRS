<?php
	function getUserInfo($symbol){}
	
	function getStudentInfo($symbol){}
	
	function getAcademicStatus($symbol){}
	
	function getEnrollmentStatus($symbol){}
	
	function getStudentBracket($symbol){}
	
	function getAnnouncment($symbol){}
	
	function getGrades($symbol){}
	
	function setInfo($username, $type, $lastname, $firstname, $email, $sex, $address, $contact){
		$conn = mysql_pconnect("localhost", "root", "");
		switch($type){
			case 'student':
				$query = "UPDATE students SET lastname='$lastname', firstname='$firstname', email='$email', sex='$sex', address='$address', contact='$contact' WHERE username='$username'";
			break;
		}
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function setStudentInfo($username, $bracket, $student_number){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "UPDATE students SET bracket='$bracket', student_number='$student_number' WHERE username='$username'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function setAcademicStatus($symbol){}
	
	function setEnlistmentStatus($symbol){}
	
	function setGrades($symbol){}
	
	function setAdminLevel($symbol){}
	
	function newUser($username, $password, $type){
		$conn = mysql_pconnect("localhost", "root", "");
		switch($type){
			case "student":
				$query = "INSERT INTO students(username, password, lastname, firstname, email, sex, address, contact, academic_status, bracket, student_number, enrollment_status, approval_status) VALUES ('$username', '$password', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0)";
			break;
		}
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function login($symbol){}
	
	function createAnnouncement($symbol){}

	require('lib/nusoap.php');
	$server = new soap_server();
	$server->configureWSDL('crsServer', 'urn:server');
	
	$server->register("setInfo", array('username' => 'xsd:string', 'type' => 'xsd:string', 'lastname' => 'xsd:string', 'firstname' => 'xsd:string', 'email' => 'xsd:string', 'sex' => 'xsd:string', 'address' => 'xsd:string', 'contact' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setInfo');
	$server->register("setStudentInfo", array('username' => 'xsd:string', 'bracket' => 'xsd:string', 'student_number' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setStudentInfo');
	$server->register("newUser", array('username' => 'xsd:string', 'password' => 'xsd:string', 'type' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#newUser');
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)? $HTTP_RAW_POST_DATA : '';
	$server->service(file_get_contents("php://input"));

?>