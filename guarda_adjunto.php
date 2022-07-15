<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('UTC');
$fecha 			= date("Y-m-d");
$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$gestion        = date("Y");

$idcorres = $_POST['idcorres'];

$iddocumento_adj = $_POST['iddocumento_adj'];
    
    $sql8 =" UPDATE corres SET iddocumento_adj='$iddocumento_adj' WHERE idcorres='$idcorres' ";
    $result8 = mysqli_query($link,$sql8);

    header("Location: para_adjuntar.php");

?>