<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idderiva_corres = $_POST['idderiva_corres'];
$idcorres        = $_POST['idcorres'];

$gestion       = date("Y");


$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo, codigo, origen FROM corres WHERE idcorres='$idcorres' ";

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
                  <a class="navbar-brand" href="inicio.php"><img src="img/logo.png" alt="logo"/></a>
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
				<h2 class="pageTitle">RECIBIR HOJA DE RUTA <?php echo $row1[10];?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row" align="center"> 
<div class="col-md-12"> 
<h2>
<form name="DERIVA" action="nuevas_hojas_ruta.php" method="post">
  <button type="submit" class="btn-link">VOLVER</button></form>
</h2></div>
</div>

<div class="row" align="center">
<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4>CODIGO</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[9];?></h4></div>
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-6"><h4 class="text-muted"><?php echo $row1[4];?></h4></div>
</div>

<div class="row">
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>
  <div class="col-md-2"><h4>NUMERO DE CONTROL:</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[6];?></h4></div>
  <div class="col-md-2"><h4>FECHA:</h4></div>
  <div class="col-md-2"><h4 class="text-muted">	  
  <?php 
            $fecha_hr        = explode('-',$row1[7]);
            $f_hojaruta     = $fecha_hr[2].'/'.$fecha_hr[1].'/'.$fecha_hr[0];
            echo $f_hojaruta;
          ?>
</h4></div>
</div>

</div>

<div class="row">
  <div class="col-md-12"><h4> </h4></div>
</div>

<div class="row">
  <div class="col-md-12">  
  <button class="btn btn-primary" data-toggle="modal" data-target="#recibir">
RECIBIR HOJA DE RUTA</button>

<div class="modal fade" id="recibir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"></h5>
         <div class="panel panel-info">
  				<div class="panel-heading"><h3>¿Esta seguro de recibir esta HOJA DE RUTA?</h3></div>
         </div>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>

      <div class="modal-footer">

      <form name="RECEPCIONA" action="guarda_recepcion.php" method="post">
      <input type="hidden" id="idderiva_corres"  name="idderiva_corres" value="<?php echo $idderiva_corres;?>">
        <button type="submit" class="btn btn-primary">RECIBIR HOJA DE RUTA</button>
        </form>
      </div>
    </div>
  </div>
</div>

 
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
	<script>
	function agregaform(datos){
d=datos.split('||');

$('#codigo').val(d[0]);
$('#tematica').val(d[1]);
$('docente').val(d[2]);
$('#adm').val(d[5]);
$('#ejec').val(d[6]);
$('#contrato').val(d[9]);
$('#preventivo').val(d[8]);
$('#creador').val(d[7]);

}
	</script>
</body>
</html>