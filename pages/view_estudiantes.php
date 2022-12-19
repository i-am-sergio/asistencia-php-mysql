
<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}
?>
<?php 
include('logic/estudiantes.php'); //por borrar
include_once("datosCardBox.php");
include_once("controller_estudiantes.php");

$conexionBDEstudiantes = new Conexion();
$estudiantesEpcc = $conexionBDEstudiantes->getAllEstudiantesEpcc();

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css?123">
  <link rel="stylesheet" href="../styles/estudiantes.css?456">
  <link rel="stylesheet" href="../styles/boton.css">
  <title>Inicio</title>
</head>
<body>
  <p id="principio"></p>
  <div class="container">
    <!-- Seccion 1 Navegacion -->
    <div class="navigation">
      <ul>
      <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
            <span class="title">Historical Student</span>
          </a>
        </li>
        <li class="list">
          <a href="view_inicio.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li class="list active">
          <a href="view_estudiantes.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Estudiantes</span>
          </a>
        </li>
        <li class="list">
          <a href="view_asistencia.php">
            <span class="icon"><ion-icon name="laptop-outline"></ion-icon></ion-icon></span>
            <span class="title">Asistencia</span>
          </a>
        </li>
        <li class="list">
          <a href="view_cursos.php">
            <span class="icon"><ion-icon name="library-outline"></ion-icon></span>
            <span class="title">Cursos</span>
          </a>
        </li>
        <li class="list">
          <a href="view_ajustes.php">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
            <span class="title">Ajustes</span>
          </a>
        </li>
        <li class="list">
          <a href="logic/cerrar_sesion.php">
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
            <img id="user" src="../img/user.jpg">
          </div>
        </div>
      </div>
      <!-- cards -->
      <div class="cardBox">
        <div class="card">
          <div>
            <div class="numbers"><?php echo $numEstudiantes; ?></div>
            <div class="cardName">Estudiantes</div>
          </div>
          <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
          </div>
        </div>
        <div class="card">
          <div>
            <div class="numbers"><?php echo $numCursos; ?></div>
            <div class="cardName">Asignaturas</div>
          </div>
          <div class="iconBx">
            <ion-icon name="book-outline"></ion-icon>
          </div>
        </div>
        <div class="card">
          <div>
            <div class="numbers"><?php echo $numUsuarios; ?></div>
            <div class="cardName">Usuarios</div>
          </div>
          <div class="iconBx">
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>
        </div>
        <div class="card">
          <div>
            <div class="numbers"><?php echo date('jS'); ?></div>
            <div class="cardName"><?php echo date('l F Y'); ?></div>
          </div>
          <div class="iconBx">
            <ion-icon name="calendar-outline"></ion-icon>
          </div>
        </div>
      </div>

      <div class="container_tabla">
        <table id="tablaEstudiantes" class="tabla-estudiantes">
          <thead>
            <tr>
              <th>ID</th>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Semestre</th>
              <th>Informacion</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($estudiantesEpcc as $estudiante){ ?>
              <tr class="espacios-tabla">
                <td class="id"> <?php echo $estudiante['id_epcc']; ?> </td>
                <td class="apellidos"> <?php echo $estudiante['apellidos_epcc']; ?> </td>
                <td class="nombres"> <?php echo $estudiante['nombres_epcc']; ?> </td>
                <td class="semestre"> <?php echo $estudiante['semestre_epcc']; ?>  </td>
                <td class="btns">
                  <form method="post" action="view_info_general_est.php" >
                    <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id_epcc']; ?>">
                    <button class="btn-en-tabla" type="submit">Ver</button>
                  </form>
                </td>
              </tr>
            <?php 
              } 
            ?>
          </tbody>  
        </table>
      </div>

      
      <!-- boton -->
      <a href="#principio"><span class="iconarriba"><ion-icon id="botonArriba" name="arrow-up-circle-outline"></ion-icon></span></a>
      <script type="text/javascript" src="../js/botonArriba.js"></script>
      <!-- ----------- -->
    </div>
  </div>
  
  <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>