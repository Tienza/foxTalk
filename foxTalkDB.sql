-- Title: foxTalk SQL Script
-- Purpose: This file contains the SQL code that creates the
--          database for foxTalk.
-- Authors: Krisztián Köves
-- Date: 4/8/2016

-- Enable SQL warnings, in case anything goes wrong
\W

-- Create the database itself
CREATE DATABASE IF NOT EXISTS foxTalkDB;

USE foxTalkDB;

-- Create the Submissions table
CREATE TABLE IF NOT EXISTS submissions (
    sid              INT AUTO_INCREMENT PRIMARY KEY,
	cwid			 INT        NOT NULL,
    submit_date      DATETIME   NOT NULL,
    title            TEXT       NOT NULL,
    description      TEXT       NOT NULL,
    submitter_fname  TEXT,
    submitter_lname  TEXT,
    department       SET("Dining", "Housing", "IT", "Parking", "Registration", "Other") NOT NULL,
    status           SET("Submitted", "Under Review", "Approved", "Rejected") NOT NULL,
	vote			 INT        NOT NULL DEFAULT 0
);

-- Create the Users table
CREATE TABLE IF NOT EXISTS users (
    uid       INT   AUTO_INCREMENT PRIMARY KEY,
    username  TEXT  NOT NULL,
    password  TEXT  NOT NULL,
	salt	  TEXT  NOT NULL
);

-- Create the Admins table
CREATE TABLE IF NOT EXISTS admins (
    aid       INT   AUTO_INCREMENT PRIMARY KEY,
    username  TEXT  NOT NULL,
    password  TEXT  NOT NULL,
	salt	  TEXT  NOT NULL
);

-- Insert our first admin into the table, with hash and salt
INSERT INTO admins (username, password, salt)
	VALUES ("admin", "$2y$12$a161bd8b4b7bda7313255uJEXV2e7JysLYdmTJ9yFpJ16LlizHQZS", "a161bd8b4b7bda7313255855e3550967f2437dea");

-- Print database tables and fields to show that all of this worked
EXPLAIN users;
EXPLAIN admins;
EXPLAIN submissions;