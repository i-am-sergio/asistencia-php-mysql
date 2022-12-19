<!-- /* Including the view_asistencia_header.php file. */ -->
<?php include('../../templates/view_asistencia_header_graficos.php'); ?>

<?php
    class BaseDatos{
        public static $instancia = null;
        public static function crearInstancia(){
          if(!isset(self::$instancia)){ //si la instancia tiene algo?
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=localhost;dbname=sistemaasistencia','root','',$opciones);
            echo "Conexion satisfactoria a la Base de Datos ...";
          }
          return self::$instancia;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["botonAlumno"];
        echo "<label id='id' class='columna'> ID del alumno: ".$id."</label>";
    }

    $conexionDB = BaseDatos::crearInstancia();


    $sql1="SELECT * FROM `estudiantes_1` WHERE id_est=$id";

    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $numpresentes = $consulta->fetchAll();
    ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <section class="all">

    <h1>Asistencias y Faltas por Alumno</h1>

    <h3>Asignatura: Trabajo Interdisciplinar<?php //echo $asignatura; ?></h3>
    <form action="../logic/DocAlumno.php" method="post">

    <form method="POST" action="../logic/DocAlumno.php" name="form" id="form" target="blank">
      <input type="hidden" name="base64" id="base64"/>
      <button class="btn_pdf" name="boton" type="submit" id="sBtn" value="<?php echo $id ?>">Descargar Registro</button>
    </form>

    <!--<button id="bboton1" name="boton" class="btn_pdf" type="submit" value="<?php echo $id ?>">Descargar Registro</button></form>-->
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
            <?php foreach($numpresentes as $estudiante){ ?>
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
  </div>

  <!--Recien empieza-->
  <br><br>
    <h2 class="centrar">Grafica</h2>


    <div class="graficos">
            <canvas id="canvas" width="130" height="80"></canvas>
            <button onclick="Descargar()">Download</button>
        </div>

    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='../view_menu_estadistica_alumno.php'">Volver</button>
    
</section>

    <script>
const ctx = document.getElementById('canvas').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Presentes','Faltas'],
    datasets: [{
      label: 'Total',
      backgroundColor: [
        "rgb(0, 150, 254)",
        "rgb(150, 100, 50)"      ],
      data: [<?php echo $estudiante['totalP'].",".$estudiante['totalF'] ?>],
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

function Descargar(){
        const imageLink = document.createElement('a');
        const canvas = document.getElementById('canvas');
        imageLink.download = 'est_alumno.png';
        imageLink.href = canvas.toDataURL('image/png');
        imageLink.click();

        console.log(imageLink);
    };
    </script>

        <script>
    sBtn.addEventListener("click", function() {
var ncanva = document.getElementById("canvas");
var img = ncanva.toDataURL("image/png");
 document.getElementById('base64').value = img;
});
</script>

    <!-- </html>

    </body>
    </html> -->

    <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
