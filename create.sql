create database news_site;

CREATE TABLE IF NOT EXISTS `user` (
`first_name` varchar(255) NOT NULL,
`second_name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`profile_picture` varchar(255),
`role_id` int DEFAULT '2',
PRIMARY KEY (`email`)
);

CREATE TABLE IF NOT EXISTS `post` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_email` VARCHAR(255) NOT NULL,
	`text` TEXT NOT NULL,
	`category_id` INT NOT NULL DEFAULT '0',
	`add_date` DATETIME  NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `post_image` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`post_id` INT NOT NULL,
	`picture` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `role` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO role(name) VALUES ('admin');
INSERT INTO role(name) VALUES ('user');

CREATE TABLE IF NOT EXISTS `category` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO category(name) VALUES ('Gaming');
INSERT INTO category(name) VALUES ('Business');
INSERT INTO category(name) VALUES ('Politics');
INSERT INTO category(name) VALUES ('Technology');
INSERT INTO category(name) VALUES ('Local news');
INSERT INTO category(name) VALUES ('Entertainment');
INSERT INTO category(name) VALUES ('Sports');
INSERT INTO category(name) VALUES ('Fashion');
INSERT INTO category(name) VALUES ('Travel');
INSERT INTO category(name) VALUES ('Health');
INSERT INTO category(name) VALUES ('Food/Drink');
INSERT INTO category(name) VALUES ('Hobbies');
INSERT INTO category(name) VALUES ('Other');

CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(128) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`)
 );