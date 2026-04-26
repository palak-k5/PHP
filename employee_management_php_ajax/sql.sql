create database employee_management;
use employee_management;


create table  employees (
    id INT primary key AUTO_INCREMENT,
    name varchar(50),
    email varchar(50),
    age int,
    phone varchar(25),
    city varchar(40)
);

create table roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name varchar(50),
    description varchar(150)
);

CREATE TABLE employee_roles (
    emp_id INT,
    role_id INT,
        
    FOREIGN KEY (emp_id) REFERENCES employees(id) on delete cascade,
    FOREIGN KEY (role_id) REFERENCES roles(id) on delete cascade
);

INSERT INTO roles (id, role_name) VALUES
(1, 'Backend Developer'),
(2, 'HR'),
(3, 'Manager'),
(4, 'Full Stack Developer'),
(5, 'Frontend Developer'),
(6, 'Devops Engineer'),
(7, 'Intern');