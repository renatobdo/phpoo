create database cafebistro;
use cafebistro;
create table usuario (id int primary key,
nome varchar(40),
email varchar(255),
senha varchar(255));
insert into usuario values (1, 'admin', 
'adminturmaa@ifsp.edu.br', 'turmab');
select * from usuario;