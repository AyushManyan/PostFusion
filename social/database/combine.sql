-- Drop and create the database
DROP DATABASE IF EXISTS socialnetwork;
CREATE DATABASE socialnetwork;

USE socialnetwork;

-- Create Users Table
CREATE TABLE users (
    user_id             INT NOT NULL AUTO_INCREMENT,++++++++++++

    
    user_firstname      VARCHAR(20) NOT NULL,  
    user_lastname       VARCHAR(20) NOT NULL,
    user_nickname       VARCHAR(20),
    user_password       VARCHAR(255) NOT NULL,
    user_email          VARCHAR(255) NOT NULL,
    user_gender         CHAR(1) NOT NULL,
    user_birthdate      DATE NOT NULL,    
    user_status         CHAR(1),
    user_about          TEXT,
    user_hometown       VARCHAR(255),
    PRIMARY KEY (user_id)
);

-- Create Friendship Table
CREATE TABLE friendship (
    user1_id            INT NOT NULL,
    user2_id            INT NOT NULL,
    friendship_status   INT NOT NULL,
    FOREIGN KEY (user1_id) REFERENCES users(user_id),
    FOREIGN KEY (user2_id) REFERENCES users(user_id)
);

-- Create Posts Table
CREATE TABLE posts (
    post_id             INT NOT NULL AUTO_INCREMENT,
    post_caption        TEXT NOT NULL,
    post_time           TIMESTAMP NOT NULL, 
    post_public         CHAR(1) NOT NULL,
    post_by             INT NOT NULL,
    PRIMARY KEY (post_id),
    FOREIGN KEY (post_by) REFERENCES users(user_id)
);

-- Create User Phone Table
CREATE TABLE user_phone (
    user_id         INT,
    user_phone      INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Insert Users Data
INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status)
VALUES ("Armin", "Virgil", NULL, "securePassword123", "armin@gmail.com", "M", "2001-02-05", NULL);

INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status)
VALUES ("Paul", "James", "Pynch", "securePassword456", "paul@gmail.com", "M", "1998-12-19", "S");

INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status)
VALUES ("Chris", "Wilson", NULL, "securePassword789", "chris@gmail.com", "M", "1996-01-18", NULL);

INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status)
VALUES ("Rory", "Blue", NULL, "securePassword321", "rory@gmail.com", "F", "1994-04-18", "M");

INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status)
VALUES ("Andrea", "Surman", NULL, "securePassword654", "andrea@gmail.com", "M", "1994-06-06", NULL);

-- Insert Posts Data
INSERT INTO posts(post_caption, post_time, post_public, post_by)
VALUES ("Hello there!", "2017-12-23 00:50:06", "Y", 1);

INSERT INTO posts(post_caption, post_time, post_public, post_by)
VALUES ("Paul James has changed his profile picture.", "2017-12-23 00:50:06", "N", 2);

INSERT INTO posts(post_caption, post_time, post_public, post_by)
VALUES ("A new artwork from the upcoming content.", "2017-12-23 00:50:06", "Y", 3);

INSERT INTO posts(post_caption, post_time, post_public, post_by)
VALUES ("New Year Eve Fireworks", "2017-12-23 00:50:06", "Y", 4);

INSERT INTO posts(post_caption, post_time, post_public, post_by)
VALUES ("Visit our profile to check out the upcoming transfers and rumors for January 2018", "2017-12-23 00:50:06", "N", 5);

INSERT INTO posts(post_caption, post_time, post_public, post_by)
VALUES ("Happy new year!", "2017-12-23 00:50:06", "N", 5);

-- Insert Friendship Data
INSERT INTO friendship(user1_id, user2_id, friendship_status)
VALUES (2, 1, 1);

INSERT INTO friendship(user1_id, user2_id, friendship_status)
VALUES (2, 3, 1);

INSERT INTO friendship(user1_id, user2_id, friendship_status)
VALUES (2, 4, 1);

INSERT INTO friendship(user1_id, user2_id, friendship_status)
VALUES (1, 5, 1);

INSERT INTO friendship(user1_id, user2_id, friendship_status)
VALUES (3, 5, 1);

INSERT INTO friendship(user1_id, user2_id, friendship_status)
VALUES (4, 5, 1);
