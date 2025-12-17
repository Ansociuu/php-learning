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

show tables;
select * from news;
describe news;