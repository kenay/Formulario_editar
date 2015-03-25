<?php
class SeccionControlador extends seccion{
	public function guardarDatos($con,$objseccion){
		$variableSql= "INSERT INTO seccion";
		$variableSql.="(id,nombre,escuela)";
		$variableSql.="VALUES (";
		$variableSql.="'".$objSeccion[0]."',";
		$variableSql.="'".$objSeccion[1]."',";	
		$variableSql.="'".$objSeccion[2]."',";
		return consultaA($con,$variableSql);
	}

}