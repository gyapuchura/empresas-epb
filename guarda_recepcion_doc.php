<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 			= date("Y-m-d");
$hora_recib     = date("H:i");
$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$gestion        = date("Y");

$idcorres = $_POST['idcorres'];
       

    $sql8 =" UPDATE corres SET fecha_recib='$fecha', hora_recib='$hora_recib' WHERE idcorres='$idcorres' ";
    $result8 = mysqli_query($sql8);

    header("Location: deriva_hoja_ruta_corres.php");

?>