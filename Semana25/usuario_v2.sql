create database cafebistro_phpoo_turmaa;
use cafebistro_lp2d3;
create table usuario (
nome varchar(255),
email varchar(255) primary key,
senha varchar(255));
select * from usuario;

alter table usuario add tipo varchar(30);
