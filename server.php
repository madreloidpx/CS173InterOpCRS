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
			case 'staff':
				$query = "UPDATE staff SET lastname='$lastname', firstname='$firstname', email='$email', sex='$sex', address='$address', contact='$contact' WHERE username='$username'";
			break;
			default:
				$query=NULL;
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
	
	function setAcademicStatus($username){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "UPDATE students SET academic_status='$academic_status' WHERE username='$username'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function setEnlistmentStatus($username){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "UPDATE students SET enlistment_status='$enlistment_status' WHERE username='$username'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function setGrades($course, $username, $status, $sem){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "INSERT INTO grades(student_id, course_id, status, semester) VALUES ( ( SELECT id from students where username='$username'), ( SELECT id from courses where title='$course'), '$status', '$sem')";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function setAdminLevel($username, $position_level){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "UPDATE staff SET position_level='$position_level' WHERE username='$username'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function deleteAnnouncement($announcement_id){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "DELETE FROM announcements WHERE id='$announcement_id'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function deleteCourse($course_id){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "DELETE FROM courses WHERE id='$course_id'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function newUser($username, $password, $type){
		$conn = mysql_pconnect("localhost", "root", "");
		switch($type){
			case "student":
				$query = "INSERT INTO students(username, password, lastname, firstname, email, sex, address, contact, academic_status, bracket, student_number, enrollment_status, approval_status) VALUES ('$username', '$password', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0)";
			break;
			case "staff":
				$query = "INSERT INTO staff(username, password, lastname, firstname, email, sex, address, contact, position_level, approval_status) VALUES  ('$username', '$password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0)";
			break;
			default:
				$query=NULL;
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
	
	function login($username, $password, $type){
		$conn = mysql_pconnect("localhost", "root", "");
		switch($type){
			case "student":
				$query = "SELECT * FROM students where username='$username' AND password='$password'";
			break;
			case "staff":
				$query = "SELECT * FROM staff where username='$username' AND password='$password'";
			break;
		}
		if($conn){
			if(mysql_select_db("crs", $conn)){
				$result = mysql_query($query);
				$count = mysql_num_rows($result);
				return $count;
			}
		}
		return FALSE;
	}
	
	function createAnnouncement($username, $level, $title, $content){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "INSERT INTO announcements(author_id, title, announcement_level, content, date_created) VALUES (( SELECT id FROM staff where username='sensei' ), '$title', '$level', '$content', CURRENT_TIMESTAMP)";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function createCourse($title, $room, $username){
		$conn = mysql_pconnect("localhost", "root", "");
		$query = "INSERT INTO courses(title, room, faculty_id) VALUES ('$title', '$room', ( SELECT id from staff where username='$username' ) )";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function approveAccount($username_client, $username_approve, $type_approve){
		$conn = mysql_pconnect("localhost", "root", "");
		$getLevelApprove = "SELECT position_level from staff where username='$username_approve'";
		$getLevelClient = "SELECT position_level from staff where username='$username_client'";
		if($conn){
			if(mysql_select_db("crs", $conn)){
				$clientLevel = mysql_query($query);
			}
		}
		if($type_approve == 'student'){
			$query = "UPDATE students SET approval_status=TRUE WHERE username='$username_approve'";
		}else if($type_approve == 'staff'){
			if(mysql_select_db("crs", $conn)){
				$approveLevel = mysql_query($getLevelApprove);
			}
			if($approveLevel < $clientLevel or $clientLevel == 4){
				$query = "UPDATE staff SET approval_status=TRUE WHERE username='$username_approve'";
			}else{
				$query = "";
			}
		}
		if($conn){
			if(mysql_select_db("crs", $conn)){
				mysql_query($query);
				return TRUE;
			}
		}
		return FALSE;
	}

	require('lib/nusoap.php');
	$server = new soap_server();
	$server->configureWSDL('crsServer', 'urn:server');
	
	$server->register("setInfo", array('username' => 'xsd:string', 'type' => 'xsd:string', 'lastname' => 'xsd:string', 'firstname' => 'xsd:string', 'email' => 'xsd:string', 'sex' => 'xsd:string', 'address' => 'xsd:string', 'contact' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setInfo');
	$server->register("setStudentInfo", array('username' => 'xsd:string', 'bracket' => 'xsd:string', 'student_number' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setStudentInfo');
	$server->register("setAcademicStatus", array('username' => 'xsd:string', 'academic_status' => 'xsd:int'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setAcademicStatus');
	$server->register("setEnlistmentStatus", array('username' => 'xsd:string', 'enlistment_status' => 'xsd:int'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setEnlistmentStatus');
	$server->register("setGrades", array('course' => 'xsd:string', 'username' => 'xsd:string', 'status' => 'xsd:int', 'sem' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setGrades');
	$server->register("setAdminLevel", array('username' => 'xsd:string', 'position_level' => 'xsd:int'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#setAdminLevel');
	$server->register("deleteAnnouncement", array('announcement_id' => 'xsd:int'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#deleteAnnouncement');
	$server->register("deleteCourse", array('course_id' => 'xsd:int'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#deleteCourse');
	$server->register("newUser", array('username' => 'xsd:string', 'password' => 'xsd:string', 'type' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#newUser');
	$server->register("login", array('username' => 'xsd:string', 'password' => 'xsd:string', 'type' => 'xsd:string'), array('return' => 'xsd:int'), 'urn:server', 'urn:server#login');
	$server->register("createAnnouncement", array('username' => 'xsd:string', 'level' => 'xsd:int', 'title' => 'xsd:string', 'content' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#createAnnouncement');
	$server->register("createCourse", array('title' => 'xsd:string', 'room' => 'xsd:string', 'username' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#createCourse');
	$server->register("approveAccount", array('username_client' => 'xsd:string', 'username_approve' => 'xsd:string', 'type_client' => 'xsd:string'), array('return' => 'xsd:boolean'), 'urn:server', 'urn:server#approveAccount');
	
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)? $HTTP_RAW_POST_DATA : '';
	$server->service(file_get_contents("php://input"));

?>