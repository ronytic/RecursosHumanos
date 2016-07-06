<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/pregunta.php");
$preg=new pregunta;

extract($_POST);
/*echo "<pre>";
print_r($p);
echo "</pre>";
exit();*/
foreach($p as $k){
    extract($k);
$valores=array(	"codcargo"=>"'$codcargo'",
				"pregunta"=>"'$pregunta'",
				"opcion1"=>"'$opcion1'",
				"opcion2"=>"'$opcion2'",
				"opcion3"=>"'$opcion3'",
				"opcion4"=>"'$opcion4'",
				"opcion5"=>"'$opcion5'",
				
				"respuesta"=>"'$respuesta'",
				);
				$preg->insertar($valores);
				
}
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>