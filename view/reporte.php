<?php

	require_once("dompdf/dompdf_config.inc.php");


$codigoHTML='<html>
<head>
<style>
	table, th, td {
   border: 1px solid black;
}
	.flotante{
		float: left;
		width: 50%;
		height: 100px;
	}


</style>
</head>
<body>
	<div class="flotante"><img src="img/logo.jpg" width="300px"></div><div class="flotante"> <center> <h5>7120 Hayvenhurts Avenue #111 Van Nuys, ca 91344 <br> TEL: 818-582-5912 <br> Mail: Quickarentals@gmail.com</h5> </center></div>
	<br>
	<div>
	
	<div>
</body>
</html>
';




$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("ListadoEmpleado.pdf");


?>





