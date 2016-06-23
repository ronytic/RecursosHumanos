<?php
include_once '../../login/check.php';
//print_r($_SESSION);
$folder="../../";
$titulo="Registro de Nueva Solicitud de Permiso";
include_once("../../class/cargo.php");
$cargo=new cargo;
$car=array_shift($cargo->mostrarTodo("codcargo=".$_SESSION['codcargo'],"nombrecargo"));





include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';
//$us=todolista($usuarios->mostrarTodo("nivel=3","nombre"),"codusuarios","paterno,materno,nombre");
?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
						<td>Nombre: <?php echo $us['paterno']." ".$us['materno']." ".$us['nombres'];?></td>
					</tr>
                    <tr>
						<td>Cargo: <?php echo $car['nombrecargo'];?></td>
					</tr>
                    <tr>
						<td><?php campos("Fecha de Salida","fechasalida","date",date("Y-m-d"),0,array("size"=>"40","required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Hora de salida","horasalida","time","00:00",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Hora de Retorno","horaretorno","time","00:00",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Motivo de la Salida","motivosalida","textarea","",0,array("size"=>"40","cols"=>40,"rows"=>5));?></td>
					</tr>
                    <tr>
						<td><?php campos("Lugar de la Salida","lugar","text","",0,array("size"=>"40","cols"=>40,"rows"=>5));?></td>
					</tr>
                  
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>