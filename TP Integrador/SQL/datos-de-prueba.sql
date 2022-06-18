insert into usuarios(nombre, apellido, dni, usuario, clave, email, legajo)
values('Alejo', 'Cuello', 40000000, 'alejo@gmail.com', '1234', 'alejo@gmail.com', '40000');

insert into alumnos (idUsuario) values (1);

insert into usuarios(nombre, apellido, dni, usuario, clave, email, legajo)
values('Daniela', 'Diaz', 30000000, 'daniela@gmail.com', '1234', 'daniela@gmail.com', '10000');

insert into profesores (idUsuario) values (2);

insert into usuarios(nombre, apellido, dni, usuario, clave, email, legajo)
values('Administrador', 'Perez', 20000000, 'administrador@gmail.com', '1234', 'administrador@gmail.com', '5000');

insert into administradores (idUsuario) values (3);

insert into materias(nombre, carrera, plan) values ('Arquitectura de la Informacion', 'ISI', '2008');
insert into materias(nombre, carrera, plan) values ('Gestión de Datos', 'ISI', '2008');
insert into materias(nombre, carrera, plan) values ('Química Inorgánica', 'IQ', '2008');

insert into profesores_materias(idProfesor, idMateria) values (2, 1);

insert into alumnos_materias(idAlumno, idMateria, estado) values (1, 1, 'A');

insert into cursos(idProfesorMateria, idAlumnoMateria) values(1, 1);

insert into horarios(idCurso, horaInicio, horaFin, dia) values (1, '10:00', '11:00', 'LUNES');
insert into horarios(idCurso, horaInicio, horaFin, dia) values (1, '11:00', '12:00', 'MARTES');

insert into consultas(idProfesorMateria, cupo, esVirtual, horaInicio, horaFin, dia, lugar) values (1, 2, 0, '10:00', '11:00', 'MIERCOLES', 'AULA 101');

insert into inscripciones_consultas(idAlumno, idConsulta, fechaHora) values (1, 1, '12-12-12 11:00');