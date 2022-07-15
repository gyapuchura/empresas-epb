<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss   =  $_SESSION['idusuario_ss'];
$idnombre_ss    =  $_SESSION['idnombre_ss'];

$inicializacion   = $_POST['inicio'];
$finalizacion     = $_POST['finalizacion'];


$fecha_i        = explode('/',$inicializacion);
$inicio         = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$fecha_f        = explode('/',$finalizacion);
$fin            = $fecha_f[2].'-'.$fecha_f[1].'-'.$fecha_f[0];

$_SESSION['inicio_ss'] = $inicio;
$_SESSION['fin_ss']    = $fin;

header("Location:por_fechas.php");

?>