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

  public function getAllEstudiantesEpcc(){
    $consulta = "SELECT * FROM estudiantes_epcc";
    $res = $this->queryExecute($consulta);
    return $res;             
  }

  public function getInfoByEstudiante($idEst){
    $consulta = "SELECT * FROM estudiantes_epcc WHERE id_epcc=$idEst";
    $res = $this->queryExecute($consulta);
    $infoEst = $res[0];
    return $infoEst;  
  }
  
  public function getNombresCursos(){
    $consulta = "SELECT id_curso,nombre_curso FROM cursos";
    $res = $this->queryExecute($consulta);
    return $res; 
  }

  public function getInfoEstadoCursos($idEst){
    $consulta = "SELECT * FROM estado_completo WHERE id_est=$idEst";
    $res = $this->queryExecute($consulta);
    $infoCursos = $res[0];
    return $infoCursos; 
  }

  public function asignarEstadoByAbreviatura($abreviatura):string {
    if($abreviatura == "A"){
      return "APROBADO";
    } else if($abreviatura == "D") {
      return "DESAPROBADO";
    } else if($abreviatura == "NA") {
      return "NO APTO";
    } else if($abreviatura == "SA") {
      return "SI APTO";
    } 
  }

  public function getEstadisticasCursosByEstudiante($idEst) {
    $consulta = "SELECT estado_curso,COUNT(estado_curso) as 'cantidad'
                FROM(
                    SELECT C1 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst
                    UNION ALL
                    SELECT C2 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C3 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C4 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C5 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C6 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C7 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C8 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C9 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C10 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C11 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C12 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C13 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C14 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C15 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C16 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C17 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C18 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C19 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C20 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C21 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C22 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C23 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C24 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C25 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                )T
                GROUP BY estado_curso";
    $res = $this->queryExecute($consulta);
    // $estadisctica = $res["cantidad"];
    return $res; 
  }

    /*Funciones apartes */

    /*
    Pasos a seguir
    - 1. Al hacer click en el botón de VER en estudiantes:
    2. Iniciar función especial que agarre el "nombre" del estudiante
      if name==true in tabla_x -> nuevo(if nota_final>=10.5)-> Establecer A -> Else(D)
    3. Haría falta un getNameEstudainte como la función de arriba getInfoByEstudiante(id) al hacer click, para lo demás
    */


  //Detectamos el nombre del estudiante
  public function getNameEstudiante($idEst){
    $consulta = "SELECT nombres_epcc FROM estudiantes_epcc WHERE id_epcc=$idEst";
    $res = $this->queryExecute($consulta);
    $infoEst = $res[0]["nombres_epcc"];
    return $infoEst;
  }


  //creamos arrays que contendrán el id y las tablas cursos en los que existe el estudiante
  private $arrayIDs= array(0,0,0,0);
  private $arrayTabla= array(0,0,0,0);


  //Obtenemos los id's y las tablas de los cursos donde se encuentra, existe el estudiante
  public function DetectarEstudianteExistente($name){
    for ($i=1; $i<=4 ; $i++) { 
      $consulta="SELECT estudiantes_$i.id_est FROM estudiantes_$i WHERE estudiantes_$i.nombres='$name'";
      $id_obtenido= $this->queryExecute($consulta);
      if ($id_obtenido){
        $this->arrayTabla[$i-1]=1;//el 1 indicará que el estudiante si se encuentra en esa tabla
        $this->arrayIDs[$i-1]=$id_obtenido[0]["id_est"];//obtiene el id encontrado en esa tabla
      }
      else {
        $this->arrayTabla[$i-1]=0;
        $this->arrayIDs[$i-1]=0;
      }
    }
  }
  private $contador=1;
  //Función para actualizar el estado de los cursos donde existe el estudiante obtenido anteriormente
  public function ActualizarEstadoCursoPorEstudiante(){
    for ($i=1; $i<=4 ; $i++) { //4 primeros cursos
      $idcurso=$i;
      $idEst=$this->arrayIDs[$i-1];
      $TablaExiste=$this->arrayTabla[$i-1];
      if ($TablaExiste==1 && $idEst!=0 ) {
        // $idcurso=$i;
        // $idEst=$this->arrayIDs[$i-1];
        $consulta1="SELECT notas_$idcurso.nota_final FROM notas_$idcurso WHERE notas_$idcurso.id_est=$idEst";
        $ejecucion=$this->queryExecute($consulta1);
        $notaFinal=$ejecucion[0]["nota_final"];
        // print_r($notaFinal);

        if ($notaFinal>=10.5 && $this->contador==1) {
          $consulta2="UPDATE estado_completo SET estado_completo.C$idcurso = 'A' WHERE estado_completo.id_est = $idEst";
          $this->queryExecute($consulta2);
          $this->contador=2;
        }
        elseif ($notaFinal<10.5 && $this->contador==1) {
          $consulta5="UPDATE estado_completo SET estado_completo.C$idcurso = 'D' WHERE estado_completo.id_est = $idEst";
          $this->queryExecute($consulta5);
          $this->contador=2;
        }
        elseif ($notaFinal>=10.5 && $this->contador==2) {
          $newid=$idEst+5;
          $consulta2="UPDATE estado_completo SET estado_completo.C$idcurso = 'A' WHERE estado_completo.id_est = $newid";
          $this->queryExecute($consulta2);
          $this->contador=1;
        }
        elseif ($notaFinal<10.5 && $this->contador==2) {
          $newid=$idEst+5;
          $consulta5="UPDATE estado_completo SET estado_completo.C$idcurso = 'D' WHERE estado_completo.id_est = $newid";
          $this->queryExecute($consulta5);
          $this->contador=1;
        }
      }
    }
  }

  //Función para actualizar los estados de los cursos NA, SA
  public function ObtenerEstado($idEst,$idcurso){
    $consulta="SELECT estado_completo.C$idcurso FROM estado_completo WHERE estado_completo.id_est=$idEst";
    $ejecucion=$this->queryExecute($consulta);
    $abreviatura = $ejecucion[0]["C$idcurso"];
    return $abreviatura;
  }

  public function ActualizarNoAptosSiAptos($idEst){
    $estado="";
    for ($i=1; $i<=5; $i++) { 
      if ($i==2) {
        $estado=$this->ObtenerEstado($idEst,$i);
        // print_r($estado);
        if ($estado=="A") {
          $orden="UPDATE estado_completo SET C8 = 'SA' WHERE id_est = $idEst";//cambia a SA
          $this->queryExecute($orden);
        }
        else {
          $orden="UPDATE estado_completo SET C8 = 'NA' WHERE id_est = $idEst";//cambia a SA
          $this->queryExecute($orden);
        }
      }
      else if ($i==5) {
        $estado=$this->ObtenerEstado($idEst,$i);
        // print_r($estado);
        if ($estado=="A") {
          $orden="UPDATE estado_completo SET C12 = 'SA' WHERE id_est = $idEst";//cambia a SA
          $this->queryExecute($orden);
        }
        else {
          $orden="UPDATE estado_completo SET C12 = 'NA' WHERE id_est = $idEst";//cambia a SA
          $this->queryExecute($orden);
        }
      }
      //Puede seguir creciendo
    }
  }




}



?>

