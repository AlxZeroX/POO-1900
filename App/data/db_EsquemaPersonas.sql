/*
	================================
	Este archivo define la tabla Personas e inserta algunos datos para trabajar
	================================
*/
CREATE TABLE Personas(
    id serial primary key not null,
	nombre varchar(20) NOT NULL,
    apellido varchar(20) NOT NULL,
	edad smallint NOT NULL,
    pais varchar(15) NOT NULL,
    correo varchar(40) NOT NULL,
    contra varchar(30) NOT NULL
);


CREATE TABLE Administrador
(   tipoPersona    CHAR(3)
) INHERITS (Personas); -- Aquí esta la herencia

CREATE TABLE Instructor
(   tipoPersona    CHAR(3),
    especializacion varchar(20) NOT NULL,
    cursoAsignado varchar(20) NOT NULL,
    areaDeTrabajo varchar(10) NOT NULL
) INHERITS (Personas); -- Aquí esta la herencia

CREATE TABLE Alumno
(   tipoPersona    CHAR(3),
    tipoPago    CHAR(1),
    cursoAsignado varchar(20) NOT NULL
) INHERITS (Personas); -- Aquí esta la herencia


insert into Administrador
(nombre, apellido, edad, pais, correo, contra, tipoPersona)
values
('Carlos', 'Gomez', 20, 'Peru', 'correo3@gmail.com', '1234', 'ADM'),
('Pablo', 'Ramirez', 19, 'Japon', 'correo4@gmail.com', '1234', 'ADM');

insert into Instructor
(nombre, apellido, edad, pais, correo, contra, tipoPersona, especializacion, cursoAsignado, areaDeTrabajo)
values
('Maria', 'Mendoza', 30, 'Mexico', 'correo1@gmail.com', '1234', 'INS', 'INFORMATICA', 'TECHNO', 'F1');

insert into Alumno
(nombre, apellido, edad, pais, correo, contra, tipoPersona, tipoPago, cursoAsignado)
values
('Paco', 'Corrales', 30, 'España', 'correo2@gmail.com', '1234', 'ALU', 'E', 'TECHNO');





