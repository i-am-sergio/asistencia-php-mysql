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
  <link rel="stylesheet" href="../styles/tablas.css">
  <link rel="stylesheet" href="../styles/tomar_asistencia.css">
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
      <script type="text/javascript" src="../js/codigo.js"></script>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $dia = $_POST["botonDia"];
          //;
        }
      ?>
      <h2>ASISTENCIA (<?php echo "<label id='dia' class='columna'>" . $dia . "</label>"; ?> )</h2>
      <section id="contenido">
        
        <table id="tabla" class="tabla">
          <thead>
            <tr>
              <th>Estudiantes</th>
              <th>Condicion</th>
            </tr>
          </thead>
          <tbody class="formulario">
            <tr>
              <td class="NombreEstudiante"><b>Apaza Apaza Nelzon Jorge</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion1" value="P" id="Presente1">
                  <label for="Presente1"><b>Presente</b></label>
                  <input type="radio" name="condicion1" value="F" id="Falto1">
                  <label for="Falto1"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Apaza Quispe Angel Abraham</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion2" value="P" id="Presente2">
                  <label for="Presente2"><b>Presente</b></label>
                  <input type="radio" name="condicion2" value="F" id="Falto2">
                  <label for="Falto2"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Benavente Aguirre Paolo Daniel</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion3" value="P" id="Presente3">
                  <label for="Presente3"><b>Presente</b></label>
                  <input type="radio" name="condicion3" value="F" id="Falto3">
                  <label for="Falto3"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Cacsire Sanchez Jhosep Angel</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion4" value="P" id="Presente4">
                  <label for="Presente4"><b>Presente</b></label>
                  <input type="radio" name="condicion4" value="F" id="Falto4">
                  <label for="Falto4"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Carazas Quispe Alessander Jesus</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion5" value="P" id="Presente5">
                  <label for="Presente5"><b>Presente</b></label>
                  <input type="radio" name="condicion5" value="F" id="Falto5">
                  <label for="Falto5"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Castillo Sancho Sergio Ahmed</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion6" value="P" id="Presente6">
                  <label for="Presente6"><b>Presente</b></label>
                  <input type="radio" name="condicion6" value="F" id="Falto6">
                  <label for="Falto6"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Cayllahua Gutierrez Diego Yampier</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion7" value="P" id="Presente7">
                  <label for="Presente7"><b>Presente</b></label>
                  <input type="radio" name="condicion7" value="F" id="Falto7">
                  <label for="Falto7"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Ccama Marron Gustavo Alonso</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion8" value="P" id="Presente8">
                  <label for="Presente8"><b>Presente</b></label>
                  <input type="radio" name="condicion8" value="F" id="Falto8">
                  <label for="Falto8"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Cerpa Garcia Jean Franco</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion9" value="P" id="Presente9">
                  <label for="Presente9"><b>Presente</b></label>
                  <input type="radio" name="condicion9" value="F" id="Falto9">
                  <label for="Falto9"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Condori Casquino Ebert Luis</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion10" value="P" id="Presente10">
                  <label for="Presente10"><b>Presente</b></label>
                  <input type="radio" name="condicion10" value="F" id="Falto10">
                  <label for="Falto10"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Davis Coropuna Leon Felipe</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion11" value="P" id="Presente11">
                  <label for="Presente11"><b>Presente</b></label>
                  <input type="radio" name="condicion11" value="F" id="Falto11">
                  <label for="Falto11"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Escarza Pacori Alexander Raul</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion12" value="P" id="Presente12">
                  <label for="Presente12"><b>Presente</b></label>
                  <input type="radio" name="condicion12" value="F" id="Falto12">
                  <label for="Falto12"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Gonzales Condori Alejandro Javier</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion13" value="P" id="Presente13">
                  <label for="Presente13"><b>Presente</b></label>
                  <input type="radio" name="condicion13" value="F" id="Falto13">
                  <label for="Falto13"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Gutierrez Zevallos Jaime Jose</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion14" value="P" id="Presente14">
                  <label for="Presente14"><b>Presente</b></label>
                  <input type="radio" name="condicion14" value="F" id="Falto14">
                  <label for="Falto14"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Hualpa Lopez Jose Mauricio</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion15" value="P" id="Presente15">
                  <label for="Presente15"><b>Presente</b></label>
                  <input type="radio" name="condicion15" value="F" id="Falto15">
                  <label for="Falto15"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Huaman Coaquira Luciana Julissa</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion16" value="P" id="Presente16">
                  <label for="Presente16"><b>Presente</b></label>
                  <input type="radio" name="condicion16" value="F" id="Falto16">
                  <label for="Falto16"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Lazo Paxi Natalie Marleny</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion17" value="P" id="Presente17">
                  <label for="Presente17"><b>Presente</b></label>
                  <input type="radio" name="condicion17" value="F" id="Falto17">
                  <label for="Falto17"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Lopez Condori Andrea Del Rosario</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion18" value="P" id="Presente18">
                  <label for="Presente18"><b>Presente</b></label>
                  <input type="radio" name="condicion18" value="F" id="Falto18">
                  <label for="Falto18"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Lupo Condori Avelino</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion19" value="P" id="Presente19">
                  <label for="Presente19"><b>Presente</b></label>
                  <input type="radio" name="condicion19" value="F" id="Falto19">
                  <label for="Falto19"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Maldonado Casilla Braulio Nayap</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion20" value="P" id="Presente20">
                  <label for="Presente20"><b>Presente</b></label>
                  <input type="radio" name="condicion20" value="F" id="Falto20">
                  <label for="Falto20"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Maldonado Parejo Roy Abel</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion21" value="P" id="Presente21">
                  <label for="Presente21"><b>Presente</b></label>
                  <input type="radio" name="condicion21" value="F" id="Falto21">
                  <label for="Falto21"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Mariños Hilario Princce Yorwin</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion22" value="P" id="Presente22">
                  <label for="Presente22"><b>Presente</b></label>
                  <input type="radio" name="condicion22" value="F" id="Falto22">
                  <label for="Falto22"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Martinez Choque Aldo Raul</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion23" value="P" id="Presente23">
                  <label for="Presente23"><b>Presente</b></label>
                  <input type="radio" name="condicion23" value="F" id="Falto23">
                  <label for="Falto23"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Mayorga Villena Jharold Alonso</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion24" value="P" id="Presente24">
                  <label for="Presente24"><b>Presente</b></label>
                  <input type="radio" name="condicion24" value="F" id="Falto24">
                  <label for="Falto24"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Mena Quispe Sergio Sebastian Santos</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion25" value="P" id="Presente25">
                  <label for="Presente25"><b>Presente</b></label>
                  <input type="radio" name="condicion25" value="F" id="Falto25">
                  <label for="Falto25"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Mogollon Caceres Sergio Daniel</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion26" value="P" id="Presente26">
                  <label for="Presente26"><b>Presente</b></label>
                  <input type="radio" name="condicion26" value="F" id="Falto26">
                  <label for="Falto26"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Montoya Choque Leonardo</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion27" value="P" id="Presente27">
                  <label for="Presente27"><b>Presente</b></label>
                  <input type="radio" name="condicion27" value="F" id="Falto27">
                  <label for="Falto27"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Nizama Cespedes Juan Carlos Antonio</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion28" value="P" id="Presente28">
                  <label for="Presente28"><b>Presente</b></label>
                  <input type="radio" name="condicion28" value="F" id="Falto28">
                  <label for="Falto28"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Olazabal Chavez Neill Elverth</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion29" value="P" id="Presente29">
                  <label for="Presente29"><b>Presente</b></label>
                  <input type="radio" name="condicion29" value="F" id="Falto29">
                  <label for="Falto29"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Pardave Espinoza Christian</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion30" value="P" id="Presente30">
                  <label for="Presente30"><b>Presente</b></label>
                  <input type="radio" name="condicion30" value="F" id="Falto30">
                  <label for="Falto30"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Parizaca Mozo Paul Antony</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion31" value="P" id="Presente31">
                  <label for="Presente31"><b>Presente</b></label>
                  <input type="radio" name="condicion31" value="F" id="Falto31">
                  <label for="Falto31"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Quilca Huamani Bryan</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion32" value="P" id="Presente32">
                  <label for="Presente32"><b>Presente</b></label>
                  <input type="radio" name="condicion32" value="F" id="Falto32">
                  <label for="Falto32"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Quispe Rojas Javier Wilber</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion33" value="P" id="Presente33">
                  <label for="Presente33"><b>Presente</b></label>
                  <input type="radio" name="condicion33" value="F" id="Falto33">
                  <label for="Falto33"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Roque Sosa Owen Haziel</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion34" value="P" id="Presente34">
                  <label for="Presente34"><b>Presente</b></label>
                  <input type="radio" name="condicion34" value="F" id="Falto34">
                  <label for="Falto34"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Ruiz Mamani Eduardo German</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion35" value="P" id="Presente35">
                  <label for="Presente35"><b>Presente</b></label>
                  <input type="radio" name="condicion35" value="F" id="Falto35">
                  <label for="Falto35"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Sucasaca Chire Edward Henry</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion36" value="P" id="Presente36">
                  <label for="Presente36"><b>Presente</b></label>
                  <input type="radio" name="condicion36" value="F" id="Falto36">
                  <label for="Falto36"><b>Falto</b></label>
                </div>
              </td>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Taya Yana Samuel Omar</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion37" value="P" id="Presente37">
                  <label for="Presente37"><b>Presente</b></label>
                  <input type="radio" name="condicion37" value="F" id="Falto37">
                  <label for="Falto37"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Yavar Guillen Roberto Gustavo</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion38" value="P" id="Presente38">
                  <label for="Presente38"><b>Presente</b></label>
                  <input type="radio" name="condicion38" value="F" id="Falto38">
                  <label for="Falto38"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Zamalloa Molina Sebastian Agenor</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion39" value="P" id="Presente39">
                  <label for="Presente39"><b>Presente</b></label>
                  <input type="radio" name="condicion39" value="F" id="Falto39">
                  <label for="Falto39"><b>Falto</b></label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="NombreEstudiante"><b>Zhong Callasi Linghai Joaquin</b></td>
              <td>
                <div class="radio">
                  <input type="radio" name="condicion40" value="P" id="Presente40">
                  <label for="Presente40"><b>Presente</b></label>
                  <input type="radio" name="condicion40" value="F" id="Falto40">
                  <label for="Falto40"><b>Falto</b></label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="btn">
          <button id="boton2" class="btn_asist" type="button" onclick="location.href='view_asistencia.php'">ENVIAR ASISTENCIA</button>
          <br>
          <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='view_seleccionDia.php'">Volver a seleccionar Dia</button>
        </div>
      </section>
    </div>
  </div>
  <script src="../js/nav.js"></script>
  <script src="../js/codigo.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
