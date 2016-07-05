<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/asistencia.php");
$asistencia=new asistencia;

extract($_POST);
//empieza la copia de archivos

if( $_FILES['excel']['size']<="500000000"){
	@$excel=$_FILES['excel']['name'];
	@copy($_FILES['excel']['tmp_name'],"../excel/".$_FILES['excel']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
}
$excel="Formato Ingreso.xlsx";
include_once("../php-excel-reader/excel_reader2.php");
include_once("../php-excel-reader/SpreadsheetReader.php");

$data = new SpreadsheetReader("../excel/".$excel);
/*echo "<pre>";
print_r($data);
echo "</pre>";
$BaseMem = memory_get_usage();

		$Sheets = $data -> Sheets();

		echo '---------------------------------'.PHP_EOL;
		echo 'Spreadsheets:'.PHP_EOL;
		print_r($Sheets);
		echo '---------------------------------'.PHP_EOL;
		echo '---------------------------------'.PHP_EOL;

		foreach ($Sheets as $Index => $Name)
		{
			echo '---------------------------------'.PHP_EOL;
			echo '*** Sheet '.$Name.' ***'.PHP_EOL;
			echo '---------------------------------'.PHP_EOL;

			$Time = microtime(true);

			$data -> ChangeSheet($Index);

			foreach ($data as $Key => $Row)
			{
				echo $Key.': ';
				if ($Row)
				{
					print_r($Row);
				}
				else
				{
					var_dump($Row);
				}
				$CurrentMem = memory_get_usage();
		
				echo 'Memory: '.($CurrentMem - $BaseMem).' current, '.$CurrentMem.' base'.PHP_EOL;
				echo '---------------------------------'.PHP_EOL;
		
				if ($Key && ($Key % 500 == 0))
				{
					echo '---------------------------------'.PHP_EOL;
					echo 'Time: '.(microtime(true) - $Time);
					echo '---------------------------------'.PHP_EOL;
				}
			}
		
			echo PHP_EOL.'---------------------------------'.PHP_EOL;
			echo 'Time: '.(microtime(true) - $Time);
			echo PHP_EOL;

			echo '---------------------------------'.PHP_EOL;
			echo '*** End of sheet '.$Name.' ***'.PHP_EOL;
			echo '---------------------------------'.PHP_EOL;
		}*/
/*
$valores=array(	"materno"=>"'$materno'",
				"paterno"=>"'$paterno'",
				"nombres"=>"'$nombres'",
				"fechanac"=>"'$fechanac'",
				"ci"=>"'$ci'",
				"sexo"=>"'$sexo'",
				"direccion"=>"'$direccion'",
				
				"telefono"=>"'$telefono'",
				"celular"=>"'$celular'",
				"email"=>"'$email'",
				"codcargo"=>"'$codcargo'",
				"turno"=>"'$turno'",
                "codcontrato"=>"'$codcontrato'",
                "iniciocontrato"=>"'$iniciocontrato'",
				"duracioncontrato"=>"'$duracioncontrato'",
                
				"foto"=>"'$foto'",
                "curriculum"=>"'$curriculum'",
				
				);
				$personal->insertar($valores);
				

$id=$personal->last_id();
$val=array("usuario"=>$id);
$personal->actualizar($val,$id);
*/
$asistencia->vaciar();
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Mensaje de Respuesta";
$folder="../../";
$listar=1;
include_once '../../mensajeresultado.php';
endif;?>