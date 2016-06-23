<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Personal";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/personal.php");
$personal=new personal;
$al=array_shift($personal->mostrar($id));

include_once("../../class/cargo.php");
$cargo=new cargo;
$car=array_shift($cargo->mostrar($al['codcargo']));

$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Apellido Paterno"=>capitalizar($al['paterno']),
				"Apellido Materno"=>capitalizar($al['materno']),
				"Nombres"=>capitalizar($al['nombres']),

				"Fecha de Nacimiento"=>fecha2Str($al['fechanac']),
				"Cédula de Identidad"=>$al['ci'],
				"Sexo"=>$al['sexo']?'Masculino':'Femenino',
				"Dirección"=>$al['direccion'],
				"Teléfono"=>$al['telefono'],
				"Celular"=>$al['celular'],
                "Correo"=>$al['email'],
				
			));
$pdf->Linea();
mostrarI(array("Cargo"=>$car['nombrecargo'],
				"CodContrato"=>$al['codcontrato'],
                "Inicio de contrato"=>$al['iniciocontrato'],
                "Duración de contrato"=>$al['duracioncontrato'],
                "Item"=>$al['item']?"Si":"No",
			));
$pdf->Linea();
$foto="../foto/".$al['foto'];
if(!empty($al['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,55,40,40);	
}

$pdf->Output();
?>