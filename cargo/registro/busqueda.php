<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/cargo.php';
	extract($_POST);
	$cargo=new cargo;
	$car=$cargo->mostrarTodo("nombrecargo LIKE '%$nombrecargo%'","nombrecargo");
	foreach($car as $c){$i++;
		$datos[$i]['codcargo']=$c['codcargo'];
		$datos[$i]['nombrecargo']=$c['nombrecargo'];
		$datos[$i]['descripcion']=$c['descripcion'];
	}
	
	$titulo=array("nombrecargo"=>"Nombre del Cargo","descripcion"=>"Descripción");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>