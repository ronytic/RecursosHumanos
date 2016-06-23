<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar datos de Personal";
$id=$_GET['id'];
include_once '../../class/personal.php';
$personal=new personal;
$al=array_shift($personal->mostrar($id));

include_once("../../class/cargo.php");
$cargo=new cargo;
$car=todolista($cargo->mostrarTodo(),"codcargo","nombrecargo","");

$foto="../foto/".$al['foto'];
if(!file_exists($foto) && $al['foto']!=""){
	$foto="../foto/0.jpg";
}
$turno=array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#codcarrera").change(actualizar);
    actualizar();
    function actualizar() {
        $.post("grupo.php",{"codcarrera":($("#codcarrera").val())},function(data){
            $("#codgrupo").html(data);
        })
    }
})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="actualizar.php" method="post" enctype="multipart/form-data">
        <?php campos("","id","hidden",$id);?>
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
						<td><?php campos("Apellido Paterno","paterno","text",$al['paterno'],1,array("required"=>"required"));?></td>
                        <td><?php campos("Apellido Materno","materno","text",$al['materno'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text",$al['nombres'],0,array("required"=>"required"));?></td>
						<td><?php campos("Fecha Nacimiento","fechanac","date",$al['fechanac'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("C.I.","ci","number",$al['ci'],0,array("required"=>"required"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"),0,"",$al['sexo']);?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Dirección","direccion","text",$al['direccion'],0,array("required"=>"required","size"=>53));?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono Casa","telefono","text",$al['telefono'],0,array("required"=>"required"));?></td>
						<td><?php campos("Celular","celular","text",$al['celular'],0,array("required"=>"required"));?></td>
					</tr>
                   <tr>
                    <td><?php campos("Correo","email","text",$al['email'],0,array("required"=>"required"));?></td>
                   </tr>

				</table>
			</fieldset>
		</div>
        <div class="prefix_0 grid_5">
			<fieldset>
				<div class="titulo">Datos Secundarios</div>
                 <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Cargo","codcargo","select",$car,0,"",$al['codcargo']);?></td>
						
					</tr>
                    <tr>
                    <td colspan="2"><?php campos("Turno","turno","select",$turno,0,"",$al['turno']);?></td>
                    </tr>
                	<tr>
                    	<td><?php campos("Código de Contrato","codcontrato","text",$al['codcontrato']);?></td>
                        <td><?php campos("Inicio de Contraro","iniciocontrato","date",date("Y-m-d"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Duración del Contraro","duracioncontrato","text",$al['duracioncontrato']);?></td>
                        <td colspan="1"><?php campos("Item","item","select",array(0=>"No","1"=>"Si"),0,"",$al['item']);?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Foto","foto","file","",0,array(""=>""));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Curriculum","curriculum","file","",0,array(""=>""));?></td>
					</tr>
                    <tr><td>
                        <?php if($al['foto']!=""){?>
                        <hr class="separador">
                        <a href="<?php echo $foto?>" target="_blank">
                            <img src="<?php echo $foto?>" width="100" height="100">
                            <br>
                            Abrir en otra Ventana
                        </a>
                        <?php }?>
                        </td>
                        <td>
                        <?php if($al['curriculum']!=""){?>
                        <hr class="separador">
                        <a href="../curriculum/<?php echo $al['curriculum']?>" target="_blank">
                            Curriculum
                            <br>
                            Abrir en otra Ventana
                        </a>
                        <?php }?>
                        </td>
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