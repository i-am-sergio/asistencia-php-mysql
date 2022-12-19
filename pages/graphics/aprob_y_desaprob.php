<!-- /* Including the view_asistencia_header.php file. */ -->
<?php 

include('../../templates/view_asistencia_header_graficos.php'); 
include_once '../../config/db.php';

?>

<?php

$conexionDB = BaseDatos::crearInstancia();
// ---------------- Numero de Desaprobados -------------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE nota_final<10.5");
$numDesap = $cantDesap[0]['CantDesaprobados'];
$porcentDesap = ($numDesap/40)*100;
// ---------------- Numero de Aprobados -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE nota_final>=10.5");
$numApr = $cantApr[0]['CantAprobados'];
$porcentApr = ($numApr/40)*100;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

<section class="all">
  <h1>Estadistica Aprobados y Desaprobados</h1>
  <h3>Asignatura: Trabajo Interdisciplinar</h3>

  <button class="btn_pdf"><a href="../logic/DocAbandonos.php" target="_blank">Descargar Registro</a> </button>

  <!--Recien empieza-->
  <h2>Grafica</h2>

  <div class="graficos">
    <canvas id="myChart" width="130" height="80"></canvas>
    <button onclick="Descargar()">Download</button>
  </div>

  <button id="botonRegresar" class="botones" type="button" onclick="location.href='../view_menu_Est_general.php'">Volver</button>
</section>
</body>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(200, 60, 154)",
          "rgb(150, 100, 50)"
        ],
        data: [<?php echo $numApr.",".$numDesap; ?>],
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

  function Descargar() {
    const imageLink = document.createElement('a');
    const canvas = document.getElementById('myChart');
    imageLink.download = 'Aprob_Desaprob.png';
    imageLink.href = canvas.toDataURL('image/png');
    imageLink.click();

    console.log(imageLink);
  };
</script>

<!-- /* Including the view_asistencia_footer.php file. */ -->
<?php include('../../templates/view_asistencia_footer.php'); ?>