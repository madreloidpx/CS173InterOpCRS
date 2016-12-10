CREATE TABLE students(
	id INT AUTO_INCREMENT,
	username VARCHAR(20),
	password VARCHAR(20),
	lastname VARCHAR(20),
	firstname VARCHAR(30),
	email VARCHAR(30),
	sex CHAR(1),
	address TEXT,
	contact INT,
	academic_status TINYINT,
	bracket VARCHAR(2),
	student_number CHAR(10),
	enrollment_status TINYINT,
	approval_status BOOLEAN,
	UNIQUE(username),
	UNIQUE(student_number),
	PRIMARY KEY(id),
	INDEX name_index(firstname,lastname),
	INDEX username_index(username)
);

CREATE TABLE grades(
	id INT AUTO_INCREMENT,
	student_id INT,
	course_id INT,
	status TINYINT,
	semester VARCHAR(20),
	PRIMARY KEY(id),
	FOREIGN KEY(student_id)
		REFERENCES students(id)
);