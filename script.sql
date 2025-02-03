create database phpet;
use phpet;

create table usuarios(
	id int not null auto_increment primary key,
    nome varchar(100) not null,
    cpf char(11) not null unique,
    email varchar(100) not null,
    senha varchar(100) not null,
    tipo_usuario ENUM('usuario', 'veterinario', 'administrador') NOT NULL
);

select * from usuarios;

CREATE TABLE animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50),
    raca VARCHAR(50),
    idade INT,
    id_dono INT,
    FOREIGN KEY (id_dono) REFERENCES usuarios(id) ON DELETE SET NULL
);

select * from animais;

CREATE TABLE consulta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dia DATE NOT NULL,
    horario TIME NOT NULL,
    motivo TEXT NOT NULL,
    tipo VARCHAR(100) NOT NULL,
    id_animal INT NOT NULL,
    id_usuario INT NOT NULL,
    id_veterinario INT NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animais(id) ON DELETE CASCADE, -- Exclui consultas ao excluir o animal
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE, -- Exclui consultas ao excluir o usuário
    FOREIGN KEY (id_veterinario) REFERENCES usuarios(id) ON DELETE CASCADE, -- Exclui consultas ao excluir o veterinário
    UNIQUE KEY (dia, horario, id_veterinario) -- Evita consultas duplicadas no mesmo horário
);

select * from consulta;

insert into usuarios (nome, email, cpf, senha, tipo_usuario) values ("joão teste", "teste@gmail.com", "12312312311", "teste@123", "usuario");
insert into usuarios (nome, email, cpf, senha, tipo_usuario) values ("veterinario teste", "teste@gmail.com", "12212212211", "teste@123", "veterinario");
insert into usuarios (nome, email, cpf, senha, tipo_usuario) values ("admnistrador teste", "teste@gmail.com", "11111111111", "teste@123", "administrador");

INSERT INTO animais (nome, especie, raca, idade, id_dono) 
VALUES ('Toddy', 'Gato', 'siames', 3, 1);
