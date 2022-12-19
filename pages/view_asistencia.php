<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css?31">
  <link rel="stylesheet" href="../styles/asistencia.css?16"> 
  <title>Inicio</title>
</head>
<body>
  <div class="container">
    <!-- Seccion 1 Navegacion -->
    <div class="navigation">
      <ul>
      <li class="list">
          <a href="view_inicio.php">
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
        <li class="list">
          <a href="view_estudiantes.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Estudiantes</span>
          </a>
        </li>
        <li class="list active">
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
        <a href="view_seleccionDia.php">
          <div class="card">
            <div>
              <div class="numbers">1</div>
              <div class="cardName">Tomar Asistencia del Dia</div>
            </div>
          </div>
        </a>
        <a href="view_VerAsistencia.php">
          <div class="card">
            <div>
              <div class="numbers">2</div>
              <div class="cardName">Ver registro de Asistencia</div>
            </div>
          </div>
        </a>
        <a href="view_menu_estadistica_dia.php">
          <div class="card">
            <div>
              <div class="numbers">3</div>
              <div class="cardName">Ver Registro y Estadistica Por Dia</div>
            </div>
          </div>
        </a>
        <a href="view_menu_estadistica_alumno.php">
          <div class="card">
            <div>
              <div class="numbers">4</div>
              <div class="cardName">Ver Estadisticas por Estudiante</div>
            </div>
          </div>
        </a>
        <a href="view_menu_Est_general.php">
          <div class="card">
            <div>
              <div class="numbers">5</div>
              <div class="cardName">Ver Estadisticas Generales</div>
            </div>
          </div>
        </a>
        <a href="view_cursos.php">
          <div class="card">
            <div>
              <div class="numbers">6</div>
              <div class="cardName">Mostrar Seccion de Cursos</div>
            </div>
          </div>
        </a>
        <a href="view_seleccionDia.php">
          <div class="card">
            <div>
              <div class="numbers">7</div>
              <div class="cardName">Mostrar seccion de notas del curso TI</div>
            </div>
          </div>
        </a>
        <a href="view_inicio.php">
          <div class="card">
            <div>
              <div class="numbers">8</div>
              <div class="cardName">Regresar al Menu de Inicio</div>
            </div>
          </div>
        </a>
      </div>
    </div>
  <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>