<?php
include_once("login/check.php");
//print_r($_SESSION);
$titulo="Inicio";
$_SESSION['idmenu']=0;
$_SESSION['subm']=0;
?>
<?php include_once("cabecerahtml.php"); ?>
<link href="css/default/default.css" type="text/css" rel="stylesheet" />
<link href="css/light/light.css" type="text/css" rel="stylesheet" />
<link href="css/nivo-slider.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<?php include_once("cabecera.php");?>
<div class="grid_6">
    <div class="contenido">
    	<div class="theme-light">
    	<div id="slider" class="nivoSlider">
                <img src="imagenes/inicio/1.jpg" />
                <img src="imagenes/inicio/3.png" />
                <img src="imagenes/inicio/2.jpg" />
                <img src="imagenes/inicio/4.jpg" />
		</div>
        </div>
    </div>
</div>
<div class="grid_6">
    <div class="contenido textoinicio">
    	<h3>Visión</h3>
    El vídeo proporciona una manera eficaz para ayudarle a demostrar el punto. Cuando haga clic en Vídeo en línea, puede pegar el código para insertar del vídeo que desea agregar.
También puede escribir una palabra clave para buscar en línea el vídeo que mejor se adapte a su documento.Para otorgar a su documento un aspecto profesional, Word proporciona encabezados, pies de página, páginas de portada y diseños de cuadro de texto que se complementan entre sí.

    </div>
</div>
<?php include_once("piepagina.php");?>