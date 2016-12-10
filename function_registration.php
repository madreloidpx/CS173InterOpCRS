<?php
$server->register("getStudentInfo", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string'),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getAllStudentInfo", #function name, input, return, namespace, soapaction
array(''),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getStaffInfo", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string'), #for now I set most keys as username, but it can also be id (both are unique keys)
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getAllStaffInfo", #function name, input, return, namespace, soapaction
array(''),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getAcademicStatus", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string'),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getEnrollmentStatus", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string'),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getStudentBracket", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string'),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getAnnouncement", #function name, input, return, namespace, soapaction
array(''),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("getGrades", #function name, input, return, namespace, soapaction
array('student_id' => 'xsd:int','course_id'=>'xsd:int'),
array('return' => 'tns:staff_array_php'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("newStudent", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','password' => 'xsd:string','lastname' => 'xsd:string','firstname' => 'xsd:string','email' => 'xsd:string','sex' => 'xsd:string','address' => 'xsd:string','contact'=>'xsd:int','student_number' => 'xsd:string'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("newStaff", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','password' => 'xsd:string','lastname' => 'xsd:string','firstname' => 'xsd:string','email' => 'xsd:string','sex' => 'xsd:string','address' => 'xsd:string','contact'=>'xsd:int'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("setStudentInfo", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','password' => 'xsd:string','lastname' => 'xsd:string','firstname' => 'xsd:string','email' => 'xsd:string','sex' => 'xsd:string','address' => 'xsd:string','contact'=>'xsd:int','student_number' => 'xsd:string'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("setStaffInfo", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','password' => 'xsd:string','lastname' => 'xsd:string','firstname' => 'xsd:string','email' => 'xsd:string','sex' => 'xsd:string','address' => 'xsd:string','contact'=>'xsd:int'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("setAcademicStatus", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','academic_status'=>'xsd:unsignedByte'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("setEnlistmentStatus", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','enlistment_status'=>'xsd:unsignedByte'),
array(''),,
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("setGrades", #function name, input, return, namespace, soapaction
array('student_id' => 'xsd:int','course_id'=>'xsd:int','grade'=>'xsd:unsignedByte'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("setAdminLevel", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','position_level'=>'xsd:unsignedByte'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("createAnnouncement", #function name, input, return, namespace, soapaction
array('author' => 'xsd:string','position_level'=>'xsd:unsignedByte','title'=>'xsd:string','content'=>'xsd:string','date_created'=>'xsd:date'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("createSubject", #function name, input, return, namespace, soapaction
array('title' => 'xsd:string','room'=>'xsd:string','username'=>'xsd:string'),
array(''),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
$server->register("logIn", #function name, input, return, namespace, soapaction
array('username' => 'xsd:string','password'=>'xsd:string'),
array('result'=>'xsd:unsignedByte'),
'urn:stockquote',
'urn:stockquote#getStockQuote'
);
?>