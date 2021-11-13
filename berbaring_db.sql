CREATE DATABASE IF NOT EXISTS `berbaring_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `berbaring_db`;


DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `joined_date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
);

INSERT INTO `user` (`joined_date`,`name`, `email`, `password`) VALUES
('2021-10-22', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
);

INSERT INTO `category` (`name`) VALUES
('Sosial'),
('Pemrograman');

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `c_id` INT(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(75) NOT NULL,
  `c_imagepath` varchar(200) NOT NULL,
  `c_desc` varchar(1000) NOT NULL,
  `c_price` INT(11) NOT NULL,
  `category_id` INT(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  CONSTRAINT `FK_CategoryCourse` FOREIGN KEY (`category_id`)
  REFERENCES `category`(`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


DROP TABLE IF EXISTS `subchapter`;
CREATE TABLE IF NOT EXISTS `subchapter` (
  `sc_id` INT(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(30) NOT NULL,
  `sc_video_link` varchar(200) NOT NULL,
  `sc_filepath` varchar(200) NOT NULL,
  `sc_desc` varchar(1000) NOT NULL,
  `c_id` INT(11) NOT NULL,
  PRIMARY KEY (`sc_id`),
  CONSTRAINT `FK_ChapterCourse` FOREIGN KEY (`c_id`)
  REFERENCES `course`(`c_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feed_id` INT(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(75) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `submitted_date` date NOT NULL,
  `c_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`feed_id`),
  CONSTRAINT `FK_CourseSource` FOREIGN KEY (`c_id`)
  REFERENCES `course`(`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_FeedbackUser` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `mentor_activity`;
CREATE TABLE IF NOT EXISTS `mentor_activity` (
  `activity_mentor_id` INT(11) NOT NULL AUTO_INCREMENT,
  `created_date` date NOT NULL,
  `published_date` date,
  `user_id` INT(11) NOT NULL,
  `c_id` INT(11) NOT NULL,
  PRIMARY KEY (`activity_mentor_id`),
  CONSTRAINT `FK_UserMentor` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CourseMentor` FOREIGN KEY (`c_id`)
  REFERENCES `course`(`c_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `student_activity`;
CREATE TABLE IF NOT EXISTS `student_activity` (
  `activity_student_id` INT(11) NOT NULL AUTO_INCREMENT,
  `started_date` date,
  `finished_date` date,
  `user_id` INT(11) NOT NULL,
  `c_id` INT(11) NOT NULL,
  PRIMARY KEY (`activity_student_id`),
  CONSTRAINT `FK_UserStudent` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CourseStudent` FOREIGN KEY (`c_id`)
  REFERENCES `course`(`c_id`) ON DELETE CASCADE ON UPDATE CASCADE
);