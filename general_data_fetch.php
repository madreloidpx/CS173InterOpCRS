<?php
#General code for fetching data; modify as needed

#Students
$server->wsdl->addComplexType(
'students_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'username'=>array('name'=>'username','type'=>'xsd:string'),
 'password'=>array('name'=>'password','type'=>'xsd:string'),
 'lastname'=>array('name'=>'lastname','type'=>'xsd:string'),
 'firstname'=>array('name'=>'firstname','type'=>'xsd:string'),
 'email'=>array('name'=>'email','type'=>'xsd:string'),
 'sex'=>array('name'=>'sex','type'=>'xsd:string'),
 'address'=>array('name'=>'address','type'=>'xsd:string'),
 'contact'=>array('name'=>'contact','type'=>'xsd:int'),
 'academic_status'=>array('name'=>'academic_status','type'=>'xsd:unsignedByte'),
 'bracket'=>array('name'=>'bracket','type'=>'xsd:string'),
 'student_number'=>array('name'=>'student_number','type'=>'xsd:string'),
 'enrollment_status'=>array('name'=>'enrollment_status','type'=>'xsd:unsignedByte'),
 'approval_status'=>array('name'=>'approval_status','type'=>'xsd:unsignedByte')
 )
);

#Grades
$server->wsdl->addComplexType(
'grades_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'student_id'=>array('name'=>'student_id','type'=>'xsd:int'),
 'course_id'=>array('name'=>'course_id','type'=>'xsd:int'),
 'status'=>array('name'=>'status','type'=>'xsd:unsignedByte')
 )
);

#Staff
$server->wsdl->addComplexType(
'staff_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'username'=>array('name'=>'username','type'=>'xsd:string'),
 'password'=>array('name'=>'password','type'=>'xsd:string'),
 'lastname'=>array('name'=>'lastname','type'=>'xsd:string'),
 'firstname'=>array('name'=>'firstname','type'=>'xsd:string'),
 'email'=>array('name'=>'email','type'=>'xsd:string'),
 'sex'=>array('name'=>'sex','type'=>'xsd:string'),
 'address'=>array('name'=>'address','type'=>'xsd:string'),
 'contact'=>array('name'=>'contact','type'=>'xsd:int')
 )
);

#Admin
$server->wsdl->addComplexType(
'admin_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'staff_id'=>array('name'=>'staff_id','type'=>'xsd:int'),
 'position_level'=>array('name'=>'position_level','type'=>'xsd:unsignedByte'),
 )
);

#Faculty
$server->wsdl->addComplexType(
'faculty_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'staff_id'=>array('name'=>'staff_id','type'=>'xsd:int'),
 )
);

#Announcements
$server->wsdl->addComplexType(
'announcements_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'author_id'=>array('name'=>'author_id','type'=>'xsd:int'),
 'title'=>array('name'=>'title','type'=>'xsd:string'),
 'announcement_level'=>array('name'=>'announcement_level','type'=>'xsd:unsignedByte'),
 'content'=>array('name'=>'content','type'=>'xsd:string'),
 'date_created'=>array('name'=>'date_created','type'=>'xsd:date')
 )
);

#Courses
$server->wsdl->addComplexType(
'courses_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'title'=>array('name'=>'title','type'=>'xsd:string'),
 'room'=>array('name'=>'room','type'=>'xsd:string'),
 'faculty_id'=>array('name'=>'faculty_id','type'=>'xsd:int')
 )
);

#Course and Student
$server->wsdl->addComplexType(
'courses_students_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'course_id'=>array('name'=>'course_id','type'=>'xsd:int'),
 'student_id'=>array('name'=>'student_id','type'=>'xsd:int')
 )
);

#Schedule
$server->wsdl->addComplexType(
'schedules_array', #rename
'complexType',
'struct',
'all',
'',
array(
 'id'=>array('name'=>'id','type'=>'xsd:int'),
 'course_id'=>array('name'=>'course_id','type'=>'xsd:int'),
 'day_of_week'=>array('name'=>'day_of_week','type'=>'xsd:string'),
 'schedule_start'=>array('name'=>'schedule_start','type'=>'xsd:time'),
 'schedule_end'=>array('name'=>'schedule_end','type'=>'xsd:time')
 )
);

$server->wsdl->addComplexType('return_array_php', #rename; make 1 for each struct type (i.e. above code)
'complexType',
'array',
'all',
'SOAP-ENC:Array',
array(),
array(
array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:return_array[]')
),
'tns:return_array'
);

?>