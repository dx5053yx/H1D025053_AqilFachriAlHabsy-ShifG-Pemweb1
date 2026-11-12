create database if not exists pertemuan7;
use pertemuan7;

create table if not exists user (
    id int primary key auto_increment,
    username varchar(50) not null unique,
    password varchar(255) not null
);
