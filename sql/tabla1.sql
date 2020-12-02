create table autores(
    id_autor int auto_increment primary key,
    apellidos varchar(60) not null,
    nombre varchar(40) not null
);
create table libros(
    id_libro int auto_increment primary key,
    titulo varchar(80) not null,
    isbn varchar(13),
    autor int,
    portada varchar(80) default "./img/default.jpg",
    constraint lib_autor foreign key(autor) references autores(id_autor) on update cascade on delete set null
);

-- create database1;
-- create user usuario@'localhost' identified by "usuario";
-- grant all on base1.* to usuario@'localhost';
-- Entrar desde consola -> mysql -u usuario -p base1
-- Vocado de datos ->      mysql -u usuario -p base1 < tabla1.sql