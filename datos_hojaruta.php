<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

$gestion      = date("Y");

$sql1 = " SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, ";
$sql1.= " corres.fecha_corres, corres.anexo, corres.codigo, corres.origen, documento_adj.documento_adj, corres.fecha_recib, corres.hora_recib, ";
$sql1.= " tipo_hojaruta.tipo_hojaruta, corres.idtipo_hojaruta FROM corres, documento_adj, tipo_hojaruta WHERE corres.iddocumento_adj=documento_adj.iddocumento_adj  ";
$sql1.= " AND corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idcorres='$idcorres_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);
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
				<h2 class="pageTitle">INFORMACIÓN DEL PROCESO: <?php echo $row1[9];?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"><a href="deriva_hoja_ruta_corres.PHP"><h3>VOVER</h3></a></div>
<div class="col-md-4"></div>
</div>

<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[4];?></h4></div>
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>
 </div>
</div>

<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4> </h4></div>
  <div class="col-md-4"><h4 class="text-muted"></h4></div>
  <div class="col-md-2"><h4> </h4></div>
  <div class="col-md-4"><h4 class="text-muted"> </h4></div>
 </div>
</div>

<!------- bitacora de actualizaciones --->
<div class="row">
<div class="col-md-12">   
</div>
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