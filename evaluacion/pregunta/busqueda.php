<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	extract($_POST);
    include_once("../../class/cargo.php");
    $cargo=new cargo;
    
    include_once("../../class/pregunta.php");
    $preg=new pregunta;
    
    $codcargo=$codcargo==""?"%":"$codcargo";

	$pr=$preg->mostrarTodo("pregunta LIKE '$pregunta%' and codcargo LIKE '$codcargo'",0,"codpregunta");
	foreach($pr as $g){$i++;
        $car=array_shift($cargo->mostrarTodo("codcargo=".$g['codcargo'],"nombrecargo"));
		$datos[$i]['codpregunta']=$g['codpregunta'];
		$datos[$i]['cargo']=$car['nombrecargo'];
		$datos[$i]['pregunta']=$g['pregunta'];
        $datos[$i]['opcion1']=$g['opcion1'];
        $datos[$i]['opcion2']=$g['opcion2'];
        $datos[$i]['opcion3']=$g['opcion3'];
        $datos[$i]['opcion4']=$g['opcion4'];
        $datos[$i]['opcion5']=$g['opcion5'];
        $datos[$i]['respuesta']=$g['respuesta'];
        

	}
	
	$titulo=array("pregunta"=>"Pregunta","opcion1"=>"Opción 1","opcion2"=>"Opción 2","opcion3"=>"Opción 3","opcion4"=>"Opción 4","opcion5"=>"Opción 5","respuesta"=>"Respuesta","cargo"=>"Cargo");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","");
}
?>