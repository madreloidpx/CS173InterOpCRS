CREATE TABLE users(
	id INT AUTO_INCREMENT,
	username VARCHAR(20),
	password VARCHAR(20),
	lastname VARCHAR(20),
	firstname VARCHAR(30),
	email VARCHAR(30),
	sex CHAR(1),
	address TEXT,
	contact INT,
	UNIQUE(username),
	PRIMARY KEY(id),
	INDEX name_index(firstname,lastname),
	INDEX username_index(username)
);

CREATE TABLE staff(
	id INT AUTO_INCREMENT,
	user_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(user_id)
		REFERENCES users(id)
);

CREATE TABLE admins(
	id INT AUTO_INCREMENT,
	staff_id INT,
	position_level TINYINT,
	PRIMARY KEY(id),
	FOREIGN KEY(staff_id)
		REFERENCES staff(id)
);

CREATE TABLE students(
	id INT AUTO_INCREMENT,
	user_id INT,
	academic_status TINYINT,
	bracket VARCHAR(2),
	student_number INT,
	enrollment_status TINYINT,
	PRIMARY KEY(id),
	FOREIGN KEY(user_id)
		REFERENCES users(id)
);

CREATE TABLE faculty(
	id INT AUTO_INCREMENT,
	staff_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(staff_id)
		REFERENCES staff(id)
);

CREATE TABLE courses(
	id INT AUTO_INCREMENT,
	title VARCHAR(20),
	schedule TEXT,
	room VARCHAR(10),
	faculty_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(faculty_id)
		REFERENCES faculty(id)
);

CREATE TABLE course_student(
	id INT AUTO_INCREMENT,
	course_id INT,
	student_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id),
	FOREIGN KEY(student_id)
		REFERENCES students(id)
);

CREATE TABLE announcements(
	id INT AUTO_INCREMENT,
	author_id INT,
	title VARCHAR(100),
	announcement_level TINYINT,
	content TEXT,
	date_created DATE,
	PRIMARY KEY(id),
	FOREIGN KEY(author_id)
		REFERENCES staff(id)
);

CREATE TABLE grades(
	id INT AUTO_INCREMENT,
	student_id INT,
	course_id INT,
	faculty_id INT,
	status TINYINT,
	semester VARCHAR(20),
	PRIMARY KEY(id),
	FOREIGN KEY(faculty_id)
		REFERENCES faculty(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id),
	FOREIGN KEY(student_id)
		REFERENCES students(id)
);