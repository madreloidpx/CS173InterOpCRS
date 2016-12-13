<?php
require("function_list.php");

print_r(getUserInfo("John Smith", "Male", "March 25, 1997", "09152954413", "jsmith@gmail.com", "#12 Velvet St., Concepcion Dos, Markina City"));

print_r(getStudentInfo(getUserInfo(), "201400001", "A", "Eligible", "Paid"))

print_r(getAcademicStatus("Eligible"));

print_r(getEnrollmentStatus("Paid"));

print_r(getStudentBracket("A"));

print_r(getAnnouncement("FIRST BATCH RUN RESULTS FOR THE SECOND SEMESTER AY 2016-2017", "CRSAdmin", "December 1, 2016", "The results of the first preenlistment round for First Semester AY 2016-2017 have been released. Please log in to view your granted classes via the Preenlistment module."));


newUser("johnsmith", "abcd1234");

setInfo("John Smith", "Male", "March 25, 1997", "09152954413", "jsmith@gmail.com", "#12 Velvet St., Concepcion Dos, Markina City")

setStudentInfo(setUserInfo(), "201400001");

setAcademicStatus();



?>