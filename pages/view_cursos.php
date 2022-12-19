<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}
?>
<?php 
// include('logic/cursos.php'); 
include_once '../config/db.php';
$conexionDB = BaseDatos::crearInstancia();

$listaCursos = myquery($conexionDB,"SELECT id_curso,nombre_curso FROM cursos");

?>


<?php include("controller_notas.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css?33">
  <link rel="stylesheet" href="../styles/cursos.css?123">
  <link rel="stylesheet" href="../styles/boton.css">
  <title>Cursos</title>
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
        <li class="list">
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
        <li class="list active">
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
      <!-- cards cursos-->
      <div class="cardBox">
        <?php foreach($listaCursos as $curso){ ?> 
          <form class="form_seleccionCurso" action="view_notas.php" method="post">
            <div class="btnContainer">
              <input type="hidden" name="idCurso" value="<?php echo $curso['id_curso']; ?>">
              <button class="cardCurso" type="submit" name="botonCurso" value="<?php echo $curso['nombre_curso']; ?>">
                <div>
                  <div class="numbersCurso"><?php echo $curso['id_curso']; ?></div>
                  <div class="cardNameCurso"><?php echo $curso['nombre_curso']; ?></div>
                </div>
                <!-- <div class="iconBx">
                  <ion-icon name="people-outline"></ion-icon>
                </div> -->
              </button>
            </div>
          </form>
        <?php 
          } 
        ?>

      </div>
        <!-- boton -->
          <a href="#principio"><span class="iconarriba"><ion-icon id="botonArriba" name="arrow-up-circle-outline"></ion-icon></span></a>
          <script type="text/javascript" src="../js/botonArriba.js"></script>
        <!-- ----------- -->
  </div>
  
  <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
