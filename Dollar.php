<!DOCTYPE html>

<html>
<head>
  <title>Mercados</title>
  <link rel="stylesheet" href="css/mercado.css">
  <!--[if IE 7]><link rel="stylesheet" href="css/mercado-ie7.css"><![endif]-->
</head>
<body>


<?php 
	header('content-type:text/html;charset=utf-8');
	$url = "http://www.infobae.com/adjuntos/servicios/cotizacion.json";
	$data_json = @file_get_contents($url);
	if(strlen($data_json)>0)
	{
	  	$data = json_decode($data_json,true);

		if(is_array($data))
		{
			$dolarOficial 	= $data[0]['dÃ³lar oficial']['compra']['precio'];
			$dolarBlue		= $data[0]['dÃ³lar blue']['compra']['precio'];
			$dolarTarjeta	= $data[0]['dÃ³lar tarjeta']['compra']['precio'];
			$simboloOficial 	= $data[0]['dÃ³lar oficial']['compra']['delta'];
			$simboloBlue		= $data[0]['dÃ³lar blue']['compra']['delta'];
			$simboloTarjeta	= $data[0]['dÃ³lar tarjeta']['compra']['delta'];
		}

echo '<div class="mercados-sidebar " id="mercados" style="width: 380px;position: static; top: auto; left: auto; right: auto;"><h2 style="font-family: Arial;padding: 0px !important;">Cotizaci&oacute;n Actual:</h2>';
		echo '<div class="indicadores clearfix">
<div id="mercados-d-tar" class="clearfix"><span class="currency">D&oacute;lar Oficial:</span><span class="currency-val">'.$dolarOficial.'';

?>

<?php
if ($simboloOficial == 0) {
    echo "<i class='icon-igual'></i></span> </div>";
} elseif ($simboloOficial == 1) {
    echo "<i class='icon-sube'></i></span> </div>";
} else {
    echo "<i class='icon-baja'></i></span> </div>";
}
?>


<?php
		
		echo '<div id="mercados-d-tar" class="clearfix" ><span class="currency">D&oacute;lar Blue:</span><span class="currency-val">'.$dolarBlue.'';
	?>	

<?php
if ($simboloBlue == 0) {
    echo "<i class='icon-igual'></i></span> </div>";
} elseif ($simboloBlue == 1) {
    echo "<i class='icon-sube'></i></span> </div>";
} else {
    echo "<i class='icon-baja'></i></span> </div>";
}
?>






<?php
		echo '<div id="mercados-d-tar" class="clearfix"><span class="currency">D&oacute;lar Tarjeta:</span> <span class="currency-val">'.$dolarTarjeta.'';
	
	}
?>


<?php
if ($simboloTarjeta == 0) {
    echo "<i class='icon-igual'></i></span> </div></div>";
} elseif ($simboloTarjeta == 1) {
    echo "<i class='icon-sube'></i></span> </div></div>";
} else {
    echo "<i class='icon-baja'></i></span> </div></div>";
}
?>





<?php
echo "<div style='color: #111;font-size: 10px;font-family: arial;float: right;padding-right: 60px;padding-top: 10px;'>Última Actualizaci&oacute;n: ";
echo date("m/d/Y h:i:s a", time());
echo "</div></div>";

?>


</body>
</html>
