<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Preguntas";

include_once("../../class/cargo.php");
$cargo=new cargo;
$car=todolista($cargo->mostrarTodo("","nombrecargo"),"codcargo","nombrecargo","");

$turno=array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
var linea=0;
$(document).on("ready",function(){
    $("#codcarrera").change(function(e) {
        $.post("grupo.php",{"codcarrera":($("#codcarrera").val())},function(data){
            $("#codgrupo").html(data);
        })
    });
    $(document).on("click",".aumentar",function(e){
		e.preventDefault();
		var posi=$(this).parent().parent();
		$.post("aumentar.php",{'l':linea},function(data){
			posi.before(data);
			
			
			linea++;
		});
	})
	
	$(".aumentar").click();
})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post">
    	<div class="prefix_0 grid_11 omega">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Cargo","codcargo","select",$car,0,array(""=>""));?></td>
					</tr>
                    
                </table>
                <table class="tablareg">
                    <tr class="titulo">
                        <td width="10">N</td>
                        <td>Pregunta</td>
                        <td>Repuestas</td>
                        <td>Repuesta Correcta</td>
                    </tr>    
                    <tr><td colspan="2"><a href="#" class="aumentar"><img src="../../imagenes/ico/nuevo1.png" height="15"> Aumentar</a></td><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
                
                
        	</fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>