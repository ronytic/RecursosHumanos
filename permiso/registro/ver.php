<?php
include_once("../../impresion/pdf.php");
$titulo="Papeleta de Solicitud de Permiso";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/permiso.php");
$permiso=new permiso;
$gr=array_shift($permiso->mostrar($id));

include_once("../../class/cargo.php");
    $cargo=new cargo;
    
    include_once("../../class/personal.php");
    $personal=new personal;

$per=array_shift($personal->mostrarTodo("codpersonal=".$gr['codpersonal'],""));
$car=array_shift($cargo->mostrarTodo("codcargo=".$per['codcargo'],""));
//$pdf=new PDF("P","mm","letter");
$pdf=new PDF("P","mm",array(216,140));
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(5);
$pdf->CuadroCuerpoPersonalizado(40,"Nombre del Personal:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(40,$per['paterno'],0,"","B","");
$pdf->CuadroCuerpoPersonalizado(40,$per['materno'],0,"","B","");
$pdf->CuadroCuerpoPersonalizado(60,$per['nombres'],0,"","B","");
$pdf->Ln(8);
$pdf->CuadroCuerpoPersonalizado(40,"Cargo:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(40,$car['nombrecargo'],0,"","B","");
$pdf->Ln(8);
$pdf->CuadroCuerpoPersonalizado(40,"Motivo:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(145,$gr['motivo'],0,"","B","");
$pdf->Ln(8);
$pdf->CuadroCuerpoPersonalizado(40,"Lugar:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(145,$gr['lugar'],0,"","B","");
$pdf->Ln(8);
$pdf->CuadroCuerpoPersonalizado(40,"Fecha de  Salida:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(30,$gr['fechasalida'],0,"","B","");
$pdf->Ln(8);
$pdf->CuadroCuerpoPersonalizado(40,"Hora de Salida:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(30,$gr['horasalida'],0,"","B","");
$pdf->Ln(8);
$pdf->CuadroCuerpoPersonalizado(40,"Hora de Retorno:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(30,$gr['horaretorno'],0,"","B","");
$pdf->Ln(10);
$pdf->CuadroCuerpoPersonalizado(75,"",0,"","","B");
$pdf->CuadroCuerpoPersonalizado(40,"FIRMA SOLICITANTE",0,"","T","B");
$pdf->CuadroCuerpoPersonalizado(25,"",0,"","","B");
$pdf->CuadroCuerpoPersonalizado(40,"FIRMA DIRECTOR",0,"","T","B");
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
