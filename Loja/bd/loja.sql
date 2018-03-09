create database loja;

use loja;

CREATE TABLE produtos (id integer auto_increment primary key, nome varchar(45), preco double);

insert into produtos values (1, 'Carro', '20000');

insert into produtos values (2, 'Motocicleta', '10000');

select * from produtos;