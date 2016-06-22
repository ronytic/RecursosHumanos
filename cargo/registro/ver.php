<?php
include_once("../../impresion/pdf.php");
$titulo="Información del Cargo";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/cargo.php");
$cargo=new cargo;
$car=array_shift($cargo->mostrar($id));




$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Nombre del Cargo:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$car['nombrecargo'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Descripción:",0,"",0,"B");
$pdf->CuadroCuerpoMulti(120,$car['descripcion'],0,"",0,"");
$pdf->Ln();
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
