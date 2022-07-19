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

$iditem_archivo = $_POST['iditem_archivo'];

/* BORRAMOS EL REGISTRO DE LA ACTUALIZACION DE ESTADO */

$sql = " DELETE FROM item_archivo WHERE iditem_archivo ='$iditem_archivo'";
$result = mysqli_query($link,$sql);

header("Location:elab_formulario.php");
?>