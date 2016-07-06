<?php
include_once("../../login/check.php");
$titulo="Gráfica Estadistica de Proyectos";
$folder="../../";


include_once '../../class/proyecto.php';
$proyecto=new proyecto;
$pro=todolista($proyecto->mostrarTodo("","nombreproyecto"),"codproyecto","nombreproyecto","");

include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<script type="text/javascript" src="../../js/highcharts.js"></script>
<script type="text/javascript" src="../../js/exporting.js"></script>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_6 prefix_3 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombre del Proyecto","codproyecto","select",$pro,1,array("size"=>15));?></td>
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
