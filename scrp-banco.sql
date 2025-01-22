create database autopecas;
use autopecas;
create table clientes(
	id int not null auto_increment primary key,
    nome varchar(140) not null,
    cpf char(11) not null,
    email varchar(200) not null
);

create table produtos(
	id int not null auto_increment primary key,
    nome varchar(100) not null,
    descricao text not null,
    estoque int not null,
    preco decimal(10,2) not null
);
select * from clientes;