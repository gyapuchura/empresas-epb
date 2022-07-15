<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$gestion       =  date("Y");
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
				<h2 class="pageTitle">PENDIENTES</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row" align="center"><h2> </h2></div>

<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>

      <th>CORRELATIVO</th>
      <th>REFERENCIA</th>
      <th>PROCEDENCIA</th>
      <th>Nro. CONTROL</th>
      <th>FECHA DE CORRESPONDENCIA</th>
      <th>ANEXO</th>
      <th>ESTADO</th>
      <th>ACCION</th>
			        </tr>
			        </thead>
			        <tbody>
<?php

$sql =" SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, fecha_corres,   ";
$sql.=" anexo, estado FROM corres ORDER BY idcorres";

$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

	$sqlu =" SELECT usuario FROM usuarios WHERE idusuario='$row[9]'";
	$resultu = mysqli_query($link,$sqlu);
	$rowu = mysqli_fetch_array($resultu);

	$datos=$row[0]."||".
	$row[1]."||".
	$row[2]."||".
	$row[3]."||".
	$row[4]."||".
	$row[10]."||".
	$row[11]."||".
	$rowu[0];

?>
      <tr>
      <td><?php echo $row[2]?></td>
      <td><?php echo $row[4]?></td>
      <td><?php echo $row[5]?> <?php echo $row[3]?> <?php echo $row[4]?></td>
      <td><?php echo $row[6]?></td>
      <td><?php echo $row[7]?></td>
      <td><?php echo $row[8]?></td>
      <td><?php echo $row[9]?></td>
      <td>

	  <button class="btn-link" data-toggle="modal" data-target="#directriz" onclick="agregaform('<?php echo $datos;?>')">
VER MAS</button>

<div class="modal fade" id="directriz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"></h5>
         <div class="panel panel-info">
  				<div class="panel-heading"><h3>DATOS DEL EVENTO</h3></div>
         </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">

  <div class="table-responsive">
 <table class="table table-responsive">
 
    <tr>
   <td><h5>CODIGO DE EVENTO:</h5></td>
   <td><h4 class="text-muted"><input type="text" name="codigo" id="codigo" class="form-control" disabled></h4></td>
 </tr>
 <tr>
   <td><h5>TEMATICA:</h5></td>
   <td><h4 class="text-muted"><textarea name="tematica" id="tematica" class="form-control" rows="3" col="100"wrap="on"disabled></textarea></h4></td>
 </tr>
 <tr>
   <td><h5>ESTADO ACADEMICO:</h5></td>
   <td><h4 class="text-muted"><input type="text" name="ejec" id="ejec" class="form-control" disabled></h4></td>
 </tr>
  <tr>
   <td><h5>ESTADO ADMINISTRATIVO:</h5></td>
   <td><h4 class="text-muted"><input type="text" name="adm" id="adm" class="form-control" disabled></h4></td>
 </tr>
  <tr>
   <td><h5>USUARIO EJECUTOR:</h5></td>
   <td><h4 class="text-muted"><input type="text" name="creador" id="creador" class="form-control" disabled></h4></td>
 </tr>

 </table>
 </div>

</div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>



	  </td>
      </tr>
 <?php
   }
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
			        </tbody>
			    </table>
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