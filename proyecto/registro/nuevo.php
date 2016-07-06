<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Proyecto";

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
    $("#codcargo").change(function(e) {
        $.post("personal.php",{"codcargo":($("#codcargo").val())},function(data){
            $("#codpersonal").html(data);
        })
    });
    $(document).on("click","#asignar",function(e){
		e.preventDefault();
		var posi=$("#aumentar").parent().parent();
        var codpersonal=$("#codpersonal").val()
        //alert(codpersonal);
		$.post("verpersonal.php",{'codpersonal':codpersonal},function(data){
			posi.before(data);
			

		});
	})
	$( document).on("click",".eliminar",function(e){
        e.preventDefault();
        $(this).parent().parent().remove();        
    });

})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post">
    	<div class="prefix_0 grid_11 omega">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <fieldset>
                    
                
                <table class="tablareg">
                    <tr>
                        <td colspan="3"><?php campos("Nombre del Proyecto","nombreproyecto","text","",1,array("size"=>"90"));?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><?php campos("Descripción del Proyecto","descripcionproyecto","textarea","",1,array("cols"=>"90"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Fecha de Inicio","fechainicio","date",date("Y-m-d"),1,array("size"=>"90"));?></td>
                        <td><?php campos("Fecha de Finalización","fechafinalizacion","date",date("Y-m-d"),1,array("size"=>"90"));?></td>
                    </tr>
                </table>
                </fieldset>
                   <fieldset>
                    <legend>Asignación de Personal al Proyecto</legend>
                    
                    <table class="tablareg">
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
						<td width="250"><?php campos("Cargo","codcargo","select",$car,0,array(""=>""));?></td>
                        <td><?php campos("Personal","codpersonal","select","",0,array(""=>""));?></td>
                        <td>
                            <br><?php campos("","asignar","button","Asignar",0,array("class"=>"boton"));?>
                        </td>
					</tr>
                    
                </table>
                   </fieldset>
                
                <table class="tablareg">
                    <tr class="titulo">
                        <td width="50">Cargo</td>
                        <td>Apellido y Nombres</td>
                        <td colspan="5">Calificación</td>
                        <td width="50"></td>
                    </tr>    
                    <tr><td colspan="2"><a id="aumentar"></a></td><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
                
                
        	</fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>