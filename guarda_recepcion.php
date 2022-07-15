<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");
$hora           		= date("H:i");

$idusuario_ss   =  $_SESSION['idusuario_ss'];
$idnombre_ss    =  $_SESSION['idnombre_ss'];

$idderiva_corres = $_POST['idderiva_corres'];


$sql0 = " UPDATE deriva_corres SET derivada='NO', recibida='SI', fecha_recibe='$fecha', hora_recibe='$hora' WHERE idderiva_corres='$idderiva_corres'";
$result0 = mysqli_query($link,$sql0);

$_SESSION['idderiva_corres_ss']  = $idderiva_corres;

header("Location:hoja_ruta_recibida.php");

?>