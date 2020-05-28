create database byte_brasil character set utf8 collate utf8_general_ci;

use byte_brasil;

create table cursos (
id int(11) not null auto_increment,
titulo varchar(200) not null,
proposta_curso text not null,
grade_curricular text not null,
opcoes_de_aulas varchar(300) not null,
carga_horaria varchar(200) not null,
imagem varchar(50),
`status` int(1) default 1,
area varchar(50) not null,
primary key (id)
) engine = InnoDB, default charset = utf8;

select * from cursos;

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
`status` int(1) default 1,
hora_cadastro timestamp default current_timestamp,
anunciantes_id int(11) not null default 1,
primary key (id)
) engine = InnoDB, default charset = utf8;

select * from vagas;

create table usuarios(
id int(11) not null auto_increment,
nome varchar(100) not null,
email varchar(100) not null,
senha varchar(32) not null,
tipo int(1) default 2,
primary key (id)
) engine = InnoDB, default charset = utf8;
select * from usuarios;

create table anunciantes(
id int(11) not null auto_increment primary key,
nome varchar(100) not null,
email varchar(100) not null,
telefone varchar(20),
celular varchar(20)
) engine = InnoDB, default charset = utf8;
select * from anunciantes;

INSERT INTO byte_brasil.usuarios (nome, email, senha) VALUES ('Byte Brasil', 'adm@bytebrasil.com.br', md5('adm@bytebrasil'));
INSERT INTO byte_brasil.anunciantes (nome, email, telefone, celular) VALUES ('Byte Brasil', 'adm@bytebrasil.com.br', '49 3442-4222', '49 98501-4222');