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

$ley          = $_POST['ley'];
$fecha_com    = $_POST['fecha_aprob'];

$fecha_i       = explode('/',$fecha_com);
$fecha_aprob   = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$objetivo     = $_POST['objetivo'];

if ($ley == '' || $fecha_aprob == '' || $objetivo == '')
{
header("Location:legislacion_ep_vacio.php");
}
else {    

    $sql8 =" INSERT INTO legislacion (idlegajo, ley, fecha_aprob, objetivo ) ";
    $sql8.=" VALUES ('$idlegajo_ss','$ley','$fecha_aprob','$objetivo' ) ";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:legislacion_ep.php");

    }
?>