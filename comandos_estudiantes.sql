
-- En caso de querer dar los nombres de los estudiantes con PRESENTE el día 1
SELECT nombres_apellidos as "Estudiantes Presentes dia 1"
FROM `estudiantes`
WHERE dia_1='P';

-- En caso de querer dar el id de los estudiantes con PRESENTE el día 1

SELECT id_alumno as "ID Estudiantes Presentes dia 1"
FROM `estudiantes`
WHERE dia_1='P';
-- ponemos el id del alumno deseado(alumno en específico) que tenga presente en tal día(específico), en este caso día 1
SELECT nombres_apellidos
FROM `estudiantes`
WHERE dia_1='P' AND id_alumno=1;

-- ----------------------------------😁😁-------------
-- Para saber cuántos alumnos se tuvo al inicio
SELECT COUNT(id_alumno) as "Alumnos del semestre"
FROM estudiantes;
-- ----------------------------------😁😁-------------


-- ----------------------------------😁😁-------------

-- Para saber cuántos alumnos asistieron a TODAS LAS CLASES(Todo PRESENTE)
SELECT COUNT(id_alumno) as "Alumnos del semestre"
FROM `estudiantes`
WHERE dia_1='P' AND dia_2='P' AND dia_3='P' AND dia_4='P' AND dia_5='P' AND dia_6='P' AND dia_7='P' AND dia_8='P' AND dia_9='P' AND dia_10='P' AND dia_11='P' AND dia_12='P' AND dia_13='P' AND dia_14='P' AND dia_15='P' AND dia_16='P' AND dia_17='P' AND dia_18='P' AND dia_19='P' AND dia_20='P';

-- Para saber los ids's de los alumnos que asistieron durante el semestre(Todo PRESENTE)
SELECT id_alumno
FROM `estudiantes`
WHERE dia_1='P' AND dia_2='P' AND dia_3='P' AND dia_4='P' AND dia_5='P' AND dia_6='P' AND dia_7='P' AND dia_8='P' AND dia_9='P' AND dia_10='P' AND dia_11='P' AND dia_12='P' AND dia_13='P' AND dia_14='P' AND dia_15='P' AND dia_16='P' AND dia_17='P' AND dia_18='P' AND dia_19='P' AND dia_20='P';

-- ----------------------------------😁😁-------------

-- Para ingresar o actualizar asistencia de algún alumno, dependiendo del día y el id del alumno
UPDATE estudiantes SET dia_3 = 'P' WHERE estudiantes.id_alumno = 1;


-- Para ingresar o actualizar asistencia para cada día por alumno segun su id
UPDATE estudiantes 
SET dia_1='P', dia_2='P', dia_3='P', dia_4='P', dia_5='P',dia_6='P', dia_7='P' , dia_8='P' , dia_9='P' , dia_10='P' , dia_11='P' , dia_12='P' , dia_13='P' , dia_14='P' , dia_15='P' , dia_16='P' , dia_17='P' , dia_18='P' , dia_19='P' , dia_20='P'
WHERE id_alumno = 4;

-- ----------------------------------😁😁----------------
-- Para sacar la cantidad de columnas que tiene tu tabla
SELECT COUNT(*) as NumberofColumns 
FROM INFORMATION_SCHEMA.COLUMNS -- Comando especial
WHERE table_schema = 'historico_estudiantes_epcc' AND table_name = 'estudiantes';
-- Seleccionas el nombre de la base de datos y luego das el nombre de la tabla
-- ----------------------------------😁😁----------------


-- ----------------------------------😁😁-------------
-- Para saber cuántos abandonaron el curso(Todo FALTA)
SELECT COUNT(id_alumno) as "Cantidad de abandonos"
FROM `estudiantes`
WHERE dia_1='F' AND dia_2='F' AND dia_3='F' AND dia_4='F' AND dia_5='F' AND dia_6='F' AND dia_7='F' AND dia_8='F' AND dia_9='F' AND dia_10='F' AND dia_11='F' AND dia_12='F' AND dia_13='F' AND dia_14='F' AND dia_15='F' AND dia_16='F' AND dia_17='F' AND dia_18='F' AND dia_19='F' AND dia_20='F';


-- Para saber los ids's de los alumnos que abandonaron el curso(Todo FALTA)
SELECT id_alumno as "ID_abandonaron"
FROM `estudiantes`
WHERE dia_1='F' AND dia_2='F' AND dia_3='F' AND dia_4='F' AND dia_5='F' AND dia_6='F' AND dia_7='F' AND dia_8='F' AND dia_9='F' AND dia_10='F' AND dia_11='F' AND dia_12='F' AND dia_13='F' AND dia_14='F' AND dia_15='F' AND dia_16='F' AND dia_17='F' AND dia_18='F' AND dia_19='F' AND dia_20='F';
-- ----------------------------------😁😁----------------


-- ----------------------------------😁😁----------------
-- En caso de querer dar los nombres de los estudiantes con PRESENTE el día 1 (podemos cambiar el día)
SELECT id_alumno as "ID de estudiantes Presentes dia 1"
FROM estudiantes
WHERE dia_1='P';

-- En caso de querer dar la cantidad de estudiantes con PRESENTE el día 1 (podemos cambiar el día)
SELECT COUNT(id_alumno) as "Estudiantes Presentes dia 1"
FROM `estudiantes`
WHERE dia_1='P'

-- En caso de querer dar la cantidad de estudiantes con FALTA el día 1 (podemos cambiar el día)
SELECT COUNT(id_alumno) as "Estudiantes Presentes dia 1"
FROM `estudiantes`
WHERE dia_1='F'


-- Unir en una columna ficticia todos los datos de las columnas puestas:
-- (En este caso nos esta dando los P y F de absolutamente todos los estudiantes y de todos los días)
SELECT dia_1 columna_todo FROM estudiantes
UNION ALL
SELECT dia_2 columna_todo FROM estudiantes
UNION ALL
SELECT dia_3 columna_todo FROM estudiantes
UNION ALL
SELECT dia_4 columna_todo FROM estudiantes
UNION ALL
SELECT dia_5 columna_todo FROM estudiantes
UNION ALL
SELECT dia_6 columna_todo FROM estudiantes
UNION ALL
SELECT dia_7 columna_todo FROM estudiantes
UNION ALL
SELECT dia_8 columna_todo FROM estudiantes
UNION ALL
SELECT dia_9 columna_todo FROM estudiantes
UNION ALL
SELECT dia_10 columna_todo FROM estudiantes
UNION ALL
SELECT dia_11 columna_todo FROM estudiantes
UNION ALL
SELECT dia_12 columna_todo FROM estudiantes
UNION ALL
SELECT dia_13 columna_todo FROM estudiantes
UNION ALL
SELECT dia_14 columna_todo FROM estudiantes
UNION ALL
SELECT dia_15 columna_todo FROM estudiantes
UNION ALL
SELECT dia_16 columna_todo FROM estudiantes
UNION ALL
SELECT dia_17 columna_todo FROM estudiantes
UNION ALL
SELECT dia_18 columna_todo FROM estudiantes
UNION ALL
SELECT dia_19 columna_todo FROM estudiantes
UNION ALL
SELECT dia_20 columna_todo FROM estudiantes;


-- ----------------------------------😁😁----------------
-- Si deseas obtener cuántas faltas y presentes se tuvo en el SEMESTRE COMPLETO
SELECT asistencia_total, COUNT(asistencia_total) as "Faltas y Presentes en Total"
FROM
(
SELECT dia_1 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_2 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_3 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_4 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_5 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_6 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_7 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_8 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_9 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_10 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_11 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_12 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_13 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_14 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_15 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_16 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_17 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_18 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_19 asistencia_total FROM estudiantes
UNION ALL
SELECT dia_20 asistencia_total FROM estudiantes
) T
GROUP BY asistencia_total;

-- Cuando deseas obtener las faltas y presentes en total hasta el momento de cierto alumno por (id)
SELECT asistencia_total, COUNT(asistencia_total) as "Total F y P por id"
FROM
(
SELECT dia_1 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_2 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_3 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_4 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_5 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_6 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_7 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_8 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_9 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_10 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL 
SELECT dia_11 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_12 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_13 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_14 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_15 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_16 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_17 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL 
SELECT dia_18 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_19 asistencia_total FROM estudiantes WHERE id_alumno=7
UNION ALL
SELECT dia_20 asistencia_total FROM estudiantes WHERE id_alumno=7
) T
GROUP BY asistencia_total;
-- ------------------------------------------------

-- Te devuelve la asistencia total, cuántas faltas y presentes tiene el alumno por ID
SELECT asistencia_total, COUNT(asistencia_total) as "total faltas y presentes por id" 
FROM
(
SELECT dia_1 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_2 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_3 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_4 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_5 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_6 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_7 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_8 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_9 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_10 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_11 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_12 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_13 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_14 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_15 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_16 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_17 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_18 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_19 asistencia_total FROM estudiantes WHERE id_alumno=1
UNION ALL
SELECT dia_20 asistencia_total FROM estudiantes WHERE id_alumno=1
) T
GROUP BY asistencia_total;

-- ---------------------------------😁😁