<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Cargo";
$id=$_GET['id'];
include_once '../../class/cargo.php';
$cargo=new cargo;
$car=array_shift($cargo->mostrar($id));


include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td><?php campos("Nombre del Cargo","nombrecargo","text",$car['nombrecargo'],0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Descripción","descripcion","textarea",$car['descripcion'],0,array("cols"=>"50","rows"=>10));?></td>
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