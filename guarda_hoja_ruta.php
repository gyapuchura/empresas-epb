<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha 			= date("Y-m-d");
$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$gestion        = date("Y");

$referencia   	= $_POST['referencia'];
$procedencia    = $_POST['procedencia'];
$no_control	    = $_POST['no_control'];
$fecha_com      = $_POST['fecha_corres'];
$origen         = $_POST['origen'];

$fecha_i        = explode('/',$fecha_com);
$fecha_corres   = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$anexo           = $_POST['anexo'];
$idtipo_hojaruta = $_POST['idtipo_hojaruta'];

if ($referencia == '' || $procedencia == '' || $anexo == '' || $origen == '')
{
header("Location:nueva_hoja_ruta.php");
}
else {
    
    $sql = "  SELECT idcorres, gestion, correlativo, idusuario, no_control ";
    $sql.= "  FROM corres WHERE  no_control= '$no_control' AND origen='EXTERNA' ";
    $result = mysqli_query($link,$sql);
    if ($row = mysqli_fetch_array($result)){
    mysqli_field_seek($result,0);
    while ($field = mysqli_fetch_field($result)){
    } do {
   
         header("Location:hoja_ruta_existe.php");
    
    } while ($row = mysqli_fetch_array($result));
    } else {


if ($origen == "INTERNA" ) {

$sqlm="SELECT MAX(correlativo) FROM corres WHERE origen='$origen' AND gestion='$gestion' ";
$resultm=mysqli_query($link,$sqlm);
$rowm=mysqli_fetch_array($resultm);
$correlativo=$rowm[0]+1;

$codigo="SCEP-INT-".$correlativo."/".$gestion;

$sql7="INSERT INTO corres (gestion, correlativo, idusuario, referencia, procedencia, no_control, fecha_corres, anexo, idestado, origen, codigo, idtipo_hojaruta, iddocumento_adj, fecha_recib, hora_recib) ";
$sql7.=" VALUES ('$gestion','$correlativo','$idusuario_ss','$referencia','$procedencia','$no_control','$fecha_corres','$anexo','1','$origen','$codigo','$idtipo_hojaruta','3','1111-11-11',' ') ";
$result7 = mysqli_query($link,$sql7);

$idcorres = mysqli_insert_id($link);
$_SESSION['idcorres_ss']= $idcorres;

header("Location:mostrar_hoja_ruta.php");

} else {
    
    $sqle="SELECT MAX(correlativo) FROM corres WHERE origen='$origen' AND gestion='$gestion'";
    $resulte=mysqli_query($link,$sqle);
    $rowe=mysqli_fetch_array($resulte);
    $correlativoe=$rowe[0]+1;

    $codigoe="SCEP-EXT-".$correlativoe."/".$gestion;
           
    $sql8="INSERT INTO corres (gestion, correlativo, idusuario, referencia, procedencia, no_control, fecha_corres, anexo, idestado, origen, codigo, idtipo_hojaruta, iddocumento_adj, fecha_recib, hora_recib) ";
    $sql8.="VALUES ('$gestion','$correlativoe','$idusuario_ss','$referencia','$procedencia','$no_control','$fecha_corres','$anexo','1','$origen','$codigoe','$idtipo_hojaruta','3','1111-11-11',' ') ";
    $result8 = mysqli_query($link,$sql8);
    
    $idcorres = mysqli_insert_id($link);
    $_SESSION['idcorres_ss']= $idcorres;
    
    header("Location:mostrar_hoja_ruta.php");
}

}

}
?>