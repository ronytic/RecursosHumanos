<?php
include_once("db.php");
class logpersonal extends bd{
	var $tabla="logpersonal";
	function estadoTabla(){
		return $this->statusTable();
	}
	function insertarRegistro($Values){
		$this->insertRow($Values,1,0);
	}
}
?>