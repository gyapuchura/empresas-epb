<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss    = $_SESSION['idusuario_ss'];
$idnombre_ss     = $_SESSION['idnombre_ss'];

$idcorres        = $_POST['idcorres'];
$idderiva_corres = $_POST['idderiva_corres'];

$_SESSION['idcorres_ss']        = $idcorres;
$_SESSION['idderiva_corres_ss'] = $idderiva_corres;

header("Location:deriva_hoja_ruta_corres.php");

?>