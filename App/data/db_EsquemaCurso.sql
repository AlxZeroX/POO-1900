/*
	================================
	Este archivo define la tabla Personas e inserta algunos datos para trabajar
	================================
*/
CREATE TABLE Cursos(
    nombre varchar(20) NOT NULL,
    listaInstructores varchar(20) NOT NULL,
	listaAlumnos varchar(20) NOT NULL,
    Duracion varchar(5) NOT NULL
);


CREATE TABLE CursoPresencial
(   tipoCurso    CHAR(3)
) INHERITS (Cursos); -- Aquí esta la herencia

CREATE TABLE CursoSemiPresencial
(   tipoCurso    CHAR(3)
) INHERITS (Cursos); -- Aquí esta la herencia

CREATE TABLE CursoOnline
(   tipoCurso    CHAR(3)
) INHERITS (Cursos); -- Aquí esta la herencia


insert into CursoPresencial
(nombre, listaInstructores, listaAlumnos, Duracion, tipoCurso)
values
('Computacion', 'Instructores', 'Alumnos', '5', 'PRE'),
('RETRO', 'Instructores', 'Alumnos', '4', 'PRE');


insert into CursoSemiPresencial
(nombre, listaInstructores, listaAlumnos, Duracion, tipoCurso)
values
('ARTE', 'Instructores', 'Alumnos', '3', 'SEM'),
('CAMPUS', 'Instructores', 'Alumnos', '1', 'SEM');


insert into CursoOnline
(nombre, listaInstructores, listaAlumnos, Duracion, tipoCurso)
values
('SOCIO', 'Instructores', 'Alumnos', '6', 'ONL');



