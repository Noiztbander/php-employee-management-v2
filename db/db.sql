--
-- Database creation
--

DROP DATABASE IF EXISTS employeemanagement;
CREATE DATABASE employeemanagement;
USE employeemanagement;

--
-- Tables creation
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `streetAddress` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `postalCode` varchar(20) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
);

--
-- Insert data for "employees" table
--

INSERT INTO `employees` VALUES (1,'Rack','Lei','jackon@network.com','man','San Jone','126','CA',24,'394221','7383627627');

--
-- Insert data for "users" table
--

INSERT INTO `users` VALUES (1,'admin','$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC','admin@assemblerschool.com',1),(2,'employee','$2y$10$cprAuEgbKBhqpxSabK0MrOtW3l1Tso4LGWAB8DS.LCKR/wNL51s6W','employee@assemblerschool.com',0);