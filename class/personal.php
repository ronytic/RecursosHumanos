<?php
include_once("bd.php");
class personal extends bd{
	var $tabla="personal";
	function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,codpersonal,codcargo");	
		return $this->getRecords("usuario='$Usuario' and password=MD5('$Password') and activo=1");
	}
	function mostrars($cod){
		$this->campos=array("*");	
		return $this->getRecords("codusuarios='$cod' and activo=1");
	}
}
?>