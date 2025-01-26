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

create database phpet;

use phpet;

show tables;
drop table usuarios;

create table usuarios(
	id int not null auto_increment primary key,
    nome varchar(100) not null,
    cpf char(11) not null unique,
    email varchar(100) not null,
    senha varchar(100) not null,
    tipo_usuario ENUM('usuario', 'veterinario', 'administrador') NOT NULL
);

CREATE TABLE animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50),
    raca VARCHAR(50),
    idade INT,
    id_dono INT,
    FOREIGN KEY (id_dono) REFERENCES usuarios(id) ON DELETE SET NULL
);

INSERT INTO animais (nome, especie, raca, idade, id_dono) 
VALUES ('Rex', 'Cachorro', 'Labrador', 3, 1);

select * from usuarios;
select * from animais;

delete from usuarios where id = 15;


SELECT animais.nome AS animal_nome, 
       animais.especie, 
       animais.raca,
       animais.idade,
       usuarios.nome AS usuario_nome, 
       usuarios.cpf,
       usuarios.email 
FROM animais
JOIN usuarios ON animais.id_dono = usuarios.id;

SELECT EXISTS( SELECT 1 FROM animais WHERE animais.id_dono = 100 ) AS tem_animal;