-- NOTAS
-- Para ingresar o actualizar notas CONTINUAS Y/O PARCIALES DIRECTAMENTE para cada nota continua o parcial por alumno segun su (id)
-- OJO que esto no sería algo legítimo porque el sistema edita automáticamente estas notas con las notas de los trabajos
UPDATE notas 
SET continua_1=12.5, continua_2=15.6, continua_3=15, parcial_1=13, parcial_2=17,parcial_3=11.6
WHERE notas.id_est = 2;

-- Actualizar nota parcial de un alumno por su id
UPDATE notas 
SET notas.parcial_1=11
WHERE notas.id_est = 3;

-- Actualizar más de una nota parcial de un alumno por su id
UPDATE notas 
SET notas.parcial_1=11,notas.parcial_2=13,notas.parcial_3=15
WHERE notas.id_est = 3;

-- ----------------------------------😁😁----------------
-- Devolver la nota mayor de todas las notas finales:
SELECT id_est, MAX(nota_final) as "Nota mayor"
FROM notas;
-- ----------------------------------😁😁----------------

-- Instrucción para adquirir el id y nota mayor de todos, incluso si esta se repite
SELECT id_est, nota_final as "Máxima/máximas notas"
FROM notas
WHERE notas.nota_final=(SELECT MAX(notas.nota_final) FROM notas);

-- Instrucción para adquirir el id y nota mayor de todos, incluso si esta se repite
SELECT id_est, nota_final as "Mínima/minimas notas"
FROM notas
WHERE notas.nota_final=(SELECT MIN(notas.nota_final) FROM notas);


-- Actualizar NOTAS DE LOS TRABAJOS por estudiante(por id) en la tabla notas:
UPDATE notas
SET notas.trabajo_1_c1=10, notas.trabajo_2_c1=5, notas.trabajo_3_c1=10, notas.trabajo_4_c1=11, notas.trabajo_5_c1=15, notas.trabajo_6_c1=11, notas.trabajo_1_c2=18, notas.trabajo_2_c2=11, notas.trabajo_3_c2=14, notas.trabajo_4_c2=17, notas.trabajo_5_c2=7, notas.trabajo_6_c2=14, notas.trabajo_1_c3=16, notas.trabajo_2_c3=14, notas.trabajo_3_c3=12, notas.trabajo_4_c3=16, notas.trabajo_5_c3=12, notas.trabajo_6_c3=13
WHERE notas.id_est=20;


-- ----------------------------------😁😁----------------
-- Sacar la nota promedio final de todas las notas finales
SELECT AVG(nota_final) as "Nota promedio"
FROM notas;

SELECT AVG(continua_1) as "Nota Promedio de Continua 1"
FROM notas;

SELECT AVG(continua_2) as "Nota Promedio de Continua 2"
FROM notas;

SELECT AVG(continua_3) as "Nota Promedio de Continua 3"
FROM notas;

SELECT AVG(parcial_1) as "Nota Promedio de Parcial 1"
FROM notas;

SELECT AVG(parcial_2) as "Nota Promedio de Parcial 2"
FROM notas;

SELECT AVG(parcial_3) as "Nota Promedio de Parcial 3"
FROM notas;
-- ----------------------------------😁😁----------------

-- ----------------------------------😁😁----------------
-- Cuántos alumnos aprobaron?
SELECT COUNT(id_est) as "Cantidad de alumnos aprobados"
FROM notas
WHERE notas.nota_final>=10.5;
-- ----------------------------------😁😁----------------

-- ----------------------------------😁😁----------------
-- Cuántos alumnos desaprobaron?
SELECT COUNT(notas.id_est) as "Cantidad de alumnos desaprobados"
FROM notas
WHERE notas.nota_final<10.5;

-- ----------------------------------😁😁----------------

📃📃PENDIENTE-- Esta el alumno en peligro de jalar el curso?(a partir de primera y segunda nota (Notas finales?))




-- ------------------------ 😁😁😁 NOTAS CON OTRAS TABLAS de Comandos_varias_tablas.sql😁😁😁 ------------------------
-- Actualizar NOTA CONTINUA con notas de trabajos y su respectivo porcentaje
-- y también se realizará el cambio dependiendo del id_est
UPDATE notas
INNER JOIN cursos 
ON notas.id_est-- On nos indica el cuando funcionará o se fusionará las tablas
SET notas.continua_2=(cursos.porcentaje_trabajos*notas.trabajo_1_c2)+(cursos.porcentaje_trabajos*notas.trabajo_2_c2)+(cursos.porcentaje_trabajos*notas.trabajo_3_c2)+(cursos.porcentaje_trabajos*notas.trabajo_4_c2)+(cursos.porcentaje_trabajos*notas.trabajo_5_c2)+(cursos.porcentaje_trabajos*notas.trabajo_6_c2)
WHERE notas.id_est = 25;-- cambia de acuerdo al id del estudiante(id_est)

-- Sacando NOTA FINAL en el mismo SQL:
-- Para ingresar o actualizar nota final por alumno segun su id
UPDATE notas
INNER JOIN cursos 
ON notas.id_est -- Aquí es lo mismo decir que notas.id_est=true(siempre que exista exista). 
-- On nos indica el cuando funcionará o se fusionará las tablas
SET notas.nota_final=(cursos.porcentaje_c1*notas.continua_1)+(cursos.porcentaje_c2*notas.continua_2)+(cursos.porcentaje_c3*notas.continua_3)+(cursos.porcentaje_p1*notas.parcial_1)+(cursos.porcentaje_p2*notas.parcial_2)+(cursos.porcentaje_p3*notas.parcial_3)
WHERE notas.id_est = 2;-- cambia de acuerdo al id del estudiante(id_est)


-- Instrucción para adquirir el id, nombres y nota MAYOR de todos, incluso si esta se repite CON OTRA TABLA
SELECT notas.id_est, estudiantes.nombres_apellidos, notas.nota_final as "máxima/máximas notas"
FROM notas
INNER JOIN estudiantes
ON notas.id_est -- Mientras el id_est exista
WHERE notas.nota_final=(SELECT MAX(notas.nota_final) FROM notas) AND estudiantes.id_alumno=notas.id_est;


-- Instrucción para adquirir el id, nombres y nota MINIMA de todos, incluso si esta se repite CON OTRA TABLA
SELECT notas.id_est, estudiantes.nombres_apellidos, notas.nota_final as "minima/minimas notas"
FROM notas
INNER JOIN estudiantes
ON notas.id_est -- Mientras el id_est exista
WHERE notas.nota_final=(SELECT MIN(notas.nota_final) FROM notas) AND estudiantes.id_alumno=notas.id_est;


-- Notas de trabajos y a la vez se actualice la nota CONTINUA correspondiente
UPDATE notas
INNER JOIN cursos
ON notas.id_est -- Mientras exista id_est
SET trabajo_1_c2=12, trabajo_2_c2=18, trabajo_3_c2=20, trabajo_4_c2=15, trabajo_5_c2=16,trabajo_6_c2=17,
notas.continua_2=(cursos.porcentaje_trabajos*notas.trabajo_1_c2)+(cursos.porcentaje_trabajos*notas.trabajo_2_c2)+(cursos.porcentaje_trabajos*notas.trabajo_3_c2)+(cursos.porcentaje_trabajos*notas.trabajo_4_c2)+(cursos.porcentaje_trabajos*notas.trabajo_5_c2)+(cursos.porcentaje_trabajos*notas.trabajo_6_c2)
WHERE notas.id_est = 4;

------------------------------------------------------------------------