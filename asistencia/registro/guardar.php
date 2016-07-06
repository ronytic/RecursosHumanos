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
//$excel="Formato Ingreso.xls";
include_once("../php-excel-reader/excel_reader2.php");
include_once("../php-excel-reader/SpreadsheetReader.php");

$data = new SpreadsheetReader("../excel/".$excel);
$data->ChangeSheet(0);
$i=0;
$asistencia->vaciar();
foreach ($data as $Key => $Row){
    if($Row[0]!="N"){
    /*echo "<pre>";
    print_r($Row);
    echo "</pre>";*/
    
    $valores=array(	"ci"=>"'".$Row[1]."'",
				"fechaasistencia"=>"'".date("Y-m-d",strtotime($Row[2]))."'",
				"horaingreso1"=>"'".$Row['4']."'",
				"horasalida1"=>"'".$Row['5']."'",
				"tiempotemprano1"=>"'".$Row['6']."'",
				"tiempotarde1"=>"'".$Row['7']."'",
				"horaingreso2"=>"'".$Row['8']."'",
				"horasalida2"=>"'".$Row['9']."'",
				"tiempotemprano2"=>"'".$Row['10']."'",
				"tiempotarde2"=>"'".$Row['11']."'",
                "horaingreso3"=>"'".$Row['12']."'",
				"horasalida3"=>"'".$Row['13']."'",
				"tiempotemprano3"=>"'".$Row['14']."'",
				"tiempotarde3"=>"'".$Row['15']."'",
				
				);
           /* echo "<pre>";
            print_r($valores);
            echo "</pre>";      */
				$asistencia->insertar($valores);
    
    }

}

/*$Sheets = $data -> Sheets();

foreach ($Sheets as $Index => $Name){
    $data -> ChangeSheet($Index);
    foreach ($data as $Key => $Row){
		//echo $Key.': ';
        if ($Row)
        {
            print_r($Row);
        }
        else
        {
            //var_dump($Row);
        }
    }
}*/

//
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Mensaje de Respuesta";
$folder="../../";
$listar=1;
include_once '../../mensajeresultado.php';
endif;?>