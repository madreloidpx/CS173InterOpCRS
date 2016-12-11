CREATE TABLE staff(
	id INT AUTO_INCREMENT,
	username VARCHAR(20),
	password VARCHAR(20),
	lastname VARCHAR(20),
	firstname VARCHAR(30),
	email VARCHAR(30),
	sex CHAR(1),
	address TEXT,
	contact INT,
	position_level TINYINT,
	approval_status BOOLEAN,
	UNIQUE(username),
	PRIMARY KEY(id),
	INDEX name_index(firstname,lastname),
	INDEX username_index(username)
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

CREATE TABLE consultation_schedules(
	id INT AUTO_INCREMENT,
	faculty_id INT,
	day_of_week CHAR(1),
	schedule_start TIME,
	schedule_end TIME,
	PRIMARY KEY(id),
	FOREIGN KEY(faculty_id)
		REFERENCES staff(id)
);