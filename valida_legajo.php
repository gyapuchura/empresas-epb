<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$gestion      = date("Y");

$idlegajo     = $_POST['idlegajo'];
$idempresa    = $_POST['idempresa'];
$codigo       = $_POST['codigo'];

$_SESSION['idlegajo_ss']  = $idlegajo;
$_SESSION['idempresa_ss'] = $idempresa;
$_SESSION['codigo_lp_ss'] = $codigo;

header("Location:legislacion_ep.php");

?>