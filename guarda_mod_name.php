<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$idusuario_adm_ss  =  $_SESSION['idusuario_adm_ss'];
$idnombre_adm_ss   =  $_SESSION['idnombre_adm_ss'];

$gestion     = date("Y");

$nombres   	 = $_POST['nombres'];
$paterno	 = $_POST['paterno'];
$materno     = $_POST['materno'];
$ci          = $_POST['ci'];
$exp         = $_POST['exp'];
$titulo      = $_POST['titulo'];
    
$sql8 =" UPDATE nombres SET nombres='$nombres', paterno='$paterno', materno='$materno', ci='$ci', ";
$sql8.=" exp='$exp', titulo='$titulo' WHERE idnombre='$idnombre_adm_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:modifica_usuario.php");

?>