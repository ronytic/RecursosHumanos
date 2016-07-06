<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Proyecto";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/proyecto.php");
$proyecto=new proyecto;
$pro=array_shift($proyecto->mostrar($id));

include_once("../../class/proyectopersonal.php");
$proyectopersonal=new proyectopersonal;
$proper=($proyectopersonal->mostrarTodo("codproyecto=".$id)); 

include_once("../../class/personal.php");
$personal=new personal;


include_once("../../class/cargo.php");
$cargo=new cargo;


$pdf=new PDF("P","mm","letter");

$pdf->AddPage();

mostrarI(array("Nombre del Proyecto"=>$pro['nombreproyecto'],
				"Descripción del Proyecto"=>$pro['descripcionproyecto'],
                "Inicio de Proyecto"=>$pro['fechainicio'],
                "Finalización del Proyecto"=>$pro['fechafinalizacion'],
			));

$pdf->Linea();           
$pdf->CuadroCuerpoPersonalizado(182,"Personal a Cargo del Proyecto",1,"C",0,"B");       
$pdf->ln();
$pdf->CuadroCuerpoPersonalizado(15,"N",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(80,"Nombre",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(50,"Cargo",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(30,"Puntaje",1,"C",1,"B");
$pdf->ln();
$i=0;
foreach($proper as $pp){$i++;
$al=array_shift($personal->mostrar($pp['codpersonal']));
$car=array_shift($cargo->mostrar($al['codcargo']));
    $pdf->CuadroCuerpoPersonalizado(15,$i,0,"R",1,"");
    $pdf->CuadroCuerpoPersonalizado(80,capitalizar($al['paterno'])." ".capitalizar($al['materno'])." ".capitalizar($al['nombres']),0,"L",1,"");
    $pdf->CuadroCuerpoPersonalizado(50,$car['nombrecargo'],0,"L",1,"");
    $pdf->CuadroCuerpoPersonalizado(30,$pp['puntaje'],0,"C",1,"");
    $pdf->ln();
}
$pdf->ln();


$pdf->Output();
?>