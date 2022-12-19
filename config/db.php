<?php


class BaseDatos{
  public static $instancia = null;
  public static function crearInstancia(){
    if(!isset(self::$instancia)){ //si la instancia tiene algo?
      $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      self::$instancia = new PDO('mysql:host=localhost;dbname=sistemaasistencia','root','',$opciones);
      //exec("SET NAMES utf8");
      //echo "Conexion satisfactoria a la Base de Datos ...";
    }
    return self::$instancia;
  }
};

function myquery($coneccion,$sql){
  $query = $coneccion->prepare($sql);
  $query->execute();
  $res = $query->fetchAll();
  return $res;
}


?>