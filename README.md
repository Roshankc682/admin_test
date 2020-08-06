# admin_test

This code is used for admin panel which was built for uploading book name , author name , tittle ,  image and store in database.Whole 
code is written in php

moreover, manupulation of data can be done

this data is use by ecommerce website which was build and can be found in repositories


// sql to create database 
//first create a bs database then run sql query
CREATE TABLE book (
book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
author VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,
image VARCHAR(50),
category VARCHAR(50),
description VARCHAR(30) NOT NULL
)




//=============================================================
// sql to create database for admin section
//first create an players database
CREATE TABLE admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)
Then add admin user and password as per client demand
//=============================================================

And in database bs run 
// sql to create database 
CREATE TABLE user_deliver (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(30) NOT NULL,
book_name VARCHAR(30) NOT NULL,
street1 VARCHAR(30) NOT NULL,
street2 VARCHAR(50),
city VARCHAR(50),
zip VARCHAR(50),
zip VARCHAR(50),
toal_cost_pass VARCHAR(50),
stripeToken VARCHAR(50),
stripeEmail VARCHAR(50),
stripeToken VARCHAR(50),
hash_token_for_client_for_ship VARCHAR(50),
time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
