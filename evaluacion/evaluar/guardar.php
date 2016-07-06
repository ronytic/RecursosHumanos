<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/respuesta.php");
$resp=new respuesta;

include_once("../../class/respuestageneral.php");
$respuestageneral=new respuestageneral;

include_once("../../class/pregunta.php");
$pregunta=new pregunta;

$codcargo=$_SESSION['codcargo'];
$codpersonal=$_SESSION['codpersonal'];
extract($_POST);
/*echo "<pre>";
print_r($_POST);
echo "</pre>";
/*exit();*/
$i=0;
$tsi=0;
foreach($r as $codpregunta=>$respuesta){$i++;
    //echo $codpregunta;
    //echo $respuesta;
    $pre=array_shift($pregunta->mostrarTodo("codpregunta=".$codpregunta,""));
    $estado=$pre['respuesta']==$respuesta?'Si':'No';
$valores=array(	"codcargo"=>"'$codcargo'",
				"codpersonal"=>"'$codpersonal'",
				"codpregunta"=>"'$codpregunta'",
				"respuesta"=>"'$respuesta'",
				"estado"=>"'$estado'",
				);
/*echo "<pre>";
print_r($valores);
echo "</pre>";             */
				$resp->insertar($valores);
     if($estado=="Si"){
        $tsi++;    
     }
				
}
$valores=array(	"codcargo"=>"'$codcargo'",
				"codpersonal"=>"'$codpersonal'",
				"correctas"=>"'$tsi'",
				"incorrectas"=>"'".($i-$tsi)."'",
				"total"=>"'$$i'",
                "porcentaje"=>"'$porcentaje'",
				);
$respuestageneral->insertar($valores);
$porcentaje=$tsi*100/$i;
$nuevo=0;
$listar=1;
$archivonuevo="../../";
$textonuevo="INICIO";
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$mensaje[]="RESULTADO DE LA EVALUACIÓN: <br><br>Respuestas Correctas: $tsi/$i<br><br>Porcentaje: ". number_format($porcentaje,2)."%";
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>