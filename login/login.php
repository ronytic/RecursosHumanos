<?php
session_start();
@set_magic_quotes_runtime(0);
//header("Content-Type: text/html;charset=utf-8");
if(!empty($_POST)){
	include_once("../config.php");
	include_once("../basedatos.php");
	include_once("../class/personal.php");
	include_once("../class/logpersonal.php");
	$personal=new personal;
	$logpersonal=new logpersonal;
	$url=$_POST['u'];
	$u=explode($directory."/",$_POST['u']);
	
	if(isset($_POST['usuario'],$_POST['pass']) && $_POST['usuario']!="" && $_POST['pass']!=""){
		$usuario=($_POST['usuario']);
		$pass=$_POST['pass'];
//		$usuario=str_replace("ñ","n",$usuario);
		$usuarioAl=str_replace(array("ñ","Ñ"),array("n","N"),$usuario);
		$usuarioAl=strtolower($usuarioAl);
		
	//	echo $usuarioAl;
		$agente=$_SERVER['HTTP_USER_AGENT'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$lenguaje=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$referencia= $_SERVER['HTTP_REFERER'];
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		//if(ereg('^[a-z]*[a-z]$',$usuario)){
			//Administrador 1 2 3 4
			
			$reg=$personal->loginUsuarios($usuario,$pass);
			$reg=array_shift($reg);
			$sw=1;
		//}else{
			header("Location:./?u=".$url.'&error=1');		
		//}
		$codpersonal=$reg['codpersonal'];
		
		if($sw){
			$codcargo=$reg['codcargo'];
		}
		
		
		if($reg['Can']==1){
			$valuesLog=array(
				"codpersonal"=>$codpersonal,
				"codcargo"=>$codcargo,
				"url"=>"'$url'",
				"fechalog"=>"'$fecha'",
				"horalog"=>"'$hora'",
				"agente"=>"'$agente'",
				"ip"=>"'$ip'",
				"referencia"=>"'$referencia'",
				"lenguaje"=>"'$lenguaje'"
			);
			$logpersonal->insertar($valuesLog,0);
			session_register("codpersonal");
			session_register("login");
			session_register("nivel");
			session_register("horasesion");
			session_register("idmenu");
			session_register("subm");
			$_SESSION['codpersonal']=$codpersonal;
			$_SESSION['login']=1;
			$_SESSION['codcargo']=$codcargo;
			$_SESSION['horasesion']=date("H:i:s");
            //echo "Valido";
			header("Location:../".$u[1]);
		}
		else{
			header("Location:./?u=".$url.'&error=1');
			//echo "Location:./?u=".$url;
            //echo "error";
		}
		//mysql_close($l);
	}else{
		header("Location:./?u=".$url.'&incompleto=1');	
        //echo "incompleto";
	}
}
?>
