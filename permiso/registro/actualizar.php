<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/permiso.php");
$permiso=new permiso;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"estado"=>"'$estado'",
				);
				$permiso->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>