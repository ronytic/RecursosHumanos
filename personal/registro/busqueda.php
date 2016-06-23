<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/personal.php';
	include_once '../../class/cargo.php';
	extract($_POST);
	$codcargo=$codcargo?"codcargo='$codcargo'":"codcargo LIKE '%'";
	$sexo=$sexo!=""?"sexo LIKE '$sexo'":"sexo LIKE '%'";
	$personal=new personal;
	$cargo=new cargo;
	$al=$personal->mostrarTodo("paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nombres LIKE '%$nombres%' and $sexo and $codcargo and codcargo!=1","paterno,materno,nombres,codcargo");
	$i=0;
	foreach($al as $a){$i++;
		$car=array_shift($cargo->mostrar($a['codcargo']));
		$d[$i]['codpersonal']=$a['codpersonal'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['cargo']=$car['nombrecargo'];
        $d[$i]['grupo']=$gr['nombregrupo'];
		$d[$i]['sexo']=$a['sexo']?'Masculino':'Femenino';
		$d[$i]['turno']=$a['turno'];
        $d[$i]['codcontrato']=$a['codcontrato'];
		$d[$i]['telefono']=$a['telefono'];
		$d[$i]['celular']=$a['celular'];
        $d[$i]['curriculum']='<a href="../curriculum/'.$a['curriculum'].'" target="_blank">'.$a['curriculum'].'</a>';
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","sexo"=>"Sexo","cargo"=>"Cargo","telefono"=>"Teléfono","celular"=>"Celular","turno"=>"Turno","codcontrato"=>"Cod.Contrato","curriculum"=>"Curriculum");
	listadoTabla($titulo,$d,1,"modificar.php","eliminar.php","ver.php");
}
?>