<!-- /* Including the view_asistencia_header.php file. */ -->
<?php
// include('../templates/view_asistencia_header.php'); 
?>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css">
  <!-- <link rel="stylesheet" href="../styles/tablas.css"> -->
  <link rel="stylesheet" href="../styles/seleccionDia.css">
  <link rel="stylesheet" href="../styles/asistencia.css">
  <title>Inicio</title>
</head>

<body>
  <div class="container">
    <!-- Seccion 1 Navegacion -->
    <div class="navigation">
      <ul>
        <li class="list">
          <a href="view_inicio.php">
            <span class="icon">
              <ion-icon name="school-outline"></ion-icon>
            </span>
            <span class="title">Historical Student</span>
          </a>
        </li>
        <li class="list">
          <a href="view_inicio.php">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li class="list">
          <a href="view_estudiantes.php">
            <span class="icon">
              <ion-icon name="people-outline"></ion-icon>
            </span>
            <span class="title">Estudiantes</span>
          </a>
        </li>
        <li class="list active">
          <a href="view_asistencia.php">
            <span class="icon">
              <ion-icon name="laptop-outline"></ion-icon>
              </ion-icon>
            </span>
            <span class="title">Asistencia</span>
          </a>
        </li>
        <li class="list">
          <a href="view_cursos.php">
            <span class="icon">
              <ion-icon name="library-outline"></ion-icon>
            </span>
            <span class="title">Cursos</span>
          </a>
        </li>
        <li class="list">
          <a href="pages/view_notas.php">
            <span class="icon">
              <ion-icon name="pencil-outline"></ion-icon>
            </span>
            <span class="title">Notas</span>
          </a>
        </li>
        <li class="list">
          <a href="view_ajustes.php">
            <span class="icon">
              <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Ajustes</span>
          </a>
        </li>
        <li class="list">
          <a href="logic/cerrar_sesion.php">
            <span class="icon">
              <ion-icon name="log-out-outline"></ion-icon>
            </span>
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
      <div class="all">
        <h2>Seleccione la clase para tomar la asistencia:</h2>
        <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='view_asistencia.php'">Volver</button>
        <form action="view_tomar_asistencia.php" method="post">
          <button id="boton1" name="botonDia" class="btn_select" type="submit" value="dia_1">asistencia1</button>
          <button id="boton2" name="botonDia" class="btn_select" type="submit" value="dia_2">asistencia2</button>
          <button id="boton3" name="botonDia" class="btn_select" type="submit" value="dia_3">asistencia3</button>
          <button id="boton4" name="botonDia" class="btn_select" type="submit" value="dia_4">asistencia4</button>
          <button id="boton5" name="botonDia" class="btn_select" type="submit" value="dia_5">asistencia5</button>
          <button id="boton6" name="botonDia" class="btn_select" type="submit" value="dia_6">asistencia6</button>
          <button id="boton7" name="botonDia" class="btn_select" type="submit" value="dia_7">asistencia7</button>
          <button id="boton8" name="botonDia" class="btn_select" type="submit" value="dia_8">asistencia8</button>
          <button id="boton9" name="botonDia" class="btn_select" type="submit" value="dia_9">asistencia9</button>
          <button id="boton10" name="botonDia" class="btn_select" type="submit" value="dia_10">asistencia10</button>
          <button id="boton11" name="botonDia" class="btn_select" type="submit" value="dia_11">asistencia11</button>
          <button id="boton12" name="botonDia" class="btn_select" type="submit" value="dia_12">asistencia12</button>
          <button id="boton13" name="botonDia" class="btn_select" type="submit" value="dia_13">asistencia13</button>
          <button id="boton14" name="botonDia" class="btn_select" type="submit" value="dia_14">asistencia14</button>
          <button id="boton15" name="botonDia" class="btn_select" type="submit" value="dia_15">asistencia15</button>
          <button id="boton16" name="botonDia" class="btn_select" type="submit" value="dia_16">asistencia16</button>
          <button id="boton17" name="botonDia" class="btn_select" type="submit" value="dia_17">asistencia17</button>
          <button id="boton18" name="botonDia" class="btn_select" type="submit" value="dia_18">asistencia18</button>
          <button id="boton19" name="botonDia" class="btn_select" type="submit" value="dia_19">asistencia19</button>
          <button id="boton20" name="botonDia" class="btn_select" type="submit" value="dia_20">asistencia20</button>
        </form>
      </div>
    </div>
  </div>
  <script src="../js/nav.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>