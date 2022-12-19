<?php 
include('../templates/view_cursos_header.php'); 
// include_once '../config/db.php';
include("controller_notas.php");
print_r($_POST);
// print_r("-----------" . $_POST['trabajo_1c1']);
//$conexionDB = BaseDatos::crearInstancia();
$conexionBD = new Conexion();
$conexionBD->actualizarNotasByEstudiante($_POST["idCurso"], $_POST["idEst"], $_POST);
echo "<script>
        alert('Se guardaron los datos!!!');
</script>";

/*
$id = isset($_POST['id'])?$_POST['id']:'';
$tr1c1 = isset($_POST['trabajo_1c1']) ? $_POST['trabajo_1c1'] : '';
$tr2c1 = isset($_POST['trabajo_2c1']) ? $_POST['trabajo_2c1'] : '';
$tr3c1 = isset($_POST['trabajo_3c1']) ? $_POST['trabajo_3c1'] : '';
$tr4c1 = isset($_POST['trabajo_4c1']) ? $_POST['trabajo_4c1'] : '';
$tr5c1 = isset($_POST['trabajo_5c1']) ? $_POST['trabajo_5c1'] : '';
$tr6c1 = isset($_POST['trabajo_6c1']) ? $_POST['trabajo_6c1'] : '';
$parcial1 = isset($_POST['parcial_1']) ? $_POST['parcial_1'] : ''; 

$tr1c2 = isset($_POST['trabajo_1c2']) ? $_POST['trabajo_1c2'] : '';
$tr2c2 = isset($_POST['trabajo_2c2']) ? $_POST['trabajo_2c2'] : '';
$tr3c2 = isset($_POST['trabajo_3c2']) ? $_POST['trabajo_3c2'] : '';
$tr4c2 = isset($_POST['trabajo_4c2']) ? $_POST['trabajo_4c2'] : '';
$tr5c2 = isset($_POST['trabajo_5c2']) ? $_POST['trabajo_5c2'] : '';
$tr6c2 = isset($_POST['trabajo_6c2']) ? $_POST['trabajo_6c2'] : '';
$parcial2 = isset($_POST['parcial_2']) ? $_POST['parcial_2'] : ''; 

$tr1c3 = isset($_POST['trabajo_1c3']) ? $_POST['trabajo_1c3'] : '';
$tr2c3 = isset($_POST['trabajo_2c3']) ? $_POST['trabajo_2c3'] : '';
$tr3c3 = isset($_POST['trabajo_3c3']) ? $_POST['trabajo_3c3'] : '';
$tr4c3 = isset($_POST['trabajo_4c3']) ? $_POST['trabajo_4c3'] : '';
$tr5c3 = isset($_POST['trabajo_5c3']) ? $_POST['trabajo_5c3'] : '';
$tr6c3 = isset($_POST['trabajo_6c3']) ? $_POST['trabajo_6c3'] : '';
$parcial3 = isset($_POST['parcial_3']) ? $_POST['parcial_3'] : ''; 

*/

//$sql = "UPDATE `notas` 
//      SET continua_1=:c1, continua_2=:c2, continua_3=:c3, parcial_1=:p1, parcial_2=:p2,parcial_3=:p3
//      WHERE id_est=:id";
/*
$sql = "UPDATE notas
        INNER JOIN cursos
        ON notas.id_est
        SET trabajo_1_c1=:tr1c1, trabajo_2_c1=:tr2c1, trabajo_3_c1=:tr3c1, 
        trabajo_4_c1=:tr4c1, trabajo_5_c1=:tr5c1, trabajo_6_c1=:tr6c1,
        trabajo_1_c2=:tr1c2, trabajo_2_c2=:tr2c2, trabajo_3_c2=:tr3c2, 
        trabajo_4_c2=:tr4c2, trabajo_5_c2=:tr5c2, trabajo_6_c2=:tr6c2,
        trabajo_1_c3=:tr1c3, trabajo_2_c3=:tr2c3, trabajo_3_c3=:tr3c3, 
        trabajo_4_c3=:tr4c3, trabajo_5_c3=:tr5c3, trabajo_6_c3=:tr6c3,
        parcial_1=:parcial1, parcial_2=:parcial2, parcial_3=:parcial3,
        notas.continua_1=(cursos.porcentaje_trabajos*notas.trabajo_1_c1)+(cursos.porcentaje_trabajos*notas.trabajo_2_c1)+(cursos.porcentaje_trabajos*notas.trabajo_3_c1)+(cursos.porcentaje_trabajos*notas.trabajo_4_c1)+(cursos.porcentaje_trabajos*notas.trabajo_5_c1)+(cursos.porcentaje_trabajos*notas.trabajo_6_c1),
        notas.continua_2=(cursos.porcentaje_trabajos*notas.trabajo_1_c2)+(cursos.porcentaje_trabajos*notas.trabajo_2_c2)+(cursos.porcentaje_trabajos*notas.trabajo_3_c2)+(cursos.porcentaje_trabajos*notas.trabajo_4_c2)+(cursos.porcentaje_trabajos*notas.trabajo_5_c2)+(cursos.porcentaje_trabajos*notas.trabajo_6_c2),
        notas.continua_3=(cursos.porcentaje_trabajos*notas.trabajo_1_c3)+(cursos.porcentaje_trabajos*notas.trabajo_2_c3)+(cursos.porcentaje_trabajos*notas.trabajo_3_c3)+(cursos.porcentaje_trabajos*notas.trabajo_4_c3)+(cursos.porcentaje_trabajos*notas.trabajo_5_c3)+(cursos.porcentaje_trabajos*notas.trabajo_6_c3),
        notas.nota_final=(cursos.porcentaje_c1*notas.continua_1)+(cursos.porcentaje_c2*notas.continua_2)+(cursos.porcentaje_c3*notas.continua_3)+(cursos.porcentaje_p1*notas.parcial_1)+(cursos.porcentaje_p2*notas.parcial_2)+(cursos.porcentaje_p3*notas.parcial_3)
        WHERE notas.id_est=:id";

$consulta2 = $conexionDB->prepare($sql);
$consulta2->bindParam(':id',$id);
$consulta2->bindParam(':tr1c1',$tr1c1);
$consulta2->bindParam(':tr2c1',$tr2c1);
$consulta2->bindParam(':tr3c1',$tr3c1);
$consulta2->bindParam(':tr4c1',$tr4c1);
$consulta2->bindParam(':tr5c1',$tr5c1);
$consulta2->bindParam(':tr6c1',$tr6c1);
$consulta2->bindParam(':tr1c2',$tr1c2);
$consulta2->bindParam(':tr2c2',$tr2c2);
$consulta2->bindParam(':tr3c2',$tr3c2);
$consulta2->bindParam(':tr4c2',$tr4c2);
$consulta2->bindParam(':tr5c2',$tr5c2);
$consulta2->bindParam(':tr6c2',$tr6c2);
$consulta2->bindParam(':tr1c3',$tr1c3);
$consulta2->bindParam(':tr2c3',$tr2c3);
$consulta2->bindParam(':tr3c3',$tr3c3);
$consulta2->bindParam(':tr4c3',$tr4c3);
$consulta2->bindParam(':tr5c3',$tr5c3);
$consulta2->bindParam(':tr6c3',$tr6c3);
$consulta2->bindParam(':parcial1',$parcial1);
$consulta2->bindParam(':parcial2',$parcial2);
$consulta2->bindParam(':parcial3',$parcial3);
$consulta2->execute();
*/
?>

<?php include('../templates/view_asistencia_footer.php'); ?>