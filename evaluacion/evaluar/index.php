<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Realizar Evaluación";
print_r($_SESSION);
$codcargo=$_SESSION['codcargo'];
include_once("../../class/cargo.php");
$cargo=new cargo;
$car=array_shift($cargo->mostrarTodo("codcargo=".$codcargo,"nombrecargo"));

include_once("../../class/pregunta.php");
$pregunta=new pregunta;
$pr=$pregunta->mostrarTodo("codcargo=".$codcargo);

$turno=array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">

</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    	<div class="prefix_0 grid_11 omega">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><b>Cargo: <?php echo $car['nombrecargo'];?></b></td>
					</tr>
                    
                </table>
                <table class="tablareg">
                    <tr class="titulo">
                        <td width="10">N</td>
                        <td>Pregunta</td>
                        <td>Repuestas</td>
                    </tr> 
                    <?php
                    $i=0;
                     foreach($pr as $p){$i++;?>
                    <tr>
                        <td class="der"><?php echo $i;?></td>
                        <td><?php echo $p['pregunta']?></td>
                        <td><input type="radio" name="r[<?php echo $p['codpregunta']?>]" size="20" value="1"><?php echo $p['opcion1']?><br>
                        <input type="radio" name="r[<?php echo $p['codpregunta']?>]" size="20" value="2"><?php echo $p['opcion2']?><br>
                        <input type="radio" name="r[<?php echo $p['codpregunta']?>]" size="20" value="3"><?php echo $p['opcion3']?><br>
                        <input type="radio" name="r[<?php echo $p['codpregunta']?>]" size="20" value="4"><?php echo $p['opcion4']?><br>
                        <input type="radio" name="r[<?php echo $p['codpregunta']?>]" size="20" value="5"><?php echo $p['opcion5']?><br>
                            </td>
                    </tr>   
                    <?php }?>
                    <tr><td colspan="2"></td><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
                
                
        	</fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>