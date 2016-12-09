CREATE TABLE courses(
	id INT AUTO_INCREMENT,
	title VARCHAR(20),
	schedule TEXT,
	room VARCHAR(10),
	faculty_id INT,
	PRIMARY KEY(id)
);

CREATE TABLE course_student(
	id INT AUTO_INCREMENT,
	course_id INT,
	student_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id)
);