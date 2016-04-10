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

-- Insert suggestions test data
INSERT INTO submissions (sid, cwid, submit_date, title, description, submitter_fname, submitter_lname, department, status, vote)
VALUES (1, 20055555, '2016-04-10 06:32:09', 'Please wash cups properly', 'Sometimes the coffee mugs in the dining hall are not properly washed, and still have coffee or tea residue on them. It would be nice if they could be more thoroughly washed and/or checked after being washed to make sure they are truly clean.', 'John', 'Smith', 'Dining', 'Under Review', 17),
       (2, 20036954, '2016-04-10 06:40:57', 'Clocks in Lab', 'Fix the clocks in the lab, they are off an hour.', 'Kevin', 'Johnson', 'IT', 'Under Review', 14),
       (3, 20014863, '2016-04-10 06:41:55', 'Not enough parking spaces.', 'I\'m a freshman and my parents bought me a car. Now I can\'t park it at campus. Please build more spaces.', 'Garry', 'Morgan', 'Parking', 'Submitted', 9),
       (4, 20036958, '2016-04-10 06:42:47', 'Waking up too early', 'I have lots of credits, but don\'t want to wake up at 6:45am. Can you make it later?', 'Anne', 'Houston', 'Registration', 'Under Review', 11),
       (5, 20069134, '2016-04-10 06:43:42', 'Roof Leaks', 'The floor creaks, the roof leaks, theres a terrible draft.', 'Danielle', 'Viola', 'Housing', 'Submitted', 2),
       (6, 20069414, '2016-04-10 06:45:25', 'More vegan options', 'There arent enough vegan options at the cab.', 'Brenda', 'Salmanaca', 'Dining', 'Submitted', 1);

-- Print database tables and fields to show that all of this worked
EXPLAIN users;
EXPLAIN admins;
EXPLAIN submissions;

-- Show test data
SELECT sid, cwid, submit_date, title, department, status, vote
FROM submissions
ORDER BY vote DESC;