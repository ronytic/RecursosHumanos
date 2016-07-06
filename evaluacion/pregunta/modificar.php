<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Preguntas";

include_once("../../class/cargo.php");
$cargo=new cargo;
$car=todolista($cargo->mostrarTodo("","nombrecargo"),"codcargo","nombrecargo","");
include_once("../../class/pregunta.php");
$pregunta=new pregunta;
$pr=$pregunta->mostrarTodo("codpregunta=".$_GET['id'],"");
$pr=array_shift($pr);

$turno=array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    	<div class="prefix_0 grid_11 omega">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Cargo","codcargo","select",$car,0,array(""=>""),$pr['codcargo']);?></td>
					</tr>
                    
                </table>
                <table class="tablareg">
                    <tr class="titulo">
                        <td width="10">N</td>
                        <td>Pregunta</td>
                        <td>Repuestas</td>
                        <td>Repuesta Correcta</td>
                    </tr> 
                    <tr>
                        <td class="der">1</td>
                        <td><input type="text" name="pregunta" size="30" value="<?php echo $pr['pregunta']?>"></td>
                        <td>R1:<input type="text" name="opcion1" size="20" value="<?php echo $pr['opcion1']?>"><br>
                        R2:<input type="text" name="opcion2" value="<?php echo $pr['opcion2']?>"><br>
                        R3:<input type="text" name="opcion3" value="<?php echo $pr['opcion3']?>"><br>
                        R4:<input type="text" name="opcion4" value="<?php echo $pr['opcion4']?>"><br>
                        R5:<input type="text" name="opcion5" value="<?php echo $pr['opcion5']?>"></td>
                        <td><select name="respuesta">
                            <option value="1" <?php echo $pr['respuesta']=="1"?'selected="selected"':'';?>>1</option>
                            <option value="2" <?php echo $pr['respuesta']=="2"?'selected="selected"':'';?>>2</option>
                            <option value="3" <?php echo $pr['respuesta']=="3"?'selected="selected"':'';?>>3</option>
                            <option value="4" <?php echo $pr['respuesta']=="4"?'selected="selected"':'';?>>4</option>
                            <option value="5" <?php echo $pr['respuesta']=="5"?'selected="selected"':'';?>>5</option>
                        </select></td>
                    </tr>   
                    <tr><td colspan="2"></td><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
                
                
        	</fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>