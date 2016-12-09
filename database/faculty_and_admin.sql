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

CREATE TABLE faculty(
	id INT AUTO_INCREMENT,
	staff_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(staff_id)
		REFERENCES staff(id)
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