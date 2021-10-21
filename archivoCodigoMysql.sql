CREATE DATABASE progfinal;
USE progfinal;

CREATE TABLE usuarios (
id INT NOT NULL AUTO_INCREMENT,
usuario varchar(45) NOT NULL,
contraseña varchar(255) NOT NULL,
nombre varchar(200) NOT NULL,
apellido varchar(200) NOT NULL,
nomPyme varchar (200) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY usuario (usuario)
)ENGINE=InnoDB;


CREATE TABLE empleados (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
idUsuarios INT NOT NULL,
edad DATE,
sueldo int(11) NOT NULL,
afiliadoSindicato varchar(20) NOT NULL,
nombreEmpleado varchar(55) NOT NULL,
numTel int(15) NOT NULL,
PRIMARY KEY (id),
CONSTRAINT users_ibfk_1 FOREIGN KEY (idUsuarios) REFERENCES usuarios (id)
)ENGINE=InnoDB;