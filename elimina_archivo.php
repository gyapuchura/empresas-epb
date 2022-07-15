<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			  = date("Ymd");
$fecha 				  = date("Y-m-d");

$idcorres_ss          = $_SESSION['idcorres_ss'];
$idbitacora_estado_ss = $_SESSION['idbitacora_estado_ss'];

$id_documento = $_POST['archivo_id'];
$hash         = $_POST['hash'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <p class="pull-left hidden-xs">CONTRALORIA GENERAL DEL ESTADO</p>
        <p class="pull-right"><i class="fa fa-user"></i>
<?php

$sqlus =" SELECT nombres, paterno, materno FROM nombres WHERE idnombre='$idnombre_ss'";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);
?>
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?></p>
      </div>
    </div>
  </div>
</div>

<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="intranet.php"><img src="img/logo.png" alt="logo"/></a>
                </div>

                <?php include("menu_corres.php");?>

            </div>
        </div>
	</header>
	<!-- end header -->

<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">DOCUMENTO ELIMINADO</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-8">
<h3 class="text-danger">
<!------ El script de eliminacion de archivo digital ----->
<?php
$ch = curl_init();
$bodyArr =[
'id_documento'  => $id_documento ,
'hash' => $hash
];

$token="Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjlhN2ZhZGUyLTRhYTQtNGUxMS1hMmE2LTE5MDc3MzgyYzExMiIsInRpcG8iOiJzaXN0ZW1hIiwic2lzX2NvZGlnbyI6MTIsInNpZ2xhIjoiU0lHQVJFU1QiLCJkZXNjcmlwY2lvbiI6IlNJU1RFTUEgU0lHQSBSRVNUIiwibW9tZW50IjoiMjAyMC0wNy0wM1QxMToxMDowMS0wNDowMCIsImlhdCI6MTU5Mzc4OTAwMX0.e-ogRwi46h9LQb534mWCAzpTHHZtmrlXRc2G7easZ4PHA-iBCNHADi0uOJC3o_qssGiBfn54SZCHQf1S8dJ-MA";

$body = json_encode($bodyArr);

$url = 'http://172.16.80.32:7007/api/v1/archivo_digital/eliminar_documento';

$ch = curl_init($url) or die("Error");

curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization:'.$token,
        'Content-Description: File Transfer',
        'Content-Length: ' . strlen($body)),                         
    CURLOPT_RETURNTRANSFER => 1));
    
    $resultado = curl_exec($ch); 
    $verifica = json_decode($resultado,true);

$error = $verifica ["error_existente"];
$mensaje = $verifica ["error_mensaje"];

if ($error =="1") {
    echo "El Documento no existe o ya fue eliminado en servidor de Archivo Digital";
} else {

    $ins = $link->query(" UPDATE bitacora_estado SET codigo_doc='', archivo_id='', hash='' WHERE idbitacora_estado='$idbitacora_estado_ss' "); 
  
    echo "El Documento fue eliminado de Archivo digital.";
}
?>
<!------ El script de eliminacion de archivo digital ----->
</h3>

</div>
</div>

<div class="row">
            <div class="col-md-4"> </div>
                <div class="col-md-4">
                    <a href="ajusta_actualizacion_hr.php"><h3>VOLVER</h3></a>
                </div>
            </div>
 </div>
	<footer>
	<?php include("footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>

</body>
</html>