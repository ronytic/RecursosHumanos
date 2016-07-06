<?php
include_once("../../login/check.php");
if(!empty($_POST)):
/*echo"<pre>";
print_r($_POST);
echo"</pre>";*/
extract($_POST);
include_once("../../class/proyecto.php");
$proyecto=new proyecto;
include_once("../../class/proyectopersonal.php");
$proyectopersonal=new proyectopersonal;
$valores=array(	"nombreproyecto"=>"'$nombreproyecto'",
				"descripcionproyecto"=>"'$descripcionproyecto'",
                "fechainicio"=>"'$fechainicio'",
                "fechafinalizacion"=>"'$fechafinalizacion'",
				);
				$proyecto->insertar($valores);
$id=$proyecto->last_id();
/*echo"<pre>";
print_r($valores);
echo"</pre>";*/

foreach($c as $codpersonal=>$puntaje){

    $valores=array(	"codproyecto"=>"'$id'",
				"codpersonal"=>"'$codpersonal'",
                "puntaje"=>"'$puntaje'",
				);
				$proyectopersonal->insertar($valores);
                /*echo"<pre>";
print_r($valores);
echo"</pre>";*/

}


				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$listar=1;

$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>