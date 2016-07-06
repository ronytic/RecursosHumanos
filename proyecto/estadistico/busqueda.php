<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	
	extract($_POST);
    include_once '../../class/proyecto.php';
	$proyecto=new proyecto;
    include_once '../../class/proyectopersonal.php';
	$proyectopersonal=new proyectopersonal;
    include_once '../../class/personal.php';
	$personal=new personal;
    include_once '../../class/cargo.php';
	$cargo=new cargo;

	$pro=array_shift($proyecto->mostrar($codproyecto));
    
    $val=array();
    
    foreach($proyectopersonal->mostrarTodo("codproyecto=".$codproyecto) as $pp){
        $per=array_shift($personal->mostrar($pp['codpersonal']));
        $car=array_shift($cargo->mostrar($per['codcargo']));
        $val[ucwords($car['nombrecargo']."-".$per['paterno']." ".$per['materno']." ".$per['nombres'])]=$pp['puntaje'];
    }
    
    //print_r($val);

}
?>
<div id="container"></div>
<script language="javascript">
$(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Estadística del Proyecto: <?php echo $pro['nombreproyecto']?>'
            },
            subtitle: {
            text: 'Desempeño del Personal en el Proyecto<br>Fecha de Inicio: <b><?php echo $pro['fechainicio']?></b> - Fecha de Finalización: <b><?php echo $pro['fechafinalizacion']?></b>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Puntaje',
                colorByPoint: true,
                data: [
                <?php foreach($val as $k=>$v){?>
                 {
                    name: '<?php echo $k?>',
                    y: <?php echo $v?>
                },<?php }?>]
            }]
        });
    });
</script>