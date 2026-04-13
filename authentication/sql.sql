create database auth;

use auth;

create table users (id INT AUTO_INCREMENT primary key,username varchar(50),email VARCHAR(100),password varchar(255),profile varchar(255)
    );

delete from users;