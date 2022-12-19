<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}

$permisoDocenteEsperado = $_POST['idCurso']."_docente";
if ($_SESSION['permiso'] == "administrador") { // Acceso para Administrador
  print_r("");
} else if ($_SESSION['permiso'] != $permisoDocenteEsperado){ // Acceso para Docente del curso que le corresponda
    header('Location: view_cursos.php');
}

?>

<?php
//include('logic/cursos.php');
include("controller_notas.php");

$nombreCurso = isset($_POST['botonCurso'])?$_POST['botonCurso']:'';
$idCurso = isset($_POST['idCurso']) ? $_POST['idCurso']:'';
//print_r($nombreCurso); print_r($_POST["idCurso"]);
// ----- Funciones de la Conexion -----
$conexionBD = new Conexion();

$estudiantes = $conexionBD->getEstudiantes($idCurso);
$totalEst = $conexionBD->getTotalEstudiantes($idCurso);


$numAprC1 = $conexionBD->numAprobados($idCurso,"continua_1");
$numDesaprC1 = $conexionBD->numDesaprobados($idCurso,"continua_1");
$numAprP1 = $conexionBD->numAprobados($idCurso,"parcial_1");
$numDesaprP1 = $conexionBD->numDesaprobados($idCurso,"parcial_1");
$numAprC2 = $conexionBD->numAprobados($idCurso,"continua_2");
$numDesaprC2 = $conexionBD->numDesaprobados($idCurso,"continua_2");
$numAprP2 = $conexionBD->numAprobados($idCurso,"parcial_2");
$numDesaprP2 = $conexionBD->numDesaprobados($idCurso,"parcial_2");
$numAprC3 = $conexionBD->numAprobados($idCurso,"continua_3");
$numDesaprC3 = $conexionBD->numDesaprobados($idCurso,"continua_3");
$numAprP3 = $conexionBD->numAprobados($idCurso,"parcial_3");
$numDesaprP3 = $conexionBD->numDesaprobados($idCurso,"parcial_3");

$numAprNotaFinal = $conexionBD->numAprobados($idCurso,"nota_final");
$numDesprNotaFinal = $conexionBD->numDesaprobados($idCurso,"nota_final");
$porcentApr = ($numAprNotaFinal/$totalEst)*100;
$porcentDesap = ($numDesprNotaFinal/$totalEst)*100;
$numAprc1 = $conexionBD->numAprobados($idCurso,"continua_1");
$numDesaprc1 = $conexionBD->numDesaprobados($idCurso,"continua_1");
//print_r($numAprc1."-"); print_r($numDesaprc1."-");
$promedioAula_notaContinua1 = $conexionBD->getPromedioNota($idCurso,"continua_1");
$promedioAula_notaParcial1 = $conexionBD->getPromedioNota($idCurso,"parcial_1");
$promedioAula_notaContinua2 = $conexionBD->getPromedioNota($idCurso,"continua_2");
$promedioAula_notaParcial2 = $conexionBD->getPromedioNota($idCurso,"parcial_2");
$promedioAula_notaContinua3 = $conexionBD->getPromedioNota($idCurso,"continua_3");
$promedioAula_notaParcial3 = $conexionBD->getPromedioNota($idCurso,"parcial_3");
$promedioAula_notaFinal = $conexionBD->getPromedioNota($idCurso,"nota_final");
$maxima_nota_c1 = $conexionBD->getMaximaNota($idCurso,"continua_1");
$minima_nota_c1 = $conexionBD->getMinimaNota($idCurso,"continua_1");
$maxima_nota_p1 = $conexionBD->getMaximaNota($idCurso,"parcial_1");
$minima_nota_p1 = $conexionBD->getMinimaNota($idCurso,"parcial_1");
$maxima_nota_c2 = $conexionBD->getMaximaNota($idCurso,"continua_2");
$minima_nota_c2 = $conexionBD->getMinimaNota($idCurso,"continua_2");
$maxima_nota_p2 = $conexionBD->getMaximaNota($idCurso,"parcial_2");
$minima_nota_p2 = $conexionBD->getMinimaNota($idCurso,"parcial_2");
$maxima_nota_c3 = $conexionBD->getMaximaNota($idCurso,"continua_3");
$minima_nota_c3 = $conexionBD->getMinimaNota($idCurso,"continua_3");
$maxima_nota_p3 = $conexionBD->getMaximaNota($idCurso,"parcial_3");
$minima_nota_p3 = $conexionBD->getMinimaNota($idCurso,"parcial_3");
$maxima_nota_info = $conexionBD->getMaximaNota($idCurso,"nota_final");
$min_nota_info = $conexionBD->getMinimaNota($idCurso,"nota_final");
$conexionBD->actualizarPeligro($idCurso,$totalEst);
$peligro = $conexionBD->getEstudiantesEnPeligro($idCurso);

$arrayTitulosNotas = array(
  1 => "Nota Parcial 1",
  2 => "Nota Continua 1",
  3 => "Nota Parcial 2",
  4 => "Nota Continua 2",
  5 => "Nota Parcial 3",
  6 => "Nota Continua 3",
  7 => "Nota Final"
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css">
  <!-- <link rel="stylesheet" href="../styles/asistencia.css"> -->
  <link rel="stylesheet" href="../styles/graficos.css">
  <!-- <link rel="stylesheet" href="../styles/tablas.css"> -->
  <link rel="stylesheet" href="../styles/notas.css?23156">
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
        <!-- <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div> -->
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
      <section class="all">
        <h2 class="titulo">Registro de notas</h2>
        <!-- botones -->
        <h3 class="titulo">ASIGNATURA: <?php echo $nombreCurso; ?></h3>
        
        <!-- <button class="btn_pdf"><a class="a_name" href="RegistroNotas.php" target="_blank" >Descargar Registro</a> </button> -->
        <!-- <a class="btn_pdf" href="RegistroNotas.php" target="_blank" >Descargar Registro</a> -->
        <div id="container-btnDescargar">
          <form id="btnDescargarRegistro" action="RegistroNotas.php" method="post" target="_blank" >
            <input type="hidden" name="nombreCurso" value="<?php echo $nombreCurso; ?>">
            <input type="hidden" name="idCurso" value="<?php echo $idCurso; ?>">

            <input type="hidden" name="base64_1" id="base64_1"/>
            <input type="hidden" name="base64_2" id="base64_2"/>
            <input type="hidden" name="base64_3" id="base64_3"/>
            <input type="hidden" name="base64_4" id="base64_4"/>
            <input type="hidden" name="base64_5" id="base64_5"/>
            <input type="hidden" name="base64_6" id="base64_6"/>
            <input type="hidden" name="base64_7" id="base64_7"/>

            <button id="btnDescargar" class="btns_a" type="submit">Descargar Registro</button>
          </form>
        </div>
        <div id="btns1" class="container_btns">
          <a class="btns_a" href="#f1" >Ver Primera Fase</a>
          <a class="btns_a" href="#f2" >Ver Segunda Fase</a>
          <a class="btns_a" href="#f3" >Ver Tercera Fase</a>
        </div>
        <div id="btns2" class="container_btns">
          <a class="btns_a" href="#finales">Ver Libreta De Notas del curso</a>
          <a class="btns_a" href="#estadisticas">Ver Estadisticas del curso</a>
        </div>
        <div id="btns3" class="container_btns">
          <a class="btns_a" href="#graf1">Ver grafico 1</a>
          <a class="btns_a" href="#graf2">Ver grafico 2</a>
          <a class="btns_a" href="#graf3">Ver grafico 3</a>
          <a class="btns_a" href="#graf4">Ver grafico 4</a>
          <a class="btns_a" href="#graf5">Ver grafico 5</a>
          <a class="btns_a" href="#graf6">Ver grafico 6</a>
          <a class="btns_a" href="#graf7">Ver grafico 7</a>
        </div>
        
        <br>
        
        <div cslass="table-container-notas">
          <h2 class="subtitulo" id="f1">Primera Fase</h2>
          <table id="tablaUsuarios1F" class="tabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Trabajo 1</th>
                <th>Trabajo 2</th>
                <th>Trabajo 3</th>
                <th>Trabajo 4</th>
                <th>Trabajo 5</th>
                <th>Trabajo 6</th>
                <th>Continua 1</th>
                <th>Parcial 1</th>
                <th>Operacion</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; ?>
              <?php foreach($estudiantes as $estudiante){ ?>
                <tr class="espacios-tabla">
                  <td> <?php echo $estudiante['id_est']; ?> </td>
                  <td> <?php echo $estudiante['apellidos']; ?> </td>
                  <td> <?php echo $estudiante['nombres']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_1_c1']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_2_c1']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_3_c1']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_4_c1']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_5_c1']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_6_c1']; ?> </td>
                  <td class="notaContinua"> <?php echo round($estudiante['continua_1']); ?> </td>
                  <td class="notaParcial"> <?php echo $estudiante['parcial_1']; ?> </td>
                  <td class="btns">
                    <form method="post" action="view_form_editar_alumno.php">
                      <input type="hidden" name="idEst" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="idCurso" value="<?php echo $idCurso; ?>">
                      <input type="hidden" name="nombrecurso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Editar</button>
                    </form>
                    <form method="post" action="view_info_alumno.php" >
                      <input type="hidden" name="id" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Ver</button>
                    </form>
                  </td>
                </tr>
              <?php 
                  $i++;
                } 
              ?>
            </tbody>  
          </table>
          <h2 class="subtitulo" id="f2">Segunda Fase</h2>
          <table id="tablaUsuarios2F" class="tabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Trabajo 1</th>
                <th>Trabajo 2</th>
                <th>Trabajo 3</th>
                <th>Trabajo 4</th>
                <th>Trabajo 5</th>
                <th>Trabajo 6</th>
                <th>Continua 2</th>
                <th>Parcial 2</th>
                <th>Operacion</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; ?>
              <?php foreach($estudiantes as $estudiante){ ?>
                <tr class="espacios-tabla">
                  <td> <?php echo $estudiante['id_est']; ?> </td>
                  <td> <?php echo $estudiante['apellidos']; ?> </td>
                  <td> <?php echo $estudiante['nombres']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_1_c2']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_2_c2']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_3_c2']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_4_c2']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_5_c2']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_6_c2']; ?> </td>
                  <td class="notaContinua"> <?php echo round($estudiante['continua_2']); ?> </td>
                  <td class="notaParcial"> <?php echo $estudiante['parcial_2']; ?> </td>
                  <td class="btns">
                    <form method="post" action="view_form_editar_alumno.php">
                      <input type="hidden" name="id" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Editar</button>
                    </form>
                    <form method="post" action="view_info_alumno.php" >
                      <input type="hidden" name="id" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Ver</button>
                    </form>
                  </td>
                </tr>
              <?php 
                  $i++;
                } 
              ?>
            </tbody>  
          </table>
          <h2 class="subtitulo" id="f3">Tercera Fase</h2>
          <table id="tablaUsuarios3F" class="tabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Trabajo 1</th>
                <th>Trabajo 2</th>
                <th>Trabajo 3</th>
                <th>Trabajo 4</th>
                <th>Trabajo 5</th>
                <th>Trabajo 6</th>
                <th>Continua 3</th>
                <th>Parcial 3</th>
                <th>Operacion</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; ?>
              <?php foreach($estudiantes as $estudiante){ ?>
                <tr class="espacios-tabla">
                  <td> <?php echo $estudiante['id_est']; ?> </td>
                  <td> <?php echo $estudiante['apellidos']; ?> </td>
                  <td> <?php echo $estudiante['nombres']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_1_c3']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_2_c3']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_3_c3']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_4_c3']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_5_c3']; ?> </td>
                  <td> <?php echo $estudiante['trabajo_6_c3']; ?> </td>
                  <td class="notaContinua"> <?php echo round($estudiante['continua_3']); ?> </td>
                  <td class="notaParcial"> <?php echo $estudiante['parcial_3']; ?> </td>
                  <td class="btns">
                    <form method="post" action="view_form_editar_alumno.php">
                      <input type="hidden" name="id" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Editar</button>
                    </form>
                    <form method="post" action="view_info_alumno.php" >
                      <input type="hidden" name="id" value="ver_<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="ver_<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Ver</button>
                    </form>
                  </td>
                </tr>
              <?php 
                  $i++;
                } 
              ?>
            </tbody>  
          </table>
          <h2 class="subtitulo" id="finales">Libreta de Notas</h2>
          <table id="tablaUsuariosNotasFinales" class="tabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Continua 1</th>
                <th>Parcial 1</th>
                <th>Continua 2</th>
                <th>Parcial 2</th>
                <th>Continua 3</th>
                <th>Parcial 3</th>
                <th class="esp_notaFinal" >Nota Final</th>
                <th>Operacion</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; ?>
              <?php foreach($estudiantes as $estudiante){ ?>
                <tr class="espacios-tabla">
                  <td> <?php echo $estudiante['id_est']; ?> </td>
                  <td> <?php echo $estudiante['apellidos']; ?> </td>
                  <td> <?php echo $estudiante['nombres']; ?> </td>
                  <td> <?php echo round($estudiante['continua_1'],2); ?> </td>
                  <td> <?php echo round($estudiante['parcial_1'],2); ?> </td>
                  <td> <?php echo round($estudiante['continua_2'],2); ?> </td>
                  <td> <?php echo round($estudiante['parcial_2'],2); ?> </td>
                  <td> <?php echo round($estudiante['continua_3'],2); ?> </td>
                  <td> <?php echo round($estudiante['parcial_3'],2); ?> </td>
                  <td class="esp_notaFinal"> <?php echo round($estudiante['nota_final'],2); ?> </td>
                  <td class="btns">
                    <form method="post" action="view_form_editar_alumno.php">
                      <input type="hidden" name="id" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Editar</button>
                    </form>
                    <form method="post" action="view_info_alumno.php" >
                      <input type="hidden" name="id" value="<?php echo $estudiante['id_est']; ?>">
                      <input type="hidden" name="curso" value="<?php echo $nombreCurso; ?>">
                      <button class="btn-en-tabla" type="submit">Ver</button>
                    </form>
                  </td>
                </tr>
              <?php 
                  $i++;
                } 
              ?>
            </tbody>  
          </table>
        </div>
        <br><br>
        <h3 id="estadisticas">Datos Generales del Curso</h3>
        <br>
        <div class="table-info-aula-ti">
        <table id="tablaUsuarios" class="tabla izq">
          <tbody>
            <tr>
              <td><b>Estudiantes Aprobados</b></td>
              <td> <?php echo $numAprNotaFinal; ?> </td>
              <td> <?php echo $porcentApr . "%"; ?> </td>
            </tr>
            <tr>
              <td><b>Estudiantes Desaprobados</b></td>
              <td> <?php echo $numDesprNotaFinal; ?> </td>
              <td> <?php echo $porcentDesap . "%"; ?> </td>
            </tr>
          </tbody>
        </table>
        <br><br>
        <table class="tabla izq">
          <thead>
            <tr>
              <th><b>Criterio</b></th>
              <th><b>Estudiante</b></th>
              <th><b>Nota</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mayor Nota Aprobatoria(Continua 1)</td>
              <td> <?php echo $maxima_nota_c1[0]["apellidos"].$maxima_nota_c1[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_c1[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Continua 1)</td>
              <td> <?php echo $minima_nota_c1[0]["apellidos"].$minima_nota_c1[0]['nombres']; ?> </td>
              <td> <?php echo round($minima_nota_c1[0]["minim"],2); ?> </td>
            </tr>
            <tr>
              <td>Mayor Nota Aprobatoria(Parcial 1)</td>
              <td> <?php echo $maxima_nota_p1[0]["apellidos"].$maxima_nota_p1[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_p1[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Parcial 1)</td>
              <td> <?php echo $minima_nota_p1[0]["apellidos"].$minima_nota_p1[0]['nombres']; ?> </td>
              <td> <?php echo round($minima_nota_p1[0]["minim"],2); ?> </td>
            </tr>
            <tr>
              <td>Mayor Nota Aprobatoria(Continua 2)</td>
              <td> <?php echo $maxima_nota_c2[0]["apellidos"].$maxima_nota_c3[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_c2[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Continua 2)</td>
              <td> <?php echo $minima_nota_c2[0]["apellidos"].$minima_nota_c2[0]['nombres']; ?> </td>
              <td> <?php echo round($minima_nota_c2[0]["minim"],2); ?> </td>
            </tr>
            <tr>
              <td>Mayor Nota Aprobatoria(Parcial 2)</td>
              <td> <?php echo $maxima_nota_p2[0]["apellidos"].$maxima_nota_p2[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_p2[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Parcial 2)</td>
              <td> <?php echo $minima_nota_p2[0]["apellidos"].$minima_nota_p2[0]['nombres']; ?> </td>
              <td> <?php echo round($minima_nota_p2[0]["minim"],2); ?> </td>
            </tr>
            <tr>
              <td>Mayor Nota Aprobatoria(Continua 3)</td>
              <td> <?php echo $maxima_nota_c3[0]["apellidos"].$maxima_nota_c3[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_c3[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Continua 3)</td>
              <td> <?php echo $minima_nota_c3[0]["apellidos"].$minima_nota_c3[0]['nombres']; ?> </td>
              <td> <?php echo round($minima_nota_c3[0]["minim"],2); ?> </td>
            </tr>
            <tr>
              <td>Mayor Nota Aprobatoria(Parcial 3)</td>
              <td> <?php echo $maxima_nota_p3[0]["apellidos"].$maxima_nota_p3[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_p3[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Parcial 3)</td>
              <td> <?php echo $minima_nota_p3[0]["apellidos"].$minima_nota_p3[0]['nombres']; ?> </td>
              <td> <?php echo round($minima_nota_p3[0]["minim"],2); ?> </td>
            </tr>
            <tr>
              <td>Mayor Nota Aprobatoria(Final)</td>
              <td> <?php echo $maxima_nota_info[0]["apellidos"].$maxima_nota_info[0]['nombres']; ?> </td>
              <td> <?php echo round($maxima_nota_info[0]["maxim"],2); ?> </td>
            </tr>
            <tr>
              <td>Menor Nota Aprobatoria(Final)</td>
              <td> <?php echo $min_nota_info[0]["apellidos"].$min_nota_info[0]['nombres']; ?> </td>
              <td> <?php echo round($min_nota_info[0]["minim"],2); ?> </td>
            </tr>
          </tbody>
        </table>
        <br><br>
        <table class="tabla izq">
          <thead>
            <th>Tipo de Promedio</th>
            <th>Nota del Aula</th>
          </thead>
          <tbody>
            <tr>
              <td>Promedio del Aula (Continua 1)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaContinua1,2); ?> </td>
            </tr>
            <tr>
              <td>Promedio del Aula (Parcial 1)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaParcial1,2); ?> </td>
            </tr>
            <tr>
              <td>Promedio del Aula (Continua 2)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaContinua2,2); ?> </td>
            </tr>
            <tr>
              <td>Promedio del Aula (Parcial 2)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaParcial2,2); ?> </td>
            </tr>
            <tr>
              <td>Promedio del Aula (Continua 3)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaContinua3,2); ?> </td>
            </tr>
            <tr>
              <td>Promedio del Aula (Parcial 3)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaParcial3,2); ?> </td>
            </tr>
            <tr>
              <td>Promedio del Aula (Final)</td>
              <td class="nota_td"> <?php echo round($promedioAula_notaFinal,2); ?> </td>
            </tr>
          </tbody>
        </table>
        <br><br>
        <h3 class="subtitulo">Estudiantes en peligro de desaprobar el curso (tomando como referencia notas de la primera fase)</h3>
        <table id="tablaUsuarios" class="tabla">
          <thead>
            <tr>
              <th>ID</th>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Continua 1</th>
              <th>Parcial 1</th>
              <th>Continua 2</th>
              <th>Parcial 2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($peligro as $estudiante){ ?>
              <td> <?php echo $estudiante['id_est']; ?> </td>
              <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
              <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
              <td class="names"> <?php echo round($estudiante['continua_1'],2); ?> </td>
              <td class="names"> <?php echo $estudiante['parcial_1']; ?> </td>
              <td class="names"> <?php echo round($estudiante['continua_2'],2); ?> </td>
              <td class="names"> <?php echo $estudiante['parcial_2']; ?> </td>
            </tr>
                <?php } ?>
          </tbody>
        </table>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="../js/graficos.js"></script>

        <?php for($i=1; $i<=7; $i++){ ?>
          <br><br>
          <div class="graficos">
            <h2 class="subtitulo" id="graf<?php echo $i; ?>">Grafica <?php echo $i; ?> : Aprobados y Desaprobados segun <?php echo $arrayTitulosNotas[$i]; ?></h2>
            <div class="graficos">
              <canvas id="myChart<?php echo $i; ?>" width="100" height="60"></canvas>
              <button onclick="Descargar('myChart<?php echo $i; ?>')">Download</button>
              <!-- <button href="myChart<?php echo $i; ?>.toDataURL('image/png');" download>Download</button> -->
            </div>
          </div>
          <br><br>
        <?php } ?>

        <br>
      
        <script>
          const ctx1 = document.getElementById('myChart1').getContext('2d');
          const ctx2 = document.getElementById('myChart2').getContext('2d');
          const ctx3 = document.getElementById('myChart3').getContext('2d');
          const ctx4 = document.getElementById('myChart4').getContext('2d');
          const ctx5 = document.getElementById('myChart5').getContext('2d');
          const ctx6 = document.getElementById('myChart6').getContext('2d');
          const ctx7 = document.getElementById('myChart7').getContext('2d');
          var myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(155, 40, 154)",
                  "rgb(150, 100, 50)"
                ],
                data: [<?php echo $numAprC1.",".$numDesaprC1; ?>],
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

          var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(60, 240, 154)",
                  "rgb(150, 100, 50)"
                ],
                data: [<?php echo $numAprP1.",".$numDesaprP1; ?>],
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

          var myChart3 = new Chart(ctx3, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(60, 190, 154)",
                  "rgb(0, 100, 50)"
                ],
                data: [<?php echo $numAprC2.",".$numDesaprC2; ?>],
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

          var myChart4 = new Chart(ctx4, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(100, 190, 30)",
                  "rgb(0, 100, 50)"
                ],
                data: [<?php echo $numAprP2.",".$numDesaprP2; ?>],
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

          var myChart5 = new Chart(ctx5, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(60, 122, 154)",
                  "rgb(15, 0, 180)"
                ],
                data: [<?php echo $numAprC3.",".$numDesaprC3; ?>],
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

          var myChart6 = new Chart(ctx6, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(60, 70, 45)",
                  "rgb(15, 0, 180)"
                ],
                data: [<?php echo $numAprP3.",".$numDesaprP3; ?>],
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
          ///////////////////////////////////////////////////
          
          var myChart7 = new Chart(ctx7, {
            type: 'pie',
            data: {
              labels: ['Aprobados', 'Desaprobados'],
              datasets: [{
                label: 'Cantidad de Estudiantes',
                backgroundColor: [
                  "rgb(200, 60, 0)",
                  "rgb(150, 100, 50)"
                ],
                data: [<?php echo $numAprNotaFinal.",".$numDesprNotaFinal; ?>],
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
        </script>
        <br><br>
      </section>

      
      <script>
        let boton = document.getElementById('btnDescargar');
        var ncanva1 = document.getElementById('myChart1');
        var ncanva2 = document.getElementById('myChart2');
        var ncanva3 = document.getElementById('myChart3');
        var ncanva4 = document.getElementById('myChart4');
        var ncanva5 = document.getElementById('myChart5');
        var ncanva6 = document.getElementById('myChart6');
        var ncanva7 = document.getElementById('myChart7');

        boton.addEventListener('click', function() {;
          var img1 = ncanva1.toDataURL('image/png');
          document.getElementById('base64_1').value = img1;

          var img2 = ncanva2.toDataURL('image/png');
          document.getElementById('base64_2').value = img2;

          var img3 = ncanva3.toDataURL('image/png');
          document.getElementById('base64_3').value = img3;

          var img4 = ncanva4.toDataURL('image/png');
          document.getElementById('base64_4').value = img4;

          var img5 = ncanva5.toDataURL('image/png');
          document.getElementById('base64_5').value = img5;

          var img6 = ncanva6.toDataURL('image/png');
          document.getElementById('base64_6').value = img6;

          var img7 = ncanva7.toDataURL('image/png');
          document.getElementById('base64_7').value = img7;
        })

      </script>

      


      <a href="#principio"><span class="iconarriba"><ion-icon id="botonArriba" name="arrow-up-circle-outline"></ion-icon></span></a>
      <script type="text/javascript" src="../js/botonArriba.js"></script>
    </div>
  </div>

  <script src="../js/nav.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
