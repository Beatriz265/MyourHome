create database Myourhome;
use Myourhome;

create table animais (
num_animal SMALLINT not null AUTO_INCREMENT ,
nome varchar(100) not null
Idade SMALLINT,
tipo varchar(25) not null
descricao char(300),
imagem BLOB,
primary key (num_animal)
)
ENGINE=innodb;
