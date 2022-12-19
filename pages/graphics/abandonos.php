<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}
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
        $dia = $_POST["botonT"];
        //echo "<label id='dia' class='columna'>".$dia."</label>";
    }

    $conexionDB = BaseDatos::crearInstancia();

    $sql1="SELECT * FROM `estudiantes_1` WHERE totalP=0";
    $sql2="SELECT * FROM `estudiantes_1` WHERE totalF=0";

    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $abandonos = $consulta->fetchAll();

    $consulta2 = $conexionDB->prepare($sql2);
    $consulta2->execute();
    $presentes = $consulta2->fetchAll();

    $totalAsistentes = 0;
    $totalAbandonos = 0;
    $mixto = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/nav.css">
  <link rel="stylesheet" href="../../styles/asistencia.css">
  <link rel="stylesheet" href="../../styles/graficos.css">
  <link rel="stylesheet" href="../../styles/tablas.css">
  <title>Inicio</title>
</head>
<body>
  <div class="container">
    <!-- Seccion 1 Navegacion -->
    <div class="navigation">
      <ul>
      <li class="list">
          <a href="../view_inicio.php">
            <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
            <span class="title">Historical Student</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_inicio.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_estudiantes.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Estudiantes</span>
          </a>
        </li>
        <li class="list active">
          <a href="../view_asistencia.php">
            <span class="icon"><ion-icon name="laptop-outline"></ion-icon></ion-icon></span>
            <span class="title">Asistencia</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_cursos.php">
            <span class="icon"><ion-icon name="library-outline"></ion-icon></span>
            <span class="title">Cursos</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_ajustes.php">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
            <span class="title">Ajustes</span>
          </a>
        </li>
        <li class="list">
          <a href="../logic/cerrar_sesion.php">
            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
            <span class="title">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- Seccion 2 Principal -->
    <div class="main">
      <!-- Top Bar (Toggle Buscar y User) -->
      <div class="topbar">
        <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div>
        <!-- buscar -->
        <div class="search">
          <label for="">
            <input type="text" placeholder="Busque Aqui">
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>
        <!-- Imagen de usuario -->
        <div class="user-container">
          <span><?php echo $_SESSION['usuario']; ?></span>
          <div class="user">
            <img id="user" src="../../img/user.jpg">
          </div>
        </div>
      </div>
      <!-- cards -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

<section class="all">
<h1>Estadistica General</h1>

<h3>Asignatura: Trabajo Interdisciplinar <?php //echo $asignatura; ?></h3>

<form method="POST" action="../logic/DocAbandonos.php" name="form" id="form" target="_blank">
  <input type="hidden" name="base64" id="base64"/>
  <button class="btn_pdf" type="submit" id="sBtn">Descargar Registro</button>
</form>

<!-- <button class="btn_pdf"  ><a class="a_name" href="../logic/DocAbandonos.php" >Descargar Registro</a> </button> -->
  <div class="table-container-notas">
  <h2 class="centrar">Siempre Asistieron</h2>
  <table id="tablaUsuarios" class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($presentes as $estudiante){ 
              $totalAsistentes = $totalAsistentes + 1;
            ?>
            <td> <?php echo $estudiante['id_est']; ?> </td>
            <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>

    <?php } ?>
    </tbody>
</table>
<br><br>
<h2 class="centrar">Abandonos</h2>
<table class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($abandonos as $estudiante){ 
              $totalAbandonos = $totalAbandonos + 1;
            ?>
            <td> <?php echo $estudiante['id_est']; ?> </td>
            <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>
            <?php } ?>
    </tbody>  
  </table>
  </div>

  <?php
      $mixto = 40 - $totalAsistentes - $totalAbandonos;
  ?>

  <!--Recien empieza-->
  <br><br>
    <h2 class="centrar">Grafica</h2>

    <div class="graficos">
            <canvas id="canvas" width="130" height="80"></canvas>
            <!-- <canvas id="myChart" width="130" height="80"></canvas> -->
            <button onclick="Descargar()">Descargar</button>
    </div>

    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='../view_menu_Est_general.php'">Volver</button>
    </section>
    </body>

    <script>
// const ctx = document.getElementById('myChart').getContext('2d');
const ctx = document.getElementById('canvas').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Siempre Asistio','Abandono','Pre./Falt.'],
    datasets: [{
      label: 'Cantidad de Estudiantes',
      backgroundColor: [
        "rgb(0, 150, 254)",
        "rgb(150, 100, 50)",
        "rgb(255, 50, 254)"
      ],
      data: [<?php echo $totalAsistentes.",".$totalAbandonos.",".$mixto ?>],
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
        // const canvas = document.getElementById('myChart');
        imageLink.download = 'Abandono.png';
        imageLink.href = canvas.toDataURL('image/png');
        imageLink.click();

        console.log(imageLink);
    };
    </script>

<script>
  let boton = document.getElementById("sBtn");
  boton.addEventListener("click", function() {
    var ncanva = document.getElementById("canvas");
    var img = ncanva.toDataURL("image/png");
    document.getElementById('base64').value = img;

  });
</script>

</div>
  </div>
  <script src="../../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </html>


<!-- /* Including the view_asistencia_footer.php file. */ -->
<?php include('../../templates/view_asistencia_footer.php'); ?>

