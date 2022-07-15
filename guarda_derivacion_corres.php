<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');

$fecha 		  = date("Y-m-d");
$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idcorres_ss        =  $_SESSION['idcorres_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

$gestion      = date("Y");

$idusuariod     = $_POST['idusuariod'];
$idinstruccion  = $_POST['idinstruccion'];
$comentario     = $_POST['comentario'];

if ($idusuariod == '' || $idinstruccion == '' || $comentario == '' )
{
header("Location:deriva_comunicacion_corres.php");
}
else {


$sql3 = "UPDATE deriva_corres SET derivada='SI', recibida='SI' WHERE idderiva_corres='$idderiva_corres_ss'";
$result3 = mysqli_query($sql3);


$sql7 = " INSERT INTO deriva_corres (idcorres, idusuarioo, idusuariod, idinstruccion, comentario, fecha_deriva, fecha_recibe, derivada, recibida) ";
$sql7.= " VALUES ('$idcorres_ss','$idusuario_ss','$idusuariod','$idinstruccion','$comentario','$fecha','0000-00-00','SI','NO') ";
$result7 = mysqli_query($sql7);

$_SESSION['idusuariod_ss']    = $idusuariod;

header("Location:derivacion_exitosa.php");

}

?>