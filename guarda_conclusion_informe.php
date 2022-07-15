<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
$fecha 		  = date("Y-m-d");
$gestion      =  date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$ideventoi = $_POST['ideventoi'];
$sql_p = "SELECT conformidad FROM eventoi WHERE ideventoi='$ideventoi'";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);

 if ($row_p[0] == 'SI') {
     
    $sql0 = " UPDATE eventoi SET conformidad = 'CONCLUIDO' ";
    $sql0.= " WHERE ideventoi='$ideventoi' ";
    $result0 = mysqli_query($link,$sql0);

    header("Location:mostrar_conclusion_informe.php");
 } else {
    header("Location:mostrar_conformidad_consolidacion.php");
 }
 


?>