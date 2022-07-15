<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha 			= date("Y-m-d");

$gestion        = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss          = $_SESSION['idcorres_ss'];
$idbitacora_estado_ss = $_SESSION['idbitacora_estado_ss'];

$idestado  = $_POST['idestado'];
$resumen   = $_POST['resumen'];
    
    $sql8 =" UPDATE bitacora_estado SET idestado ='$idestado', resumen='$resumen' ";
    $sql8.="  WHERE idbitacora_estado ='$idbitacora_estado_ss' ";
    $result8 = mysqli_query($link,$sql8);

    header("Location: ajusta_actualizacion_hr.php");

?>