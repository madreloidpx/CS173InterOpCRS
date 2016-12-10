CREATE TABLE courses(
	id INT AUTO_INCREMENT,
	title VARCHAR(20),
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

CREATE TABLE schedules(
	id INT AUTO_INCREMENT,
	course_id INT,
	day_of_week CHAR(1),
	schedule_start TIME,
	schedule_end TIME,
	PRIMARY KEY(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id)
);