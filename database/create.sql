create database news_site;

CREATE TABLE IF NOT EXISTS `User` (
	`email` VARCHAR(255) NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`second_name` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`profile_picture` VARCHAR(255),
	`role_id` INT DEFAULT '2',
	PRIMARY KEY (`email`)
);

INSERT INTO
	user (email, first_name, second_name, password, role_id)
VALUES
	('admin@admin.hu', 'admin', 'admin', 'admin123', 1);

INSERT INTO
	user (email, first_name, second_name, password)
VALUES
	('user@user.hu', 'first', 'second', 'user0123');

CREATE TABLE IF NOT EXISTS `post` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_email` VARCHAR(255) NOT NULL,
	`text` TEXT NOT NULL,
	`category_id` INT NOT NULL,
	`add_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO
	post(user_email, text, category_id, add_date)
VALUES
(
		'user@user.hu',
		'this is a base news created by USER',
		1,
		curdate()
	);

INSERT INTO
	post(user_email, text, category_id, add_date)
VALUES
(
		'admin@admin.hu',
		'this is a base news created by ADMIN',
		3,
		curdate()
	);

INSERT INTO
	post(user_email, text, category_id, add_date)
VALUES
(
		'admin@admin.hu',
		'this is again a base news created by ADMIN',
		1,
		curdate()
	);

CREATE TABLE IF NOT EXISTS `category` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO
	category(name)
VALUES
	('Gaming');

INSERT INTO
	category(name)
VALUES
	('Business');

INSERT INTO
	category(name)
VALUES
	('Politics');

INSERT INTO
	category(name)
VALUES
	('Technology');

INSERT INTO
	category(name)
VALUES
	('Local news');

INSERT INTO
	category(name)
VALUES
	('Entertainment');

INSERT INTO
	category(name)
VALUES
	('Sports');

INSERT INTO
	category(name)
VALUES
	('Fashion');

INSERT INTO
	category(name)
VALUES
	('Travel');

INSERT INTO
	category(name)
VALUES
	('Health');

INSERT INTO
	category(name)
VALUES
	('Food/Drink');

INSERT INTO
	category(name)
VALUES
	('Hobbies');

INSERT INTO
	category(name)
VALUES
	('Other');

CREATE TABLE IF NOT EXISTS `role` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO
	role(name)
VALUES
	('admin');

INSERT INTO
	role(name)
VALUES
	('user');

CREATE TABLE `post_image` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`post_id` INT NOT NULL,
	`picture` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `comment` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`post_id` INT NOT NULL,
	`user_email` VARCHAR(255) NOT NULL,
	`text` VARCHAR(255) NOT NULL,
	`add_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO
	comment(post_id, user_email, text, add_date)
VALUES
(
		1,
		'user@user.hu',
		'this is a comment by user',
		curdate()
	);

INSERT INTO
	comment(post_id, user_email, text, add_date)
VALUES
(
		1,
		'user@user.hu',
		'this is a comment2 by user',
		curdate()
	);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
	`id` varchar(128) NOT NULL,
	`ip_address` varchar(45) NOT NULL,
	`timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
	`data` blob NOT NULL,
	KEY `ci_sessions_timestamp` (`timestamp`)
);