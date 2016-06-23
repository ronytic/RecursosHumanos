<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/permiso.php");
$permiso=new permiso;
//echo "<pre>";print_r($_POST);echo "</pre>";
extract($_POST);
//empieza la copia de archivos
/*
if(($_FILES['curriculum']['type']=="application/pdf" || $_FILES['curriculum']['type']=="application/msword" || $_FILES['curriculum']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['curriculum']['size']<="500000000"){
	@$curriculum=$_FILES['curriculum']['name'];
	@copy($_FILES['curriculum']['tmp_name'],"../curriculum/".$_FILES['curriculum']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}
*/
$codpersonal=$_SESSION['codpersonal'];
$valores=array(	"codpersonal"=>"'$codpersonal'",
				"fechasalida"=>"'$fechasalida'",
                "horasalida"=>"'$horasalida'",
                "horaretorno"=>"'$horaretorno'",
                "motivo"=>"'$motivosalida'",
                "lugar"=>"'$lugar'",
				);
				$permiso->insertar($valores);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$botones=array("ver.php"=>"Ver Papeleta de Solicutd de Permiso");
$id=$permiso->last_id();
header("");
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>