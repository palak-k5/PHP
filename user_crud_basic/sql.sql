create database user_management;
use user_management;
create table users (id int primary key AUTO_INCREMENT , name varchar(50), email varchar(50), age int ,phone varchar(25),city varchar(40),  role varchar(50) );

select * from users;