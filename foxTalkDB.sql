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
    submit_date      DATETIME NOT NULL,
    title            TEXT     NOT NULL,
    description      TEXT     NOT NULL,
    submitter_fname  TEXT,
    submitter_lname  TEXT,
    department       SET("Dining", "Housing", "IT", "Registration", "Other") NOT NULL,
    status           SET("Submitted", "Under Review", "Approved", "Rejected") NOT NULL
);

-- Create the Users table
CREATE TABLE IF NOT EXISTS users (
    uid       INT AUTO_INCREMENT PRIMARY KEY,
    username  TEXT NOT NULL,
    password  TEXT NOT NULL
);

-- Create the Admins table
CREATE TABLE IF NOT EXISTS admins (
    aid       INT AUTO_INCREMENT PRIMARY KEY,
    username  TEXT NOT NULL,
    password  TEXT NOT NULL
);