<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/cargo.php");
$cargo=new cargo;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"nombrecargo"=>"'$nombrecargo'",
				"descripcion"=>"'$descripcion'",
				);
				$cargo->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>