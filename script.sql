create database phpet;

use phpet;


select * from usuarios;
select * from animais;

create table usuarios(
	id int not null auto_increment primary key,
    nome varchar(100) not null,
    cpf char(11) not null unique,
    email varchar(100) not null,
    senha varchar(100) not null,
    tipo_usuario enum('usuario', 'veterinario', 'administrador')
);	

create table animais(
	id int not null auto_increment primary key,
	nome varchar(100) not null,
    especie varchar(50) not null,
    raca varchar(50) not null,
    idade varchar(10) not null,
    id_dono int not null,
    foreign key (id_dono) references usuarios(id)
);


SELECT EXISTS( SELECT 1 FROM animais WHERE animais.id_dono = 1 ) AS tem_animal;