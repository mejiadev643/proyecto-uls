-- creacion de la base de datos

CREATE DATABASE uls_2019 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE uls_2019;

-- creacion de la tabla facultad
CREATE TABLE facultad (
  id tinyint(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(70) NOT NULL
);
-- creacion de la tabla carrera

CREATE TABLE carrera (
  id_carrera tinyint(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(70) NOT NULL,
  id_facultad tinyint(3) NOT NULL,
  CONSTRAINT fk_id_facultad FOREIGN KEY(id_facultad)
  REFERENCES facultad(id)
);

-- creacion de la tabla tipo_publicacion

CREATE TABLE tipo_publicacion (
  id_publicacion tinyint(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(30) NOT NULL
);

-- creacion de la tabla publicacion

CREATE TABLE publicacion (
  id_publicacion int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titulo varchar(125) DEFAULT NULL,
  descripcion text,
  imagen text,
  tipo_publicacion tinyint(4) NOT NULL,
  carrera_public tinyint(3) NOT NULL,
  CONSTRAINT fk_tipo_publicacion FOREIGN KEY(tipo_publicacion)
  REFERENCES tipo_publicacion(id_publicacion),
  CONSTRAINT fk_carrera_publicacion FOREIGN KEY(carrera_public)
  REFERENCES carrera(id_carrera)
);

-- creacion de la tabla tipo_usuario

CREATE TABLE tipo_usuario (
  id_usuario int(3) NOT NULL PRIMARY KEY,
  tipo varchar(25) NOT NULL
);

-- creacion de la tabla usuario

CREATE TABLE usuario (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  carnet varchar(11) NOT NULL,
  nombre varchar(45) NOT NULL,
  apellido varchar(45) DEFAULT NULL,
  telefono int(9) DEFAULT NULL,
  direccion varchar(150) DEFAULT NULL,
  correo_electronico varchar(60) DEFAULT NULL,
  contrasena varchar(20) NOT NULL,
  foto varchar(250) DEFAULT NULL,
  token varchar(11) DEFAULT NULL,
  id_tipo_usuario int(3) NOT NULL,
  id_carrera tinyint(3) DEFAULT NULL,
   CONSTRAINT fk_id_tipo_usuario FOREIGN KEY(id_tipo_usuario)
    REFERENCES tipo_usuario(id_usuario),
   CONSTRAINT fk_carrera FOREIGN KEY(id_carrera)
    REFERENCES carrera(id_carrera)
);

-- agregados datos necesarios para su funcionamiento

-- datos para la tabla facultad

INSERT INTO facultad (id, nombre) VALUES
(1, 'Ciencias del hombre y la naturaleza'),
(2, 'Teologia y humanidades');

-- datos para la tabla carrera

INSERT INTO carrera (id_carrera, nombre, id_facultad) VALUES
(1, 'Lic. en Ciencias de la Computación', 1),
(2, 'Ing. Agroecologica', 1),
(3, 'Lic. en Ciencias Juridicas', 1),
(4, 'Lic. en contaduria publica', 1),
(5, 'Lic. en Administración de Empresas', 1),
(6, 'Tecnico en Desarrollo de Aplicaciones Informaticas', 1),
(7, 'Lic. en Trabajo Social', 2),
(8, 'Lic. en Teologia', 2);

-- datos para la tabla tipo_publicacion

INSERT INTO tipo_publicacion (id_publicacion, nombre) VALUES
(1, 'ofertas de empleo'),
(2, 'ofertas academicas');

-- datos para la tabla publicacion

-- datos para la tabla tipo_usuario

INSERT INTO tipo_usuario (id_usuario, tipo) VALUES
(1, 'egresado'),
(2, 'operador'),
(3, 'administrador');