drop database cadastro; 
create database cadastro;
use cadastro;


create table usuarios (
id_usuarios int primary key auto_increment,
nome varchar (80) not null,
email varchar (90) not null unique,
senha varchar(60),
telefone varchar (50) not null
);



select*from Usuarios;