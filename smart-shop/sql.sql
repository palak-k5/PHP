create database smart_shop;
use  smart_shop;

create table users ( id int primary key  AUTO_INCREMENT , name varchar(50), email varchar(50), password varchar , created_at timestamp);



create table cart(id int primary key auto_INCREMENT,item_name varchar(50), user_id int ,created_at timestamp
 foreign key (user_id) REFERENCES users(id) on delete cascade)


;


    alter table users drop column email;
    delete from users where id=100;
        delete from users where name="Palak";


INSERT INTO cart (id, item_name, user_id) VALUES (100, 'Mobile', 125);
