-- el sitio debe llevar una base de datos con lo siguiente

-- debe contener estudiantes con las diferentes carreras, asi como moderadores y administradores
-- cada estudiante debe estar ligado a una carrera y facultad, debe haber una publicacion, donde 
-- se relaciones con la tabla de carreras, para seleccionarlos por carrera. ecrear tablka con el codifg 
-- de carnet y el de usuario
-- adicional debe contener un espacio para el token de recuperacion


CREATE DATABASE IF NOT EXISTS `uls_2019` CHARACTER SET 'UTF8' COLLATE 'utf8_general_ci';
USE `uls_2019`;

-- esta tabla la creare primero por que lleva una unica primary key
create table facultad(
    id tinyint(3) not null auto_increment primary key,
    nombre varchar(70) not null
);

-- aun no se con que se va a relacionar publicacion
create table publicacion(
    id_publicacion int not null auto_increment primary key,
    titulo varchar(125) null,
    descripcion text null,
    imagen text null
);

-- la siguiente tabla tiene una llave foranea que hace referencia a la tabla facultad

create table carrera(
    id_carrera tinyint(3) not null auto_increment primary key,
    nombre varchar(70) not null,
    id_facultad tinyint(3) not null,
    constraint fk_id_facultad foreign key(id_facultad)
    references facultad(id)
);





-- muestra el tipo de usuario, en este caso, seran tres

create table tipo_usuario(
id_usuario int(3) not null auto_increment  primary key,
tipo varchar(25) not null
);

-- la siguiente tabla muestra los datos del usuario
-- aqui hay dos llaves foraneas que unen el tipo de usuario y la carrera a la que pertenece

create table usuario(
    id int not null auto_increment primary key,
    carnet varchar(11) null,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    telefono tinyint(9) null,
    direccion varchar(150) null,
    correo_electronico varchar(60) null,
    token int(11)  null,
    id_tipo_usuario int(3) not null,
    id_carrera tinyint(3) not null,
    constraint fk_id_tipo_usuario foreign key(id_tipo_usuario)
    references tipo_usuario(id_usuario),
    constraint fk_id_carrera foreign key(id_carrera)
    references carrera(id_carrera)
);


-- insertando los datos basicos dentro de las tablas

INSERT INTO facultad VALUES
(1, 'Ciencias del hombre y la naturaleza'),
(2, 'Teologia y humanidades');

INSERT INTO tipo_usuario VALUES
(1, 'usuario'),
(2, 'operador'),
(3, 'administrador');

INSERT INTO carrera VALUES
(1, 'Lic. en Ciencias de la Computación', 1),
(2, 'Ing. Agroecologica', 1),
(3, 'Lic. en Ciencias Juridicas', 1),
(4, 'Lic. en contaduria publica', 1),
(5, 'Lic. en Administración de Empresas', 1),
(6, 'Tecnico en Desarrollo de Aplicaciones Informaticas', 1),
(7, 'Lic. en Trabajo Social', 2),
(8, 'Lic. en Teologia', 2);