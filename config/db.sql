create database kanban_online;
use kanban_online;

create table usuario (
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null
);

create table tarefa (
    id int auto_increment primary key,
    nome varchar(100) not null,
    descricao text,
    status ENUM('to do','doing','done')  not null,
    prioridade ENUM('baixa','media','alta') not null,
    criado_em timestamp default current_timestamp,
    designado int,
    foreign key (id) references usuario(id) 
);

insert into usuario (nome, email, senha) values
('Admin','admin@email.com','admin123');