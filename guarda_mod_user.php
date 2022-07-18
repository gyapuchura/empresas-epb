<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$idusuario_adm_ss  =  $_SESSION['idusuario_adm_ss'];
$idnombre_adm_ss   =  $_SESSION['idnombre_adm_ss'];

$gestion     = date("Y");

$usuario   	 = $_POST['usuario'];
$pass   	 = $_POST['password'];
$password    = sha1($pass);
$condicion   = $_POST['condicion'];
$perfil      = $_POST['perfil'];
$idcargo     = $_POST['idcargo'];
    
$sql8 =" UPDATE usuarios SET usuario='$usuario', password='$password', condicion='$condicion', perfil='$perfil', idcargo='$idcargo' ";
$sql8.=" WHERE idusuario='$idusuario_adm_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:modifica_usuario.php");

?>