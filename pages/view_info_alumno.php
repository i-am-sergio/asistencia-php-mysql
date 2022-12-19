<?php 
include('../templates/view_cursos_header.php');
include_once '../config/db.php'; 
?>

<?php 
$id = isset($_POST['id'])?$_POST['id']:'';
$conexionDB = BaseDatos::crearInstancia();
$notasEstudianteSelec = myquery($conexionDB,"SELECT * FROM notas WHERE id_est='$id'");
$datosPersonales = myquery($conexionDB,"SELECT nombres,apellidos FROM estudiantes WHERE id_est='$id'");

$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE nota_final<10.5");
$numDesap = $cantDesap[0]['CantDesaprobados'];
$porcentDesap = ($numDesap/40)*100;
// ---------------- Numero de Aprobados -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE nota_final>=10.5");
$numApr = $cantApr[0]['CantAprobados'];
$porcentApr = ($numApr/40)*100;

print_r($id);
// print_r($notasEstudianteSelec);

?>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<style>
  span.title{
    width: 100%;
    /* font-size: 25px; */
    /* text-align: center; */
  }

  .cuadritos span{
    background: #b60303;
    /* font-size: 18px; */
    width: 300px;
    color: #fff;
  }
</style>


<div>
  <div>
    <span class="title">DATOS DEL ESTUDIANTE</span>
    <div>
      <span>Nombres: </span>
      <span><?php echo $datosPersonales[0]['nombres']; ?></span>
    </div>
    <div>
      <span>Apellidos: </span>
      <span><?php echo $datosPersonales[0]['apellidos']; ?></span>
    </div>
    <span>Registro de Notas:</span>
    <div class="cuadritos">
      <span>Primera Fase</span>
      <span>Trabajo 1 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_1_c1']; ?></span><br>
      <span>Trabajo 2 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_2_c1']; ?></span><br>
      <span>Trabajo 3 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_3_c1']; ?></span><br>
      <span>Trabajo 4 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_4_c1']; ?></span><br>
      <span>Trabajo 5 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_5_c1']; ?></span><br>
      <span>Trabajo 6 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_6_c1']; ?></span><br>
      <span>Continua 1 </span>
      <span><?php echo $notasEstudianteSelec[0]['continua_1']; ?> </span><br>
      <span>Parcial 1 </span>
      <span><?php echo $notasEstudianteSelec[0]['parcial_1'] ?> </span><br>
    </div>
    <div class="cuadritos">
      <span>Segunda Fase</span>
      <span>Trabajo 1 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_1_c2']; ?></span><br>
      <span>Trabajo 2 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_2_c2']; ?></span><br>
      <span>Trabajo 3 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_3_c2']; ?></span><br>
      <span>Trabajo 4 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_4_c2']; ?></span><br>
      <span>Trabajo 5 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_5_c2']; ?></span><br>
      <span>Trabajo 6 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_6_c2']; ?></span><br>
      <span>Continua 2 </span>
      <span><?php echo $notasEstudianteSelec[0]['continua_2']; ?> </span><br>
      <span>Parcial 2 </span>
      <span><?php echo $notasEstudianteSelec[0]['parcial_2'] ?> </span><br>
    </div>
    <div class="cuadritos">
      <span>Tercera Fase</span>
      <span>Trabajo 1 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_1_c3']; ?></span><br>
      <span>Trabajo 2 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_2_c3']; ?></span><br>
      <span>Trabajo 3 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_3_c3']; ?></span><br>
      <span>Trabajo 4 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_4_c3']; ?></span><br>
      <span>Trabajo 5 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_5_c3']; ?></span><br>
      <span>Trabajo 6 </span>
      <span><?php echo $notasEstudianteSelec[0]['trabajo_6_c3']; ?></span><br>
      <span>Continua 3 </span>
      <span><?php echo $notasEstudianteSelec[0]['continua_3']; ?> </span><br>
      <span>Parcial 3 </span>
      <span><?php echo $notasEstudianteSelec[0]['parcial_3'] ?> </span><br>
    </div>
  </div>
  <div>
    <h2>Datos Asistencia</h2>


    





  </div>
</div>


<button class="btn-en-tabla" value="" onclick="location.href='view_notas.php'">Volver a tabla</button>

<?php include('../templates/view_asistencia_footer.php'); ?>