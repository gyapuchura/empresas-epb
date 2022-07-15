<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");
$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$idempresa   	= $_POST['idempresa'];
$version        = $_POST['version'];
$gestion	    = $_POST['gestion'];


if ($idempresa == '' || $version == '' || $gestion == '')
{
header("Location:nuevo_legajo.php");
}
else {

    $sql = "  SELECT idlegajo, codigo, idempresa, version, gestion ";
    $sql.= "  FROM legajo WHERE idempresa='$idempresa' AND version='$version' AND gestion='$gestion' ";
    $result = mysqli_query($link,$sql);
    if ($row = mysqli_fetch_array($result)){
    mysqli_field_seek($result,0);
    while ($field = mysqli_fetch_field($result)){
    } do {
   
         header("Location:legajo_existe.php");
    
    } while ($row = mysqli_fetch_array($result));
    } else {
        
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
}
?>