create database news_site;

CREATE TABLE IF NOT EXISTS `user` (
`first_name` varchar(255) NOT NULL,
`second_name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`profile_picture` varchar(255),
`role_id` int DEFAULT '0',
PRIMARY KEY (`email`)
);