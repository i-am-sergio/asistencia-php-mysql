<!-- /* Including the view_asistencia_header.php file. */ -->
<?php include('../../templates/view_asistencia_header_graficos.php'); ?>

<?php
    class BaseDatos{
        public static $instancia = null;
        public static function crearInstancia(){
          if(!isset(self::$instancia)){ //si la instancia tiene algo?
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=localhost;dbname=sistemaasistencia','root','',$opciones);
            //echo "Conexion satisfactoria a la Base de Datos ...";
          }
          return self::$instancia;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dia = $_POST["botonTotal"];
        //echo "<label id='dia' class='columna'>".$dia."</label>";
    }

    $conexionDB = BaseDatos::crearInstancia();


    $sql1="SELECT Total as 'presentes' FROM `estadistica_diaria` WHERE id=1";
    $sql2="SELECT Total as 'faltantes' FROM `estadistica_diaria` WHERE id=2";

    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $numpresentes = $consulta->fetchAll();
    // print_r($numpresentes);
    $dato=$numpresentes[0]['presentes'];
    // print_r($dato);

    $consulta2 = $conexionDB->prepare($sql2);
    $consulta2->execute();
    $numfaltantes = $consulta2->fetchAll();
    $dato2=$numfaltantes[0]['faltantes'];
    // print_r($dato2);

    $sql = "SELECT * FROM estadistica_diaria";
    $consulta = $conexionDB->prepare($sql);
    $consulta->execute();
    $columnas = $consulta->fetchAll();
    ?>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <section class="all">
    <h2>Total de Asistencias/Faltas del semestre</h2>
    <h3>Asignatura: Trabajo Interdisciplinar <?php //echo $asignatura; ?></h3>

    <form method="POST" action="../logic/DocTotal.php" name="form" id="form">
      <input type="hidden" name="base64" id="base64"/>
      <button class="btn_pdf" name="boton" type="submit" id="sBtn">Descargar Registro</button>
    </form>

    <!--<button class="btn_pdf"><a class="a_name" href="../logic/DocTotal.php" >Descargar Registro</a> </button>-->
  <div class="table-container-notas">
  <table id="tablaUsuarios" class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Condicion</th>
        <?php echo "<th>".$dia."</th>";?>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
      <?php foreach($columnas as $columna){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $columna['id']; ?> </td>
          <td class="names"> <?php echo $columna['condicion']; ?> </td>
          <?php 
            echo "<td>".$columna[$dia]."</td>";  
          ?>
          
        </tr>
      <?php 
        } 
      ?>

    </tbody>
</table>
</div>
    <!--Recien empieza-->
    <br><br>
    <h2 class="centrar">Grafica</h2>
    <div class="graficos">
            <canvas id="canvas" width="130" height="80"></canvas>
            <button onclick="Descargar()">Descargar</button>
        </div>
    </body>
    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='../view_menu_Est_general.php'">Volver</button>
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
      data: [<?php echo $dato.",".$dato2 ?>],
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
        imageLink.download = 'Total.png';
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
</html>



