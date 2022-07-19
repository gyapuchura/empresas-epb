<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");
$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

$gestion      = date("Y");

$comentario_conclusion  = $_POST['comentario_conclusion'];


$sql3 = "UPDATE deriva_corres SET derivada='NO', recibida='NO' WHERE idderiva_corres='$idderiva_corres_ss'";
$result3 = mysqli_query($link,$sql3);


$sql7 = " UPDATE corres SET idestado='3', comentario_conclusion='$comentario_conclusion' WHERE idcorres='$idcorres_ss' ";
$result7 = mysqli_query($link,$sql7);

header("Location:mostrar_conclusion_hr.php");

?>