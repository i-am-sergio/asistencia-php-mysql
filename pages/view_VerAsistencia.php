<?php 
include('../templates/view_asistencia_header.php');
include_once '../config/db.php';
$conexionDB = BaseDatos::crearInstancia();?>

<?php
//------------------- lista de estudaintes y sus notas ---------------
$sql = "SELECT * FROM estudiantes_1";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDeEstudiantes = $consulta->fetchAll();
//------------------- lista de estudaintes y sus notas ---------------ojoooooooo
$sql = "SELECT * FROM estadistica_diaria";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDecondiciones = $consulta->fetchAll();
?>
<section class="all">
<h1>Tabla de Asistencia</h1>

<h3>Asignatura: Trabajo Interdisciplinar<?php //echo $asignatura; ?></h3>
<button class="btn_pdf"><a class=a_name href="../pages/logic/registroAsistencia.php" target="_blank">Descargar Registro</a> </button>
  <div class="table-container-notas">
  <table id="tablaUsuarios" class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Dia 1</th>
        <th>Dia 2</th>
        <th>Dia 3</th>
        <th>Dia 4</th>
        <th>Dia 5</th>
        <th>Dia 6</th>
        <th>Dia 7</th>
        <th>Dia 8</th>
        <th>Dia 9</th>
        <th>Dia 10</th>
        <th>Dia 11</th>
        <th>Dia 12</th>
        <th>Dia 13</th>
        <th>Dia 14</th>
        <th>Dia 15</th>
        <th>Dia 16</th>
        <th>Dia 17</th>
        <th>Dia 18</th>
        <th>Dia 19</th>
        <th>Dia 20</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($listaDeEstudiantes as $estudiante){ ?>
            <td> <?php echo $estudiante['id_est']; ?> </td>
            <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
            <?php 
            for($i = 1; $i<=20; $i++){
                echo "<td>".$estudiante["dia_$i"]."</td>";  
            }
            ?>
            
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>

    <?php } ?>

    </tbody>
</table>    
<br><br>
<table class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Condicion</th>
        <th>Dia 1</th>
        <th>Dia 2</th>
        <th>Dia 3</th>
        <th>Dia 4</th>
        <th>Dia 5</th>
        <th>Dia 6</th>
        <th>Dia 7</th>
        <th>Dia 8</th>
        <th>Dia 9</th>
        <th>Dia 10</th>
        <th>Dia 11</th>
        <th>Dia 12</th>
        <th>Dia 13</th>
        <th>Dia 14</th>
        <th>Dia 15</th>
        <th>Dia 16</th>
        <th>Dia 17</th>
        <th>Dia 18</th>
        <th>Dia 19</th>
        <th>Dia 20</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody class="asdtabla">
      <?php foreach($listaDecondiciones as $estudiante){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $estudiante['id']; ?> </td>
          <td> <?php echo $estudiante['condicion']; ?> </td>
          <?php 
            for($i = 1; $i<=20; $i++){
                echo "<td>".$estudiante["dia_$i"]."</td>";  
            }
          ?>
          <td> <?php echo $estudiante['Total']; ?> </td>
          
        </tr>
      <?php 
        } 
      ?>
    </tbody>  
  </table>
  </div>
  <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='view_asistencia.php'">Volver</button>

</section>


</div>
  </div>
  <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>