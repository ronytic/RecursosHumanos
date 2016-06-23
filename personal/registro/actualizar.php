<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/personal.php");
$personal=new personal;
extract($_POST);

if( $_FILES['foto']['size']<="500000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo de Imágen no válido. Verifique e intente nuevamente";
}
if( $_FILES['curriculum']['size']<="500000000"){
	@$curriculum=$_FILES['curriculum']['name'];
	@copy($_FILES['curriculum']['tmp_name'],"../curriculum/".$_FILES['curriculum']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
}

//empieza la copia de archivos
$valores=array(	"materno"=>"'$materno'",
				"paterno"=>"'$paterno'",
				"nombres"=>"'$nombres'",
				"fechanac"=>"'$fechanac'",
				"ci"=>"'$ci'",
				"sexo"=>"'$sexo'",
				"direccion"=>"'$direccion'",
				
				"telefono"=>"'$telefono'",
				"celular"=>"'$celular'",
				"email"=>"'$email'",
				"codcargo"=>"'$codcargo'",
				"turno"=>"'$turno'",
                "codcontrato"=>"'$codcontrato'",
                "iniciocontrato"=>"'$iniciocontrato'",
				"duracioncontrato"=>"'$duracioncontrato'",

				
				"password"=>"MD5('$ci')",
				);
if($_FILES['foto']['name']!=""){				
	$valores=array_merge($valores,array("foto"=>"'$foto'"));
}
if($_FILES['curriculum']['name']!=""){				
	$valores=array_merge($valores,array("curriculum"=>"'$curriculum'"));
}
				$personal->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE:<br>
<br>
<br>
<br>
USUARIO:$id<br>
CONTRASEÑA:$ci
";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>