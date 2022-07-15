<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$link0=Conectarse();
$sql0 = " SELECT * FROM procesos ";
$result0 = mysql_query($sql0, $link0);
$total = mysql_num_rows($result0);
?>
<html>

<head>
  <title>Envio a Financiera</title>
</head>

<body>

AGREGAR CAMBIOS A TABLA PROCESOS
CAMBIO DE ESTADO= ENVIADO A FINANCIERA:

<form name="FORM1" action="modifica_estado.php" method="post">
 <input type="submit" value="MODIFICAR">

</form>



</body>

</html>