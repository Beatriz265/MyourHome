CREATE DATABASE myourhome;
USE myourhome;

CREATE TABLE usuarios (
id_usuario int NOT NULL AUTO_INCREMENT ,
nome VARCHAR(128) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
senha_hash VARCHAR(255) NOT NULL,
PRIMARY KEY (id_usuario)
)
ENGINE=innodb;

ALTER TABLE usuarios
ADD `reset_token_hash` VARCHAR(64) NULL DEFAULT NULL,
ADD `expire_token_at` DATETIME NULL DEFAULT NULL,
ADD UNIQUE ( `reset_token_hash`);

create table animais (
num_animal SMALLINT not null AUTO_INCREMENT ,
nome varchar(100) not null,
idade SMALLINT,
tamanho varchar(25) not null,
peso decimal(8,3) not null,
tipo varchar(100) not null,
cor varchar (100) not null,
contato varchar(100) not null,
descricao char(255) not null,
imagem 	varchar(255) not null,
primary key (num_animal)
)
ENGINE=innodb;