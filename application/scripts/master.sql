DROP DATABASE cheapskate;
CREATE DATABASE cheapskate;
USE cheapskate;

CREATE TABLE venue (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    city varchar(100) NOT NULL default 'Saint John',
    province varchar(2) NOT NULL default 'NB',
    address1 varchar(100) NOT NULL,
    address2 varchar(100) NOT NULL,
    mapHash varchar(200) NULL,
    phone varchar(12) NULL,
    email varchar(100) NULL,
    website varchar(200) NULL,
    facebook varchar(200) NULL,
    twitter varchar(100) NULL,
    instagram varchar(100) NULL,
    hipFactor int(1) default 0,
    scaryFactor int(1) default 0,
    hasLiveMusic tinyint(1) default 0,
    musicType int(10) NULL,
    promoterId int(11) NULL
) ENGINE=INNODB;

CREATE TABLE deal (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    venueId int(11) NOT NULL,
    dealTypeId int(11) NOT NULL,
    coverTypeId int(11) NOT NULL,
    coverCost varchar(10) NULL,
    info text NULL,
    timeStart timestamp,
    timeEnd timestamp,
    
) ENGINE=INNODB;

CREATE TABLE category (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    info text NULL
) ENGINE=INNODB;

CREATE TABLE dealType (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    info text NULL,
    frequency int(1) default 0
) ENGINE=INNODB;

CREATE TABLE coverType (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    info text NULL
) ENGINE=INNODB;

CREATE TABLE user (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName varchar(100) NOT NULL,
    nameFirst varchar(100) NOT NULL,
    nameLast varchar(100) NOT NULL,
    city varchar(100) NOT NULL default 'Saint John',
    province varchar(2) NOT NULL default 'NB',
    phone varchar(12) NULL,
    email varchar(100) NOT NULL,
    twitter varchar(100) NULL,
    getNotifications tinyint(1) default 0,
    
) ENGINE=INNODB;

CREATE TABLE role (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role varchar(50) NOT NULL
) ENGINE=INNODB;

CREATE TABLE userRole (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId varchar(11) NOT NULL,
    roleId varchar(11) NOT NULL
) ENGINE=INNODB;

CREATE TABLE venueHours (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    venueId int(11) NOT NULL,
    dayId int(1) NOT NULL default 0,
    startTime int(5) NULL,
    endTime int(5) NULL,
) ENGINE=INNODB;
