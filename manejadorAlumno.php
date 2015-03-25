<?php
include './clases/Coneccion.php';
include './clases/Alumno.php';
include './clases/AlumnoControlador.php';
$con = new Coneccion();
$alumnoA = new AlumnoControlador();
$accion= $_REQUEST['accion'];
switch ($accion){
  case 'save'

//if ($con->conectar()){

    if(isset($_REQUEST['bot'])){
    $alumnoA->setId('NULL');
    $alumnoA->setNombre($_REQUEST['nombre']);
    $alumnoA->setApellido($_REQUEST['apellido']);
    $alumnoA->setCarnet($_REQUEST['carnet']);
    $alumnoA->setDir($_REQUEST['dir']);
    $alumnoA->setFechaNac($_REQUEST['fecha_nac']);
    $alumnoA->setSeccion($_REQUEST['seccion']);
    $datosObj=array($alumnoA->getId(),
                    $alumnoA->getNombre(),
                    $alumnoA->getApellido(),
                    $alumnoA->getFechaNac(),
                    $alumnoA->getDir(),
                    $alumnoA->getCarnet(),
                    $alumnoA->getSeccion());
    print $alumnoA->guardarDatos($con,$datosObj);
    print '<a href=\'manejadorAlumno.php?accion=con\'>Ver datos</a>';
  }else{
    print 'No se ha enviado datos ';
}
break;
case 'con':
  $sql='SELECT * FROM ALUMNO';
  print consultaD($con,$sql,2,TRUE);
  break;
  case 'del':
  $sql='DELETE from alumno WHERE id='.$_REQUEST['id'].';';
  print consultaA($con,$sql);
  break;
  default:
  print 'No hay Accion que realizar';
  break;

}  else {
    print $con->conectar();
}

function consultaA($coneccion,$sql){
  $ejecutor = $coneccion;
  $msgok = NULL;
  $msgerror = NULL;

  try {
    $condicion = strstr(trim($sql),"",TRUE);

    switch ($condicion)
    {
      case "INSERT":
       $msgerro ="No se ha Podido Insertar los Datos";
       $msgok = "Datos Insertados";
       break;
       case "DELETE":
       $msgerro ="No se ha Podido Eliminar los Datos";
       $msgok = "Datos Eliminados";
       break;
       case "UPDATE":
       $msgerro ="No se ha Podido Actualizar los Datos";
       $msgok = "Datos Actualizar";
       break;
       default:
       $msgerro ="No se ha Podido Insertar los Datos";
      break;
    }

    $ejecutor->beginTransaction();
    $fila=$ejecutor->exec($sql);
    $ejecutor->commint();
//.................................
    if($fila == 0){
      $msgok = $msgerror. "<br> No existecoincidencia para realizar la accion sobre los "
    }
    return $msgok." Filas Afectadas ".$fila ;

  }cath (exception $exc){
    $ejecutor->rollBack();
    return $msgerror. ":(<br>".$exc->getMessage();
}
function consultaD($coneccion,$sql,$modo=2,$presentacion=False)
{
  $ejecutor=$coneccion;
  $manejador=trim($sql);
  $devolucion="";
}
try{

  $datos=$ejecutor->query($manejador);
  $datos->setfetchMode($modo);

   if($presentacion == TRUE){
    //...........
    $devolucion.="<table border=1>";
   }ele{

    foreach ($datos->fetAll() as $registros) {
      $devolucion.="<tr>";
      $devolucion.="</tr>";
    }
    foreach ($registros as $valor) {
      $devolucion.="<td>".$valor."</td>";
    }
    $devolucion.="</table>";
    $contenedor=$datos->fetchAll();
    $devolucion=$contenedor;
   }

} catch (Exception $exc){
  //..................................
  return "No se pudieron Consultar los Datos <br/>".$exec->getMessage();
}
  return $devolucion;