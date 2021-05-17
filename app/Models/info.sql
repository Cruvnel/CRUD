create database info;
use info;
show tables;
desc Cadastro;
select * from Cadastro;

create table Cadastro(

cod_cadastro int not null primary key auto_increment,
nome varchar (11) not null,
email varchar (15) not null,
senha varchar (5) not null 

)engine=innodb; 
