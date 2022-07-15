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

$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];
$idusuario_arch_ss = $_SESSION['idusuario_arch_ss'];
$codigo_form_ss    = $_SESSION['codigo_form_ss'];

$idserie_documental = $_POST['idserie_documental'];
$iddepartamento     = $_POST['iddepartamento'];
$no_caja            = $_POST['no_caja'];

$fecha_com          = $_POST['fecha_despacho'];
$fecha_i            = explode('/',$fecha_com);
$fecha_despacho     = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$fecha_com2         = $_POST['fecha_hr'];
$fecha_i2           = explode('/',$fecha_com2);
$fecha_hr           = $fecha_i2[2].'-'.$fecha_i2[1].'-'.$fecha_i2[0];

$no_tomo          = $_POST['no_tomo'];
$contenido        = $_POST['contenido'];
$no_fojas         = $_POST['no_fojas'];
$idcubierta       = $_POST['idcubierta'];
$cantidad         = $_POST['cantidad'];
$descripcion      = $_POST['descripcion'];
$observaciones    = $_POST['observaciones'];

if ($idserie_documental == '' || $iddepartamento == '' || $contenido == '' || $descripcion == '' )
{
header("Location:elab_formulario.php");
}
else {    

    $sqle    = "SELECT MAX(correlativo) FROM item_archivo WHERE idform_archivo='$idform_archivo_ss'";
    $resulte = mysqli_query($link,$sqle);
    $rowe    = mysqli_fetch_array($resulte);

    $correlativo = $rowe[0]+1;

    $sql_s="SELECT idempresa, sigla FROM empresa WHERE idempresa='$idempresa_ss'";
    $result_s=mysqli_query($link,$sql_s);
    $row_s=mysqli_fetch_array($result_s);

    $sigla = $row_s[1];

    $sql_se = "SELECT idserie_documental, serie_documental, sigla FROM serie_documental WHERE idserie_documental='$idserie_documental'";
    $result_se = mysqli_query($link,$sql_se);
    $row_se=mysqli_fetch_array($result_se);

    $sigla_doc = $row_se[2];

    $codigo = "SCEP-".$sigla."-".$sigla_doc."-".$correlativo."/".$gestion;


    $sql8 =" INSERT INTO item_archivo ( idform_archivo, idempresa, correlativo, codigo, idserie_documental, iddepartamento, no_caja, fecha_despacho, ";
    $sql8.=" fecha_hr, no_tomo, contenido, no_fojas, idcubierta, cantidad, descripcion, observaciones, fecha_arch, idusuario_arch ) ";
    $sql8.=" VALUES ('$idform_archivo_ss','$idempresa_ss','$correlativo','$codigo','$idserie_documental','$iddepartamento','$no_caja ','$fecha_despacho', ";
    $sql8.=" '$fecha_hr','$no_tomo','$contenido','$no_fojas','$idcubierta','$cantidad','$descripcion','$observaciones','$fecha','$idusuario_arch_ss')";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:elab_formulario.php");

    }
?>