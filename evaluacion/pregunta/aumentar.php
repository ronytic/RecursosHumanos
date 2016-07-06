<?php
$l=$_POST['l'];
$l++;?>
<tr>
<td class="der"><?php echo $l;?></td>
<td><input type="text" name="p[<?php echo $l?>][pregunta]" size="30"></td>
<td>R1:<input type="text" name="p[<?php echo $l?>][opcion1]" size="20"><br>
R2:<input type="text" name="p[<?php echo $l?>][opcion2]"><br>
R3:<input type="text" name="p[<?php echo $l?>][opcion3]"><br>
R4:<input type="text" name="p[<?php echo $l?>][opcion4]"><br>
R5:<input type="text" name="p[<?php echo $l?>][opcion5]"></td>
<td><select name="p[<?php echo $l?>][respuesta]">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select></td>
</tr>