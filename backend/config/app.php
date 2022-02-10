<?php

CREATE TABLE users (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    createBy INT(6),
    createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updateDate DATETIME NULL,
    status int(2)
 )

CREATE TABLE coupons (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    couponsCode VARCHAR(255) NOT NULL,
    customerUsername VARCHAR(255) NOT NULL,
    createBy INT(10),
    createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    endDate DATETIME NOT NULL,
    used DATETIME NULL, 
    status int(2) NOT NULL
 )

 CREATE TABLE rewards (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rewardName VARCHAR(255) NOT NULL,
    rewardType VARCHAR(255) NOT NULL,
    randomPercent INT(6),
    totalItems int(5),
    balanceItems int(5),
    startDate DATE,
    endDate DATE,
    createBy INT(10),
    createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updateDate DATETIME NULL,
    status int(2) NOT NULL
 )

 CREATE TABLE results (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    couponsCode VARCHAR(255) NOT NULL,
    rewardId INT(10) NOT NULL,
    createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updateDate DATETIME NULL,
    status int(2) NOT NULL
 )

 CREATE TABLE access_logs (
   id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   userId INT(10) NOT NULL,
   ipAddress varchar(255) NOT NULL,
   loginDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAM
)


?>