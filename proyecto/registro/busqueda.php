<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/proyecto.php';
	extract($_POST);
	$proyecto=new proyecto;
    $fechainicio=$fechainicio!=""?$fechainicio:"%";
	$pro=$proyecto->mostrarTodo("nombreproyecto LIKE '%$nombreproyecto%' and fechainicio LIKE '$fechainicio'","nombreproyecto,fechainicio");
	foreach($pro as $c){$i++;
		$datos[$i]['codproyecto']=$c['codproyecto'];
		$datos[$i]['nombreproyecto']=$c['nombreproyecto'];
		$datos[$i]['descripcionproyecto']=$c['descripcionproyecto'];
        $datos[$i]['fechainicio']=$c['fechainicio'];
        $datos[$i]['fechafinalizacion']=$c['fechafinalizacion'];
	}
	
	$titulo=array("nombreproyecto"=>"Nombre del Proyecto","descripcionproyecto"=>"Descripción del Proyecto","fechainicio"=>"Fecha de Inicio","fechafinalizacion"=>"Fecha de Finalización");
	listadoTabla($titulo,$datos,1,"","eliminar.php","ver.php");
}
?>