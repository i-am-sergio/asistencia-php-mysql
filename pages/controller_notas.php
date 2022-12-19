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
  public function getEstudiantes($curso){ //ti
    $consulta = "SELECT notas_"."$curso".".*, estudiantes_"."$curso".".apellidos, estudiantes_"."$curso".".nombres
                  FROM notas_"."$curso"."
                  INNER JOIN estudiantes_"."$curso"."
                  ON notas_"."$curso".".id_est
                  WHERE estudiantes_"."$curso".".id_est=notas_"."$curso".".id_est;";
    $listaDeEstudiantes = $this->queryExecute($consulta);
    return $listaDeEstudiantes; 
  }
  public function getTotalEstudiantes($curso){
    $consulta = "SELECT COUNT(id_est) as 'cantidadEst' FROM estudiantes_$curso";
    $num = $this->queryExecute($consulta);
    $res = $num[0]['cantidadEst'];
    return $res;
  }
  public function get_Id_Nombre_Cursos(){
    $consulta = "SELECT id_curso,nombre_curso FROM cursos";
    $res = $this->queryExecute($consulta);
    return $res;
  }
  public function numAprobados($curso,$tipoDeNota){
    $consulta = "SELECT COUNT(id_est) as 'CantAprobados' FROM notas_".$curso." WHERE $tipoDeNota>=10.5";
    $cantApr = $this->queryExecute($consulta);
    $res = $cantApr[0]['CantAprobados'];
    return $res;
  }
  public function numDesaprobados($curso,$tipoDeNota){
    $consulta = "SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas_".$curso." WHERE $tipoDeNota<10.5";
    $cantApr = $this->queryExecute($consulta);
    $res = $cantApr[0]['CantDesaprobados'];
    return $res;
  }
  public function getPromedioNota($curso,$tipoDeNota){
    $consulta = "SELECT AVG(".$tipoDeNota.") as 'nota' FROM notas_".$curso;
    $promedio = $this->queryExecute($consulta);
    $res = $promedio[0]['nota'];
    return $res;
  }
  public function getMaximaNota($curso,$tipoDeNota){
    $consulta = "SELECT notas_$curso.id_est, estudiantes_$curso.nombres, estudiantes_$curso.apellidos, notas_$curso.$tipoDeNota as 'maxim'
                FROM notas_$curso
                INNER JOIN estudiantes_$curso
                ON notas_$curso.id_est -- Mientras el id_est exista
                WHERE notas_$curso.$tipoDeNota=
                (SELECT MAX(notas_$curso.$tipoDeNota) FROM notas_$curso) AND estudiantes_$curso.id_est=notas_$curso.id_est";
    $res = $this->queryExecute($consulta);
    return $res;
  }
  public function getMinimaNota($curso,$tipoDeNota){
    $consulta = "SELECT notas_$curso.id_est, estudiantes_$curso.nombres, estudiantes_$curso.apellidos, notas_$curso.$tipoDeNota as 'minim'
                FROM notas_$curso
                INNER JOIN estudiantes_$curso
                ON notas_$curso.id_est -- Mientras el id_est exista
                WHERE notas_$curso.$tipoDeNota=
                (SELECT MIN(notas_$curso.$tipoDeNota) FROM notas_$curso) AND estudiantes_$curso.id_est=notas_$curso.id_est";
    $res = $this->queryExecute($consulta);
    return $res;
  }
  public function getEstudiantesEnPeligro($idcurso){
    $consulta = "SELECT notas_$idcurso.id_est, estudiantes_$idcurso.apellidos, estudiantes_$idcurso.nombres, 
                notas_$idcurso.continua_1, notas_$idcurso.parcial_1, notas_$idcurso.continua_2, notas_$idcurso.parcial_2, 
                notas_$idcurso.med_peligro as 'peligro'
                FROM notas_$idcurso
                INNER JOIN estudiantes_$idcurso
                ON notas_$idcurso.id_est -- Mientras el id_est exista
                WHERE notas_$idcurso.med_peligro='M' AND estudiantes_$idcurso.id_est=notas_$idcurso.id_est;";
    $res = $this->queryExecute($consulta);
    return $res;
  }

  public function actualizarPeligro($idcurso,$cantidadEstudiantes){
    for ($i=1; $i<=$cantidadEstudiantes; $i++){
      $consulta1 = "UPDATE notas_$idcurso 
                INNER JOIN cursos 
                ON notas_$idcurso.id_est 
                SET notas_$idcurso.med_peligro='M' -- MALO 
                WHERE notas_$idcurso.id_est=$i 
                AND cursos.id_curso=$idcurso -- ALERTA CON ESTE NUMEROOOOOOOOOOOOOOO 
                AND ((notas_$idcurso.continua_1*cursos.porcentaje_c1)+(notas_$idcurso.continua_2*cursos.porcentaje_c2)+(notas_$idcurso.parcial_1*cursos.porcentaje_p1)+(notas_$idcurso.parcial_2*cursos.porcentaje_p2))<4.8"; 
      $query = $this->conexion->prepare($consulta1);
      $query->execute();

      $consulta2 = "UPDATE notas_$idcurso 
                  INNER JOIN cursos 
                  ON notas_$idcurso.id_est 
                  SET notas_$idcurso.med_peligro='B' -- MALO 
                  WHERE notas_$idcurso.id_est=$i 
                  AND cursos.id_curso=$idcurso -- ALERTA CON ESTE NUMEROOOOOOOOOOOOOOO 
                  AND ((notas_$idcurso.continua_1*cursos.porcentaje_c1)+(notas_$idcurso.continua_2*cursos.porcentaje_c2)+(notas_$idcurso.parcial_1*cursos.porcentaje_p1)+(notas_$idcurso.parcial_2*cursos.porcentaje_p2))>=4.8"; 
      $query = $this->conexion->prepare($consulta2);
      $query->execute();
    }
  }
  public function getNotasByEstudiante($idcurso,$idest){
    $consulta = "SELECT * FROM notas_$idcurso WHERE id_est=$idest";
    $res = $this->queryExecute($consulta);
    $notas = $res[0];
    return $notas;
  }

  public function actualizarNotasByEstudiante($idcurso,$idest,$array){
    $tr1c1 = $array['trabajo_1c1'];
    $tr2c1 = $array['trabajo_2c1'];
    $tr3c1 = $array['trabajo_3c1'];
    $tr4c1 = $array['trabajo_4c1'];
    $tr5c1 = $array['trabajo_5c1'];
    $tr6c1 = $array['trabajo_6c1'];
    $parcial1 = $array['parcial_1'];

    $tr1c2 = $array['trabajo_1c2'];
    $tr2c2 = $array['trabajo_2c2'];
    $tr3c2 = $array['trabajo_3c2'];
    $tr4c2 = $array['trabajo_4c2'];
    $tr5c2 = $array['trabajo_5c2'];
    $tr6c2 = $array['trabajo_6c2'];
    $parcial2 = $array['parcial_2']; 

    $tr1c3 = $array['trabajo_1c3'];
    $tr2c3 = $array['trabajo_2c3'];
    $tr3c3 = $array['trabajo_3c3'];
    $tr4c3 = $array['trabajo_4c3'];
    $tr5c3 = $array['trabajo_5c3'];
    $tr6c3 = $array['trabajo_6c3'];
    $parcial3 = $array['parcial_3']; 

    $sql = "UPDATE notas_$idcurso INNER JOIN cursos
        ON notas_$idcurso.id_est
        SET trabajo_1_c1=$tr1c1, trabajo_2_c1=$tr2c1, trabajo_3_c1=$tr3c1, 
        trabajo_4_c1=$tr4c1, trabajo_5_c1=$tr5c1, trabajo_6_c1=$tr6c1, 
        trabajo_1_c2=$tr1c2, trabajo_2_c2=$tr2c2, trabajo_3_c2=$tr3c2, 
        trabajo_4_c2=$tr4c2, trabajo_5_c2=$tr5c2, trabajo_6_c2=$tr6c2, 
        trabajo_1_c3=$tr1c3, trabajo_2_c3=$tr2c3, trabajo_3_c3=$tr3c3, 
        trabajo_4_c3=$tr4c3, trabajo_5_c3=$tr5c3, trabajo_6_c3=$tr6c3, 
        parcial_1=$parcial1, parcial_2=$parcial2, parcial_3=$parcial3, 
        notas_$idcurso.continua_1=(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_1_c1)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_2_c1)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_3_c1)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_4_c1)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_5_c1)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_6_c1), 
        notas_$idcurso.continua_2=(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_1_c2)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_2_c2)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_3_c2)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_4_c2)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_5_c2)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_6_c2), 
        notas_$idcurso.continua_3=(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_1_c3)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_2_c3)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_3_c3)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_4_c3)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_5_c3)+(cursos.porcentaje_trabajos*notas_$idcurso.trabajo_6_c3), 
        notas_$idcurso.nota_final=(cursos.porcentaje_c1*notas_$idcurso.continua_1)+(cursos.porcentaje_c2*notas_$idcurso.continua_2)+(cursos.porcentaje_c3*notas_$idcurso.continua_3)+(cursos.porcentaje_p1*notas_$idcurso.parcial_1)+(cursos.porcentaje_p2*notas_$idcurso.parcial_2)
        +(cursos.porcentaje_p3*notas_$idcurso.parcial_3)
        WHERE notas_$idcurso.id_est=$idest";
    
    $query = $this->conexion->prepare($sql);
    $query->execute();
  }
  
};


?>
