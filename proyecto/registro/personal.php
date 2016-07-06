<?php
include_once("../../login/check.php");
include_once("../../class/personal.php");
$codcargo=$_POST['codcargo'];
$personal=new personal;
$per=$personal->mostrarTodo("codcargo=".$codcargo,0,"paterno,materno,nombres");
?>
<?php foreach($per as $p){?>
<option value="<?php echo $p['codpersonal']?>"><?php echo $p['paterno']?> <?php echo $p['materno']?> <?php echo $p['nombres']?></option>
<?php }?>