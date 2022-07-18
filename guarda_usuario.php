<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
$fecha 			= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$paterno 		= $_POST['paterno'];
$materno 	    = $_POST['materno'];
$nombres     	= $_POST['nombres'];
$ci         	= $_POST['ci'];
$exp         	= $_POST['exp'];

$usuario        = $_POST['usuario'];
$pass        	= $_POST['password'];
$password       = sha1($pass);

$perfil     	= $_POST['perfil'];

$idarea         = $_POST['idarea'];
$idcargo        = $_POST['idcargo'];
/* Almacenamos en variables los datos del formulario
notemos que se est�n enviando en m�todo POST */
/* Insertamos los nuevos datos */
if ($paterno == '' || $materno == '' || $nombres == '' || $ci == '' || $exp  == '' || $usuario  == '' || $password == '' )
{
header("Location:nuevo_usuario.php");
}
else {

$sql8 = " SELECT idnombre, paterno, materno, nombres, ci  FROM nombres WHERE ci='$ci' ";
$result8 = mysqli_query($link,$sql8);

if ($row8 = mysqli_fetch_array($result8)) {
 header("Location:usuario_existe.php");
}
else {

/* Insertamos los nuevos datos */
$sql0 = " INSERT INTO nombres (paterno, materno, nombres, ci, exp) ";
$sql0.= " VALUES ('$paterno', '$materno', '$nombres', '$ci', '$exp') ";
$result0 = mysqli_query($link,$sql0);

$idnombre=mysqli_insert_id($link);

$sql7 = " INSERT INTO usuarios (idnombre, usuario, password, fecha, condicion, perfil, idarea, idcargo) ";
$sql7.= "  VALUES ('$idnombre','$usuario','$password','$fecha','ACTIVO','$perfil','$idarea','$idcargo')";
$result7 = mysqli_query($link,$sql7);

/* redireccionamos a la pagina de usuarios */
header("Location:usuarios.php");
}
}
?>