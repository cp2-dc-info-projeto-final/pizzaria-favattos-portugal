create database favatto;
use favatto;
create table cliente (

    id int AUTO_INCREMENT,
    nome varchar (80),
    data_nasc date,
    email varchar (125),
    telefone varchar (11),
    cpf varchar (11),
    logi varchar (10),
    senha varchar (100),
    sexo varchar (10),
    Rua varchar (120),
    Municipio varchar (30),
    Complemento varchar (50),
    primary key (id)
);