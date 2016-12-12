<?php
	ini_set('display_errors','Off');
	function getUserInfo($userID, $type){
		$conn=mysqli_connect('localhost','root','');
		switch($type){
			case 'student':
				$query = "SELECT lastname, firstname, sex, contact, email, address from students.students WHERE students.students.id='$userID'";;
			break;
			case 'staff':
				$query = "SELECT lastname, firstname, sex, contact, email, address from faculty_and_admin.staff WHERE faculty_and_admin.staff.id='$userID'";;
			break;
			default:
				$query=NULL;
			break;
		}
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
	function getStudentInfo($userID){
		$conn=mysqli_connect('localhost','root','');
		$query = "SELECT lastname, firstname, sex, contact, email, address, student_number, bracket, academic_status, enrollment_status from students.students WHERE students.students.id='$userID'";
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
	function getAcademicStatus($userID){
		$conn=mysqli_connect('localhost','root','');
		$query = "SELECT academic_status from students.students WHERE students.students.id='$userID'";
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
	function getEnrollmentStatus($userID){
		$conn=mysqli_connect('localhost','root','');
		$query = "SELECT enrollment_status from students.students WHERE students.students.id='$userID'";
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
	function getStudentBracket($userID){
		$conn=mysqli_connect('localhost','root','');
		$query = "SELECT bracket from students.students WHERE students.students.id='$userID'";
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
	function getAnnouncement($symbol){
		$conn=mysqli_connect('localhost','root','');
		$query = "SELECT * from students.students WHERE firstname='Hitsugi'";
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
	function getGrades($userID, $courseID){
		$conn=mysqli_connect('localhost','root','');
		$query = "SELECT title, status  from students.grades JOIN courses.courses ON students.grades.course_id=courses.courses.id WHERE students.grades.student_id=$userID and students.grades.course_id=$courseID";
		$result = mysqli_query($conn,$query);
		$solutions = array();
		while($row = mysqli_fetch_assoc($result)) {
		  $solutions[] = $row;
		}
		return $solutions;
	}
	
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
	
	$server->wsdl->addComplexType('students_array','complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'username'=>array('name'=>'username','type'=>'xsd:string'), 'password'=>array('name'=>'password','type'=>'xsd:string'), 'lastname'=>array('name'=>'lastname','type'=>'xsd:string'), 'firstname'=>array('name'=>'firstname','type'=>'xsd:string'), 'email'=>array('name'=>'email','type'=>'xsd:string'), 'sex'=>array('name'=>'sex','type'=>'xsd:string'), 'address'=>array('name'=>'address','type'=>'xsd:string'), 'contact'=>array('name'=>'contact','type'=>'xsd:int'), 'academic_status'=>array('name'=>'academic_status','type'=>'xsd:unsignedByte'), 'bracket'=>array('name'=>'bracket','type'=>'xsd:string'), 'student_number'=>array('name'=>'student_number','type'=>'xsd:string'), 'enrollment_status'=>array('name'=>'enrollment_status','type'=>'xsd:unsignedByte'), 'approval_status'=>array('name'=>'approval_status','type'=>'xsd:unsignedByte')));
	$server->wsdl->addComplexType('students_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:students_array[]')),'tns:students_array');

	$server->wsdl->addComplexType('grades_array','complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'), 'student_id'=>array('name'=>'student_id','type'=>'xsd:int'), 'course_id'=>array('name'=>'course_id','type'=>'xsd:int'), 'status'=>array('name'=>'status','type'=>'xsd:unsignedByte'), 'title'=>array('name'=>'title','type'=>'xsd:string')));
	$server->wsdl->addComplexType('grades_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:grades_array[]')),'tns:grades_array');


	$server->wsdl->addComplexType('announcements_array','complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'author_id'=>array('name'=>'author_id','type'=>'xsd:int'),'title'=>array('name'=>'title','type'=>'xsd:string'),'announcement_level'=>array('name'=>'announcement_level','type'=>'xsd:unsignedByte'),'content'=>array('name'=>'content','type'=>'xsd:string'),'date_created'=>array('name'=>'date_created','type'=>'xsd:date')));
	$server->wsdl->addComplexType('announcements_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:announcements_array[]')),'tns:announcements_array');
	
	$server->wsdl->addComplexType('staff_array','complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'username'=>array('name'=>'username','type'=>'xsd:string'),'password'=>array('name'=>'password','type'=>'xsd:string'),'lastname'=>array('name'=>'lastname','type'=>'xsd:string'),'firstname'=>array('name'=>'firstname','type'=>'xsd:string'),'email'=>array('name'=>'email','type'=>'xsd:string'),'sex'=>array('name'=>'sex','type'=>'xsd:string'),'address'=>array('name'=>'address','type'=>'xsd:string'),'contact'=>array('name'=>'contact','type'=>'xsd:int'),'position_level'=>array('name'=>'position_level','type'=>'xsd:unsignedByte'),'approval_status'=>array('name'=>'approval_status','type'=>'xsd:unsignedByte')));
	$server->wsdl->addComplexType('staff_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:staff_array[]')),'tns:staff_array');

	$server->wsdl->addComplexType('consultation_schedules_array', 'complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'faculty_id'=>array('name'=>'faculty_id','type'=>'xsd:int'),'day_of_week'=>array('name'=>'day_of_week','type'=>'xsd:string'),'schedule_start'=>array('name'=>'schedule_start','type'=>'xsd:time'),'schedule_end'=>array('name'=>'schedule_end','type'=>'xsd:time')));
	$server->wsdl->addComplexType('consultation_schedules_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:consultation_schedules_array[]')),'tns:consultation_schedules_array');

	$server->wsdl->addComplexType('courses_array', 'complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'title'=>array('name'=>'title','type'=>'xsd:string'),'room'=>array('name'=>'room','type'=>'xsd:string')));
	$server->wsdl->addComplexType('courses_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:courses_array[]')),'tns:courses_array');

	$server->wsdl->addComplexType('courses_students_array','complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'course_id'=>array('name'=>'course_id','type'=>'xsd:int'),'student_id'=>array('name'=>'student_id','type'=>'xsd:int'),'student_enrolled'=>array('name'=>'student_enrolled','type'=>'xsd:unsignedByte')));
	$server->wsdl->addComplexType('courses_students_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:courses_students_array[]')),'tns:courses_students_array');

	$server->wsdl->addComplexType('courses_faculty_array','complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'course_id'=>array('name'=>'course_id','type'=>'xsd:int'),'faculty_id'=>array('name'=>'faculty_id','type'=>'xsd:int'),'faculty_enrolled'=>array('name'=>'faculty_enrolled','type'=>'xsd:unsignedByte')));
	$server->wsdl->addComplexType('courses_faculty_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:courses_faculty_array[]')),'tns:courses_faculty_array');

	$server->wsdl->addComplexType('schedules_array', 'complexType','struct','all','',array('id'=>array('name'=>'id','type'=>'xsd:int'),'course_id'=>array('name'=>'course_id','type'=>'xsd:int'),'day_of_week'=>array('name'=>'day_of_week','type'=>'xsd:string'),'schedule_start'=>array('name'=>'schedule_start','type'=>'xsd:time'),'schedule_end'=>array('name'=>'schedule_end','type'=>'xsd:time')));
	$server->wsdl->addComplexType('schedules_array_php','complexType','array','all','SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:schedules_array[]')),'tns:schedules_array');
		
	$server->register("getUserInfo",array('userID' => 'xsd:int', 'type'=>'xsd:string'),array('return' => 'tns:students_array_php'),'urn:server','urn:server#getUserInfo');
	$server->register("getStudentInfo",array('userID' => 'xsd:int'),array('return' => 'tns:students_array_php'),'urn:server','urn:server#getStudentInfo');
	$server->register("getAcademicStatus",array('userID' => 'xsd:int'),array('return' => 'tns:students_array_php'),'urn:server','urn:server#getAcademicStatus');
	$server->register("getEnrollmentStatus",array('userID' => 'xsd:int'),array('return' => 'tns:students_array_php'),'urn:server','urn:server#getEnrollmentStatus');
	$server->register("getStudentBracket",array('userID' => 'xsd:int'),array('return' => 'tns:students_array_php'),'urn:server','urn:server#getStudentBracket');
	$server->register("getAnnouncement",array(''),array('return' => 'tns:announcements_array_php'),'urn:server','urn:server#getAnnouncement');
	$server->register("getGrades",array('userID' => 'xsd:int','courseID'=>'xsd:int'),array('return' => 'tns:grades_array_php'),'urn:server','urn:server#getGrades');
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