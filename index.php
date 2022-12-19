<?php
// include_once 'config/db.php';
include_once ("pages/controller_usuarios.php");
session_start();
// $conexionDB = BaseDatos::crearInstancia();
$conexionBDUsuarios = new Conexion();

$nombres = isset($_POST['nombresRe']) ? $_POST['nombresRe'] : '';
$apellidos = isset($_POST['apellidosRe']) ? $_POST['nombresRe'] : '';
$usuario = isset($_POST['usuarioRe']) ? $_POST['usuarioRe'] : '';
$password = isset($_POST['passwordRe']) ? $_POST['passwordRe'] : '';
$permiso = isset($_POST['permisoRe']) ? $_POST['permisoRe'] : '';

$listaDeUsuarios = $conexionBDUsuarios->getAllUsuarios();
// print_r($res);

if(isset($_POST['nombresRe'])){
  $conexionBDUsuarios->insertarNuevoUsuario($nombres,$apellidos,$usuario,$password,$permiso);
  $_SESSION['usuario'] = $usuario;
  $_SESSION['password'] = $password;
  $_SESSION['nombres'] = $nombres;
  $_SESSION['apellidos'] = $apellidos;
  $_SESSION['permiso'] = $permiso;
  //echo "<script>alert('Usuario Registrado');</script>";
  header('Location: pages/view_inicio.php');
}

if(isset($_POST['usuario'])){
  $mensaje = 'Usuario o clave incorrecta';
  // if($_POST['usuario']=='admin1' && $_POST['password']=='clave'){
  foreach($listaDeUsuarios as $user){
    if($_POST['usuario']==$user['usuario'] && $_POST['password']==$user['password']){
      $infoUsuario = $conexionBDUsuarios->getInfoUsuarioBy_usuario($_POST['usuario']);
      $_SESSION['usuario'] = $_POST['usuario'];
      $_SESSION['password'] = $_POST['password'];
      $_SESSION['nombres'] = $infoUsuario['nombres'];
      $_SESSION['apellidos'] = $infoUsuario['apellidos'];
      $_SESSION['permiso'] = $infoUsuario['permiso'];
      // echo "Login Correcto";
      header('Location: pages/view_inicio.php');
    }
  }
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css?4567">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Bienvenido a Student System</title>
  </head>

  <body>
    <div class="container-form sign-up">
      <div class="welcome-back">
        <div class="message">
          <h2 class="message-contraste">Bienvenido a Student System UNSA</h2>
          <p class="message-contraste">Si ya tiene una cuenta de docente inicie sesion aqui</p>
          <button class="sign-up-btn">Iniciar Sesion</button>
        </div>
      </div>
      <form class="formulario" method="post">
        <h2 class="create-account">Crear una cuenta</h2>
        <div class="iconos">
          <div class="border-icon">
            <i class='bx bxl-instagram'></i>
          </div>
          <div class="border-icon">
            <i class='bx bxl-facebook-circle'></i>
          </div>
        </div>
        <p class="cuenta-nueva">Crear una cuenta</p>
        <input class="input-form registro" type="text" name="nombresRe" id="nombresRe" placeholder="Nombres" required>
        <input class="input-form registro" type="text" name="apellidosRe" id="apellidosRe" placeholder="Apellidos" required>
        <input class="input-form registro" type="text" name="usuarioRe" id="usuarioRe" placeholder="Usuario" required>
        <input class="input-form registro" type="password" name="passwordRe" id="passwordRe" placeholder="Contraseña" required>
        <select name="permisoRe" id="permiso" class="selectCurso">
          <option value="">Elegir Asignatura...</option>
          <option value="1_docente">Trabajo Interdisciplinar I</option>
          <option value="2_docente">Ciencia De La Computacion</option>
          <option value="3_docente">Desarrollo Basado en Plataformas</option>
          <option value="4_docente">Arquitectura de Computadores</option>
        </select>
        <input clas="btn-register" id="btn-register" type="submit" value="Registrarse">
      </form>
    </div>

    <div class="container-form sign-in">
      <form class="formulario" method="post">
        <h2 class="create-account" id="iniciar_sesion">Iniciar Sesion</h2>
        <div class="iconos">
          <div class="border-icon">
            <i class='bx bxl-instagram'></i>
          </div>
          <div class="border-icon">
            <i class='bx bxl-facebook-circle'></i>
          </div>
        </div>
        <p class="cuenta-nueva">¿Aun no tienes una cuenta?</p>
        <input class="input-form" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
        <input class="input-form" type="password" name="password" id="password" placeholder="Contraseña" required>
        <?php 
            if(isset($mensaje)){
              echo "<script> alert('$mensaje'); </script>";
            }
          ?>
        <input type="submit" value="Iniciar Sesion">
      </form>
      <div class="welcome-back">
        <div class="message">
          <h2>Bienvenido de nuevo</h2>
          <p>Si aun no tiene una cuenta por favor registrese aqui</p>
          <button class="sign-in-btn">Registrarse</button>
        </div>
      </div>
    </div>
    <script src="js/login.js"></script>
  </body>

</html>