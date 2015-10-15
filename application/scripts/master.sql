DROP DATABASE cheapskate;
CREATE DATABASE cheapskate;
USE cheapskate;

CREATE TABLE venue (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    categoryId int(11) NOT NULL,
    locationNum int(5) NOT NULL,
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
    promoterId int(11) NULL,
    status varchar(100) NULL
) ENGINE=INNODB;

CREATE TABLE deal (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    venueId int(11) NOT NULL,
    eventId int(11) NULL,
    venueTypeId int(11) NULL,
    dealTypeId int(11) NOT NULL,
    info text NULL,
    timeStart timestamp,
    timeEnd timestamp,
    INDEX venue_ind (venueId),
    FOREIGN KEY (venueId) 
        REFERENCES venue(id)
        ON DELETE CASCADE
    INDEX event_ind (eventId),
    FOREIGN KEY (eventId) 
        REFERENCES event(id)
        ON DELETE CASCADE
    
) ENGINE=INNODB;

CREATE TABLE venueType (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    info text NULL
) ENGINE=INNODB;

CREATE TABLE dealType (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    info text NULL,
    frequency int(1) default 0
) ENGINE=INNODB;

CREATE TABLE coverType (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    info text NULL
) ENGINE=INNODB;

INSERT INTO coverType SET `name`='None';
INSERT INTO coverType SET `name`='Free';
INSERT INTO coverType SET `name`='Free Until...';
INSERT INTO coverType SET `name`='Discount Until...';
INSERT INTO coverType SET `name`='Pay What You Can';
INSERT INTO coverType SET `name`='Door';
INSERT INTO coverType SET `name`='Ticket';
INSERT INTO coverType SET `name`='Ticket & Door';
INSERT INTO coverType SET `name`='Donation';
INSERT INTO coverType SET `name`='Donation w/ minimum';
INSERT INTO coverType SET `name`='Free w/ Item';
INSERT INTO coverType SET `name`='Discount w/ Item';
INSERT INTO coverType SET `name`='Costume Only';
INSERT INTO coverType SET `name`='Discount w/ Costume';
INSERT INTO coverType SET `name`='Invite Only';
INSERT INTO coverType SET `name`='Industry Night';

CREATE TABLE `user` (
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
    lastLocationLat varchar(20) NULL,
    lastLocationLong varchar(20) NULL
) ENGINE=INNODB;

CREATE TABLE `role` (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `role` varchar(50) NOT NULL
) ENGINE=INNODB;

INSERT INTO role SET role='Admin';
INSERT INTO role SET role='Moderator Lead';
INSERT INTO role SET role='Moderator';
INSERT INTO role SET role='Moderator Jr';
INSERT INTO role SET role='Venue Owner';
INSERT INTO role SET role='Venue Employee';
INSERT INTO role SET role='Venue Contributor';
INSERT INTO role SET role='Promoter';
INSERT INTO role SET role='Liquor Rep';
INSERT INTO role SET role='Advertiser';
INSERT INTO role SET role='User';
INSERT INTO role SET role='Guest';

CREATE TABLE userRole (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId varchar(11) NOT NULL,
    roleId varchar(11) NOT NULL,
    INDEX user_ind (userId),
        FOREIGN KEY (userId) 
            REFERENCES `user`(id)
            ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE venueHours (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    venueId int(11) NOT NULL,
    dayId int(1) NOT NULL default 0,
    startTime int(5) NULL,
    endTime int(5) NULL,
    INDEX venue_ind (venueId),
    FOREIGN KEY (venueId) 
        REFERENCES venue(id)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE event (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dealId int(11) NULL,
    eventTypeId int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    info text NULL,
    submittedById int(11) NOT NULL,
    coverCost varchar(10) NULL,
    coverTypeId int(11) NOT NULL
    
) ENGINE=INNODB;

CREATE TABLE eventType (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    info text NOT NULL
) ENGINE=INNODB;
