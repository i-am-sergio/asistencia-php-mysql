<!-- /* Including the view_asistencia_header.php file. */ -->
<?php include('../templates/view_asistencia_header.php'); ?>

<section class="all">
<h2>Total de Asistencias y Faltas</h2>
<form action="graphics/total_asis.php" method="post">
    <button id="botonTotal" name="botonTotal" class="btn_select" type="submit" value="Total" >Total de Asistentes/Ausentes del Semestre</button>
</form>

<h2>Abandonos</h2>
<form action="graphics/abandonos.php" method="post">
    <button id="botonT" name="botonT" class="btn_select" type="submit" value="Total" >Presentes y Abandonos</button>
</form>

<br><br>

<button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='view_asistencia.php'">Volver</button>
</section>
<?php include('../templates/view_asistencia_footer.php'); ?> 
