<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	extract($_POST);
    include_once("../../class/cargo.php");
    $cargo=new cargo;
    
    include_once("../../class/permiso.php");
    $permiso=new permiso;
    
    include_once("../../class/personal.php");
    $personal=new personal;
    
    $codcargo=$codcargo==""?"%":"$codcargo";
    $coddocente=$coddocente==""?"%":"$coddocente";
	$grupo=new cargo;
	$pr=$permiso->mostrarTodo("fechasalida LIKE '$fechasalida' and codpersonal IN(SELECT codpersonal FROM personal WHERE paterno LIKE '$paterno%' and materno LIKE '$materno%' and nombres LIKE '$nombres%' and codcargo LIKE '$codcargo')","");
	foreach($pr as $g){$i++;
        
        $per=array_shift($personal->mostrarTodo("codpersonal=".$g['codpersonal']." ","paterno,materno,nombres"));
        $car=array_shift($cargo->mostrarTodo("codcargo=".$per['codcargo'],"nombrecargo"));
		$datos[$i]['codpermiso']=$g['codpermiso'];
		$datos[$i]['cargo']=$car['nombrecargo'];
		$datos[$i]['motivo']=$g['motivo'];
        $datos[$i]['fechasalida']=$g['fechasalida'];
        
        $datos[$i]['personal']=$per['paterno']." ".$per['materno']." ".$per['nombre'];
        $datos[$i]['horasalida']=$g['horasalida'];
        $datos[$i]['horaretorno']=$g['horaretorno'];
        switch($g['estado']){
            case '0':{$estado="Pendiente";}break;    
            case '1':{$estado="Aprobado";}break;    
            case '2':{$estado="Denegado";}break;    
        }
        $datos[$i]['estado']=$estado;
	}
	
	$titulo=array("fechasalida"=>"Fecha de Salida","horasalida"=>"Hora Salida","horaretorno"=>"Hora Retorno","motivo"=>"Motivo de la Salida","cargo"=>"Cargo","personal"=>"Personal","estado"=>"Estado de la Solicitud");
	listadoTabla($titulo,$datos,1,"","","ver.php",array("Revisar"=>"revisar.php"));
}
?>