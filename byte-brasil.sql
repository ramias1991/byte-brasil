create database byte_brasil character set utf8 collate utf8_general_ci;

use byte_brasil;

create table cursos (
id int(11) not null auto_increment,
titulo varchar(200) not null,
conteudos text not null,
duracao varchar(100) not null,
opcoes varchar(300) not null,
a_quem_se_destina text not null,
objetivo text not null,
imagem varchar(50),
primary key (id)
) engine = InnoDB, default charset = utf8;

alter table cursos add `status` int(1) default 1;
alter table vagas add `status` int(1) default 1;


create table vagas(
id int(11) not null auto_increment,
titulo varchar(150) not null,
funcao text not null,
horario_trabalho varchar(300),
idade varchar(100),
sexo varchar(50),
requisitos_profissionais text not null,
`local` varchar(100) not null,
salario varchar(100) not null,
primary key (id)
) engine = InnoDB, default charset = utf8;


create table usuarios(
id int(11) not null auto_increment,
nome varchar(100) not null,
email varchar(100) not null,
senha varchar(32) not null,
primary key (id)
) engine = InnoDB, default charset = utf8;
