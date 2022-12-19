<?php

class Conexion{
  protected $host;
  protected $db;
  protected $usuario;
  protected $password;
  protected $conexion;

  public function __construct(){
    $this->host = "localhost";
    $this->db = "sistemaasistencia";
    $this->usuario = "root";
    $this->password = "";
    try {
      $this->conexion = new PDO ("mysql:host=".$this->host."; dbname=".$this->db,$this->usuario,$this->password);
      $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $this->conexion->exec("SET NAMES utf8");
    } catch (Exception $e) {
      echo "Error al conectar con la base de datos: Linea => ". $e->getLine();
    }
  }

  public function queryExecute($sql){
    $query = $this->conexion->prepare($sql);
    $query->execute();
    $res = $query->fetchAll();
    return $res;
  }
  
  public function getAllUsuarios(){
    $consulta = "SELECT * FROM usuarios";
    $res = $this->queryExecute($consulta);
    return $res;
  }

  public function getInfoUsuarioBy_usuario($usuario){
    $consulta = "SELECT * FROM `usuarios` WHERE usuario='$usuario'";
    $res = $this->queryExecute($consulta);
    $infoUser = $res[0];
    return $infoUser;
  }


  public function insertarNuevoUsuario($nombres,$apellidos,$usuario,$password,$permiso){
    $resNumUsuarios = $this->queryExecute("SELECT COUNT(codigo) as 'cantidadUsua' FROM usuarios");
    $numUsuarios = $resNumUsuarios[0]['cantidadUsua'];
    $nuevoCodigo = $numUsuarios+1;

    $sql = "INSERT INTO `usuarios` (`codigo`, `usuario`, `password`, `nombres`, `apellidos`, `email`, `permiso`) VALUES ($nuevoCodigo, '$usuario', '$password', '$nombres', '$apellidos', '', '$permiso')";
    $query = $this->conexion->prepare($sql);
    $query->execute();
  }

}

?>

