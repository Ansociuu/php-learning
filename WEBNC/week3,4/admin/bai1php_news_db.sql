create database news_db
	character set utf8mb4
	collate utf8mb4_unicode_ci;
use news_db;

create table news 
(
	id int auto_increment primary key,
    title varchar(255) not null, 
    content text not null,
    created_at datetime not null,
    updated_at datetime not null
);

create table users 
(
	id int auto_increment primary key,
    email varchar(255) not null unique,
    password varchar(255) not null,
    username varchar(100) unique,
    date_of_birth date,
    gender enum ('male', 'female', 'other'),
    phone varchar(20) unique,
    avatar varchar(255),
    role enum('user', 'admin') default 'user',
    status enum('active', 'inactive', 'banned') default 'active',
    email_verified_at timestamp null,
    remember_token varchar(255) null,
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp on update current_timestamp,
	deleted_at timestamp NULL		
);

show tables;
select * from news;
describe news;
select * from users;
describe users;