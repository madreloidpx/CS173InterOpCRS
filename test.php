<?php
require("function_list.php");

#create student
$input = newUser("johnsmith", "abcd1234");
$input = setInfo("johnsmith", "student", "Smith", "John", "jsmith@gmail.com","M", "#12 Velvet St., Concepcion Dos, Markina City", "09152954413", "DCS");
$input = setStudentInfo("johnsmith", "C", "201518181", "Kalay")

#create faculty
$input = newUser("dizonsara", "aa11bb22cc");
$input = setInfo("dizonsara", "staff", "Dizon", "Sara", "dizon_sara@gmail.com","F", "QC", "09231334133", "DCS");
$input = setAdminLevel("dizonsara", "1");

#create department admin
$input = newUser("baltazarkevin", "passw0rd");
$input = setInfo("baltazarkevin", "staff", "Baltazar", "Kevin", "kevin.baltazar@upd.edu.ph", "M", "Sta Mesa", "09849294057", "DCS");
$input = setAdminLevel("baltazarkevin", "2");

#create our admin
$input = newUser("cruzsamuel", "aaaa1111");
$input = setInfo("cruzsamuel", "staff", "Cruz", "Samuel", "samuel_cruz@yahoo.com", "M", "Las Pinas", "09233844957", "");
$input = setAdminLevel("cruzsamuel", "3");

#create school official
$input = newUser("dizonprincess", "1234asdf");
$input = setInfo("dizonprincess", "staff", "Dizon", "Princess", "princesa1234@gmail.com", "F", "QC", "09670294020", "");
$input = setAdminLevel("dizonprincess", "4");

#school official confirms self (lol di dapat pero ehh)
$input = approveAccount("dizonprincess", "dizonprincess", "staff");

#school official confirms our admin
$input = approveAccount("dizonprincess", "cruzsamuel", "staff");

#our admin confirms department admin
$input = approveAccount("cruzsamuel", "baltazarkevin", "staff");

#department admin confirms faculty
$input = approveAccount("baltazarkevin", "dizonsara", "staff");

#department admin confirms student
$input = approveAccount("baltazarkevin", "johnsmith", "student");

#login all accounts
$input = login("dizonprincess", "1234asdf", "staff");
$input = login("cruzsamuel", "aaaa1111", "staff");
$input = login("baltazarkevin", "passw0rd", "staff");
$input = login("dizonsara", "aa11bb22cc", "staff");
$input = login("johnsmith", "abcd1234", "student");

#create course
$input = createCourse("CS173", "TL1", "dizonsara");
$input = createCourse("CS165", "C1", "dizonsara");
$input = createCourse("CS12", "AIER", "dizonsara");

#get course info
print_r(getCourseInfo("3"));

#enlist a course
$input = enlistCourse("1", "3");

#get enlisted courses
print_r(getEnlistedCourses("1"));

#create announcement
$input = createAnnouncement("cruzsamuel", "1", "FIRST BATCH RUN RESULTS FOR THE SECOND SEMESTER AY 2016-2017", "The results of the first preenlistment round for First Semester AY 2016-2017 have been released. Please log in to view your granted classes via the Preenlistment module.");
$input = createAnnouncement("cruzsamuel", "0", "FIRST BATCH RUN RESULTS FOR THE SECOND SEMESTER AY 2016-2017", "The results of the first preenlistment round for First Semester AY 2016-2017 have been released. Please log in to view your granted classes via the Preenlistment module.");

#delete announcement
$input = deleteAnnouncement("1");

#delete a course
$input = function deleteCourse("1");
$input = function deleteCourse("2");

#view announcement
print_r(getAnnouncement("0"));

#set enlistment status (aka validate the person)
$input = function setEnlistmentStatus("johnsmith", "1");

#get enlistment status
print_r(getEnlilstmentStatus("1"));

#View profile of student
print_r(getUserInfo("1", "student"));
print_r(getStudentInfo("1"));

#get class list
print_r(getClassList());

#get room list
print_r(getRoomList());

#get faculty schedule
print_r(getFacultySchedule("1"));

#set grades
$input = setGrades("CS12", "johnsmith", "Fail", "1stSemAY1617");

#set academic status
$input = setAcademicStatus("johnsmith", "2");

#get grades
print_r(getGrades("1", "3"));

#get academic status
print_r(getAcademicStatus("1"));
?>