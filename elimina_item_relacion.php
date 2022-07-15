<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idlegajo_ss  = $_SESSION['idlegajo_ss'];
$idempresa_ss = $_SESSION['idempresa_ss'];
$codigo_lp_ss = $_SESSION['codigo_lp_ss'];

$idrelacion_tuicion = $_POST['idrelacion_tuicion'];

/* BORRAMOS EL REGISTRO DE LA ACTUALIZACION DE ESTADO */

$sql = " DELETE FROM relacion_tuicion WHERE idrelacion_tuicion ='$idrelacion_tuicion'";
$result = mysqli_query($link,$sql);

header("Location:relaciones_tuicion.php");
?>
