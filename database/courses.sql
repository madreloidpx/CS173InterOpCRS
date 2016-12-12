CREATE TABLE courses(
	id INT AUTO_INCREMENT,
	title VARCHAR(20),
	room VARCHAR(10),
	units INT,
	academic_year INT,
	sem INT,
	PRIMARY KEY(id)
);

CREATE TABLE course_student(
	id INT AUTO_INCREMENT,
	course_id INT,
	student_id INT,
	slots INT,
	slots_taken INT,
	student_enrolled BOOLEAN,
	PRIMARY KEY(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id)
);

CREATE TABLE course_faculty(
	id INT AUTO_INCREMENT,
	course_id INT,
	faculty_id INT,
	faculty_enrolled BOOLEAN,
	PRIMARY KEY(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id)
);

CREATE TABLE course_schedules(
	id INT AUTO_INCREMENT,
	course_id INT,
	day_of_week CHAR(1),
	schedule_start TIME,
	schedule_end TIME,
	PRIMARY KEY(id),
	FOREIGN KEY(course_id)
		REFERENCES courses(id)
);