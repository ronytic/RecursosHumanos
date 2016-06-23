<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Personal";

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
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
						<td><?php campos("Apellido Paterno","paterno","text","",1,array("required"=>"required"));?></td>
                        <td><?php campos("Apellido Materno","materno","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Fecha Nacimiento","fechanac","date","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("C.I.","ci","number","",0,array("required"=>"required"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"));?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Dirección","direccion","text","",0,array("required"=>"required","size"=>53));?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono Casa","telefono","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Celular","celular","text","",0,array("required"=>"required"));?></td>
					</tr>
                   <tr>
                    <td><?php campos("Correo","email","text","",0,array("required"=>"required"));?></td>
                   </tr>

				</table>
			</fieldset>
		</div>
        <div class="grid_5 ">
			<fieldset>
				<div class="titulo">Datos Secundarios</div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Cargo","codcargo","select",$car);?></td>
						
					</tr>
                    <tr>
                    <td colspan="2"><?php campos("Turno","turno","select",$turno);?></td>
                    </tr>
                	<tr>
                    	<td><?php campos("Código de Contrato","codcontrato","text","");?></td>
                        <td><?php campos("Inicio de Contraro","iniciocontrato","date",date("Y-m-d"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Duración del Contraro","duracioncontrato","text","");?></td>
                        <td colspan="1"><?php campos("Item","item","select",array(0=>"No","1"=>"Si"));?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Foto","foto","file","",0,array(""=>""));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Curriculum","curriculum","file","",0,array(""=>""));?></td>
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