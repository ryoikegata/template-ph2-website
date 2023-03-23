DROP DATABASE IF EXISTS posse;
CREATE DATABASE posse;
USE posse;

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(255),
  image VARCHAR(255),
  supplement VARCHAR(255)
) CHARSET=utf8;

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INT,
  name VARCHAR(255),
  valid boolean,
  FOREIGN KEY (question_id) REFERENCES questions(id)
) CHARSET=utf8;
