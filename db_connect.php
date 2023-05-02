<?php

$db = new mysqli("localhost", "root", "");
if ($db->connect_errno > 0) {
  die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->query("CREATE DATABASE IF NOT EXISTS `staff_db`");

mysqli_select_db($db, "staff_db");




$stableYZ = "CREATE TABLE IF NOT EXISTS Inorg (
                 id int(11) NOT NULL auto_increment,
                 name varchar(300)NOT NULL,
                 Phone varchar(300)NOT NULL,
                 email varchar(100)NOT NULL,
                 website varchar(300)NOT NULL,
                 year varchar(10)NOT NULL,
                 pname varchar(1000)NOT NULL,
                 type varchar(30)NOT NULL,
                 size decimal(10)NOT NULL,
                 content longblob NOT NULL,
                 PRIMARY KEY(id) )";
$db->query($stableYZ);

$stableZ = "CREATE TABLE IF NOT EXISTS Profilepictures (
                 id int(11) NOT NULL auto_increment,
                 ids varchar(30)NOT NULL,
                 Category varchar(30)NOT NULL,
                 name varchar(1000)NOT NULL,
                 type varchar(30)NOT NULL,
                 Size decimal(10)NOT NULL,
                 content longblob NOT NULL,
                 PRIMARY KEY(id) )";
$db->query($stableZ);

$stable1 = "CREATE TABLE IF NOT EXISTS Files (
                 id int(11) NOT NULL auto_increment,
                 Title varchar(300)NOT NULL,
                 Name varchar(1000)NOT NULL,
                 Type varchar(30)NOT NULL,
                 Size decimal(10) NULL,
                 content longblob NOT NULL,
                 PRIMARY KEY(id) )";
$db->query($stable1);

$stable56 = "CREATE TABLE IF NOT EXISTS Users (
                  id int(11) NOT NULL auto_increment,
                  Firstname varchar(300)NOT NULL,
                  Sirname varchar(300)NOT NULL,
                  Mtitle varchar(30)NOT NULL,                                 
                  Ranks varchar(30)NOT NULL,                                 
                  Department varchar(300)NOT NULL,
                  Email varchar(300)NOT NULL,
                  Staffid varchar(300)NOT NULL,
                  Online varchar(300)NOT NULL,
                  Picname varchar(1000)NOT NULL,
                  Time bigint(30)NOT NULL,                         
                  PRIMARY KEY(id) )";
$db->query($stable56);



$stable4 = "CREATE TABLE IF NOT EXISTS Administrator (
                  id int(11) NOT NULL auto_increment,
                  Firstname varchar(30)NOT NULL,
                  Sirname varchar(30)NOT NULL,
                  Mtitle Varchar(30)NOT NULL,
                  Phone varchar(30)NOT NULL,
                  Password varchar(30)NOT NULL,
                  Email varchar(30)NOT NULL,
                  PRIMARY KEY(id) )";
$db->query($stable4);

$createTableQuery = "CREATE TABLE IF NOT EXISTS Employee (
                  ID int(11) NOT NULL AUTO_INCREMENT,
                  FirstName varchar(50) NOT NULL,
                  MiddleName varchar(30) NOT NULL,
                  LastName varchar(50) NOT NULL,
                  Suffix varchar(11) NOT NULL,
                  Gender varchar(10) NOT NULL,
                  Position varchar(50) NOT NULL,
                  AreaOfAssignment varchar(80) NOT NULL,
                  Regular_SubAllotment varchar(20) NOT NULL,
                  ContractDuration_start date NOT NULL,
                  ContractDuration_end date NOT NULL,
                  InclusiveDateOfEmployment date NOT NULL,
                  SalaryGrade varchar(30) NOT NULL,
                  Salary varchar(30) NOT NULL,
                  PRC varchar(50) NOT NULL,
                  Address varchar(100) NOT NULL,
                  Birthdate date NOT NULL,
                  PlaceOfBirth varchar(100) NOT NULL,
                  NameOfPersonToNotify varchar(100) NOT NULL,
                  Bloodtype varchar(10) NOT NULL,
                  TINNumber varchar(50) NOT NULL,
                  Philhealth varchar(50) NOT NULL,
                  SSS varchar(50) NOT NULL,
                  PagIbigNumber varchar(50) NOT NULL,
                  CPNumber varchar(50) NOT NULL,
                  EmailAddress varchar(50) NOT NULL,
                  Signature varchar(100) NOT NULL,
                  ProfilePhoto mediumtext NOT NULL,
                  PRIMARY KEY (id) )";
$db->query($createTableQuery);


$sql = "SELECT * FROM Administrator ";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);

if ($rowcount == 0) {
  $enter = "INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES('admin','admin@gmail.com','Admin','Admin','Mr','265999107724')";
  $db->query($enter);

  $querydy = "INSERT INTO Files (Title,Name,Size,Type) " .
    "VALUES ('Staff','staff.csv','76','application/vnd.ms-excel')";
  $db->query($querydy) or die('Errorr, query failed to upload');
}
?>