<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Revisión de Permiso";
$id=$_GET['id'];
include_once '../../class/permiso.php';
$permiso=new permiso;
$p=array_shift($permiso->mostrar($id));
include_once("../../class/personal.php");
$personal=new personal;
$per=array_shift($personal->mostrarTodo("codpersonal=".$p['codpersonal']));
include_once("../../class/cargo.php");
$cargo=new cargo;
$car=array_shift($cargo->mostrarTodo("codcargo=".$per['codcargo']));
$garantia=array(1=>"Si",0=>"No");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';
//$us=todolista($usuarios->mostrarTodo("nivel=3","nombre"),"codusuarios","paterno,materno,nombre");
?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_2 grid_8 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td colspan="2">Nombre: <?php echo $per['paterno']." ".$per['materno']." ".$per['nombres'];?></td>
						<td>Cargo: <?php echo $car['nombrecargo'];?></td>
					</tr>
                    <tr>
						<td><?php campos("Fecha de Salida","fechasalida","date",$p['fechasalida'],0,array("size"=>"40","readonly"=>"readonly"));?></td>
					
						<td><?php campos("Hora de salida","horasalida","time",$p['horasalida'],0,array("readonly"=>"readonly"));?></td>
						<td><?php campos("Hora de Retorno","horaretorno","time",$p['horaretorno'],0,array("readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
						<td colspan="3"><?php campos("Motivo de la Salida","motivosalida","textarea",$p['motivo'],0,array("readonly"=>"readonly","cols"=>70,"rows"=>5));?></td>
					</tr>
                    <tr>
						<td colspan="3"><?php campos("Lugar de la Salida","lugar","text",$p['lugar'],0,array("size"=>"40","readonly"=>"readonly","rows"=>5));?></td>
					</tr>
                  
					
				</table>
                <div class="titulo">Estado</div>
                <table class="tabla">
                    <tr>
                        <td class="centrar"><label>Pendiente<br><input type="radio" name="estado" value="0" <?php echo $p['estado']==0?'checked="checked"':''?> ></label></td>
                        <td><label>Aprobado<br><input type="radio" name="estado" value="1" <?php echo $p['estado']==1?'checked="checked"':''?>></label></td>
                        <td><label>Denegado<br><input type="radio" name="estado" value="2" <?php echo $p['estado']==2?'checked="checked"':''?>></label></td>
                    </tr>
                    <tr><td colspan="3"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>