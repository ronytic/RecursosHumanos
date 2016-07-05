<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Cargado de Archivo de Asistencia";

include_once("../../class/cargo.php");
$cargo=new cargo;
$car=todolista($cargo->mostrarTodo("","nombrecargo"),"codcargo","nombrecargo","");

$turno=array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#codcarrera").change(function(e) {
        $.post("grupo.php",{"codcarrera":($("#codcarrera").val())},function(data){
            $("#codgrupo").html(data);
        })
    });
})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post" enctype="multipart/form-data">
    	<div class="prefix_3 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Seleccione Archivo Excel","excel","file","",0,array(""=>""));?></td>
					</tr>
                    <tr><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
        	</fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>