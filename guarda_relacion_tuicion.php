<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 		  = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idlegajo_ss  = $_SESSION['idlegajo_ss'];
$idempresa_ss = $_SESSION['idempresa_ss'];
$codigo_lp_ss = $_SESSION['codigo_lp_ss'];

$entidad          = $_POST['entidad'];
$relacion_tuicion = $_POST['relacion_tuicion'];

if ($entidad  == '' || $relacion_tuicion == '')
{
header("Location:relaciones_tuicion.php");
}
else {    

    $sql8 =" INSERT INTO relacion_tuicion (idlegajo, entidad, relacion_tuicion) ";
    $sql8.=" VALUES ('$idlegajo_ss','$entidad','$relacion_tuicion') ";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:relaciones_tuicion.php");

    }
?>