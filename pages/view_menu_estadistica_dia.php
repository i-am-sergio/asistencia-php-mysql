<!-- /* Including the view_asistencia_header.php file. */ -->
<?php include('../templates/view_asistencia_header.php'); ?>

<section class="all">
<h2>Estadistica por dia</h2>
    <form action="graphics/asistentes_y_faltantes_bar.php" method="post">
      
        <button id="boton1" name="botonDia" class="btn_select" type="submit" value="dia_1" >asistencia1</button>
        <button id="boton2" name="botonDia" class="btn_select" type="submit" value="dia_2" >asistencia2</button>
        <button id="boton3" name="botonDia" class="btn_select" type="submit" value="dia_3" >asistencia3</button>
        <button id="boton4" name="botonDia" class="btn_select" type="submit" value="dia_4" >asistencia4</button>
        <button id="boton5" name="botonDia" class="btn_select" type="submit" value="dia_5" >asistencia5</button>
        <button id="boton6" name="botonDia" class="btn_select" type="submit" value="dia_6" >asistencia6</button>
        <button id="boton7" name="botonDia" class="btn_select" type="submit" value="dia_7" >asistencia7</button>
        <button id="boton8" name="botonDia" class="btn_select" type="submit" value="dia_8" >asistencia8</button>
        <button id="boton9" name="botonDia" class="btn_select" type="submit" value="dia_9" >asistencia9</button>
        <button id="boton10" name="botonDia" class="btn_select" type="submit" value="dia_10" >asistencia10</button>
        <button id="boton11" name="botonDia" class="btn_select" type="submit" value="dia_11" >asistencia11</button>
        <button id="boton12" name="botonDia" class="btn_select" type="submit" value="dia_12" >asistencia12</button>
        <button id="boton13" name="botonDia" class="btn_select" type="submit" value="dia_13" >asistencia13</button>
        <button id="boton14" name="botonDia" class="btn_select" type="submit" value="dia_14" >asistencia14</button>
        <button id="boton15" name="botonDia" class="btn_select" type="submit" value="dia_15" >asistencia15</button>
        <button id="boton16" name="botonDia" class="btn_select" type="submit" value="dia_16" >asistencia16</button>
        <button id="boton17" name="botonDia" class="btn_select" type="submit" value="dia_17" >asistencia17</button>
        <button id="boton18" name="botonDia" class="btn_select" type="submit" value="dia_18" >asistencia18</button>
        <button id="boton19" name="botonDia" class="btn_select" type="submit" value="dia_19" >asistencia19</button>
        <button id="boton20" name="botonDia" class="btn_select" type="submit" value="dia_20" >asistencia20</button>

    </form>

    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='view_asistencia.php'">Volver</button>
</section>
<?php include('../templates/view_asistencia_footer.php'); ?> 