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
$idarea_ss    = $_SESSION['idarea_ss'];

$idlegajo_ss  = $_SESSION['idlegajo_ss'];
$idempresa_ss = $_SESSION['idempresa_ss'];
$codigo_lp_ss = $_SESSION['codigo_lp_ss'];

if ($idempresa == '' || $version == '' || $gestion == '')
{
header("Location:nuevo_legajo.php");
}
else {
       
    $sqle="SELECT MAX(correlativo) FROM legajo WHERE gestion='$gestion'";
    $resulte=mysqli_query($link,$sqle);
    $rowe=mysqli_fetch_array($resulte);
    $correlativo=$rowe[0]+1;

    $codigo="SCEP-LEGP-".$correlativo."/".$gestion;
           
    $sql8="INSERT INTO legajo (gestion, correlativo, idusuario, idempresa, version, codigo ) ";
    $sql8.="VALUES ('$gestion','$correlativo','$idusuario_ss','$idempresa','$version','$codigo' ) ";
    $result8 = mysqli_query($link,$sql8);
    
    $idcorres = mysqli_insert_id($link);
    $_SESSION['idcorres_ss']= $idcorres;
    
    header("Location:legajos_permanentes.php");
    
    }
?>