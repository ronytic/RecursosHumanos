<?php
include_once("../../login/check.php");
$titulo="Listado de Solicitud de Permisos";
$folder="../../";

include_once("../../class/cargo.php");
$cargo=new cargo;
$car=todolista($cargo->mostrarTodo("","nombrecargo"),"codcargo","nombrecargo");

$garantia=array(1=>"Si",0=>"No");
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";

?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_6 prefix_0 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Cargo","codcargo","select",$car,0,array(""=>""));?></td>
                        <td><?php campos("Fecha de Solicitud","fechasalida","date",date("Y-m-d"),0,array("size"=>"15"));?></td>
                        <td><?php campos("Paterno","paterno","text","",0,array("size"=>"15"));?></td>
                        <td><?php campos("Materno","materno","text","",0,array("size"=>"15"));?></td>
                        <td><?php campos("Nombres","nombres","text","",0,array("size"=>"15"));?></td>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
