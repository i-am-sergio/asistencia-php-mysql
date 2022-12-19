<?php
session_start(); //se abre la sesion
session_destroy(); //se destruye la sesion
header('Location: ../../index.php'); //te dirige al index.php (login)
?>