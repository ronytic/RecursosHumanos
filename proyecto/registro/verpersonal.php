<?php
include_once("../../login/check.php");
include_once("../../class/personal.php");
include_once("../../class/cargo.php");
$codpersonal=$_POST['codpersonal'];
$personal=new personal;
$cargo=new cargo;
$per=$personal->mostrarTodo("codpersonal=".$codpersonal,0,"paterno,materno,nombres");
$per=array_shift($per);
$car=$cargo->mostrarTodo("codcargo=".$per['codcargo'],0,"");
$car=array_shift($car);
?>
<tr>
    <td><?php echo $car['nombrecargo']?></td>
    <td><?php echo ucwords($per['paterno'])?> <?php echo ucwords($per['materno'])?> <?php echo ucwords($per['nombres'])?></td>


                <td class="centrar">1<br><input type="radio" name="c[<?php echo $per['codpersonal']?>]" value="1"></td>
                <td class="centrar">2<br><input type="radio" name="c[<?php echo $per['codpersonal']?>]" value="2"></td>
                <td class="centrar">3<br><input type="radio" name="c[<?php echo $per['codpersonal']?>]" value="3"></td>
                <td class="centrar">4<br><input type="radio" name="c[<?php echo $per['codpersonal']?>]" value="4"></td>
                <td class="centrar">5<br><input type="radio" name="c[<?php echo $per['codpersonal']?>]" value="5"></td>

    <td><a class="boton eliminar" href="#">Eliminar</a></td>
</tr>