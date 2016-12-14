<?php
	$server_link = 'http://localhost/crs/server.php';
	require_once('nusoap.php');
	$c = new nusoap_client($server_link);
	
	function getUserInfo($userId, $type){
		$return = $c->call('getUserInfo', array('userID' => $userID, 'type' => $type));
		return $return;
	}
	
	function getStudentInfo($userID){
		$return = $c->call('getStudentInfo', array('userID' => $userID));
		return $return;
	}
	
	function getAcademicStatus($userID){
		$return = $c->call('getAcademicStatus', array('userID' => $userID));
		return $return;
	}
	
	function getEnrollmentStatus($userID){
		$return = $c->call('getEnrollmentStatus', array('userID' => $userID));
		return $return;
	}
	
	function getStudentBracket($userID){
		$return = $c->call('getStudentBracket', array('userID' => $userID));
		return $return;
	}
	
	function getAnnouncement($level){
		$return = $c->call('getAnnouncement', array('level' => $level));
		return $return;
	}
	
	function getGrades($userID, $courseID){
		$return = $c->call('getGrades', array('userID' => $userID, 'courseID' => $courseID));
		return $return;
	}
	
	function getCourseInfo($courseID){
		$return = $c->call('getCourseInfo', array('courseID' => $courseID));
		return $return;
	}
	
	function getEnlistedCourses($userID){
		$return = $c->call('getEnlistedCourses', array('userID' => $userID));
		return $return;
	}
	
	function getClassList(){
		$return = $c->call('getClassList', array());
		return $return;
	}
	
	function getFacultySchedule($userID){
		$return = $c->call('getFacultySchedule', array('userID' => $userID));
		return $return;
	}
	
	function getRoomList(){
		$return = $c->call('getRoomList', array());
		return $return;
	}
	
	function setInfo($username, $type, $lastname, $firstname, $email, $sex, $address, $contact, $department){
		$return = $c->call('setInfo', array('username' => $username, 'type' => $type, 'lastname' => $lastname, 'firstname' => $firstname, 'email' => $email, 'sex' => $sex, 'address' => $address, 'contact' => $contact, 'department' => $department));
		return $return;
	}
	
	function setStudentInfo($username, $bracket, $student_number, $dorm){
		$return = $c->call('setStudentInfo', array('username' => $username, 'bracket' => $bracket, 'student_number' => $student_number, 'dorm' => $dorm));
		return $return;
	}
	
	function setAcademicStatus($username, $academic_status){
		$return = $c->call('setAcademicStatus', array('username' => $username, 'academic_status' => $academic_status));
		return $return;
	}
	
	function setEnlistmentStatus($username, $enlistment_status){
		$return = $c->call('setEnlistmentStatus', array('username' => $username, 'enlistment_status' => $enlistment_status));
		return $return;
	}
	
	function setGrades($course, $username, $status, $sem){
		$return = $c->call('setGrades', array('course' => $course, 'username' => $username, 'status' => $status, 'sem' => $sem));
		return $return;
	}
	
	function setAdminLevel($username, $position_level){
		$return = $c->call('setAdminLevel', array('username' => $username, 'position_level' => $position_level));
		return $return;
	}
	
	function deleteAnnouncement($announcement_id){
		$return = $c->call('deleteAnnouncement', array('announcement_id' => $announcement_id));
		return $return;
	}
	
	function deleteCourse($course_id){
		$return = $c->call('deleteCourse', array('course_id' => $course_id));
		return $return;
	}
	
	function newUser($username, $password, $type){
		$return = $c->call('newUser', array('username' => $username, 'password' => $password, 'type' => $type));
		return $return;
	}
	
	function login($username, $password, $type){
		$return = $c->call('login', array('username' => $username, 'password' => $password, 'type' => $type));
		return $return;
	}
	
	function createAnnouncement($username, $level, $title, $content){
		$return = $c->call('createAnnouncement', array('username' => $username, 'level' => $level, 'title' => $title, 'content' => $content));
		return $return;
	}
	
	function createCourse($title, $room, $units, $academic_year, $sem, $slots){
		$return = $c->call('createCourse', array('title' => $title, 'room' => $room, 'units' => $units, 'academic_year' => $academic_year, 'sem' => $sem, 'slots' => $slots));
		return $return;
	}
	
	function approveAccount($username_client, $username_approve, $type_approve){
		$return = $c->call('approveAccount', array('username_client' => $username_client, 'username_approve' => $username_approve, 'type_approve' => $type_approve));
		return $return;
	}
	
	function enlistCourse($userID, $courseID){
		$return = $c->call('enlistCourse', array('userID' => $userID, 'courseID' => $courseID));
		return $return;
	}
?>