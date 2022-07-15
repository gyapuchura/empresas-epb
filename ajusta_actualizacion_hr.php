<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss          = $_SESSION['idcorres_ss'];
$idbitacora_estado_ss = $_SESSION['idbitacora_estado_ss'];

$gestion      = date("Y");

$sql1 = " SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, ";
$sql1.= " corres.fecha_corres, corres.anexo, corres.codigo, corres.origen, documento_adj.documento_adj, corres.fecha_recib, corres.hora_recib ";
$sql1.= " FROM corres, documento_adj WHERE corres.iddocumento_adj=documento_adj.iddocumento_adj AND corres.idcorres='$idcorres_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

$sql_b =" SELECT bitacora_estado.idbitacora_estado, bitacora_estado.idcorres, bitacora_estado.correlativo, estado.estado, bitacora_estado.resumen, ";
$sql_b.=" bitacora_estado.codigo_doc, bitacora_estado.archivo_id, bitacora_estado.hash, bitacora_estado.idestado FROM bitacora_estado, estado WHERE idcorres='$idcorres_ss' ";
$sql_b.=" AND bitacora_estado.idestado=estado.idestado AND bitacora_estado.idbitacora_estado = '$idbitacora_estado_ss' ";
$result_b = mysqli_query($link,$sql_b);
$row_b = mysqli_fetch_array($result_b);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CENTRO DE CAPACITACION</title>
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
				<h2 class="pageTitle">ESTADO DE: <?php echo $row1[9];?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"> </div>
    <div class="col-md-4">
        <a href="deriva_hoja_ruta_corres.php"><h3 class="text-primary">VOLVER</h3></a>
    </div>
</div>


<div class="row">
<div class="col-md-4">
<h2>Estado:</h2>
</div>
<div class="col-md-8">
<h2 class="text-muted"><?php echo $row_b[3];?></h2>
</div>
</div>

<div class="box-area">
<div class="row">
<form method="post" action="guarda_ajuste_estado.php" >
    <div class="col-md-4"><h4>ESTADO DEL TRÁMITE:</h4></div>
      <div class="col-md-8">
      <select name="idestado"  id="idestado" class="form-control">
<option selected>Seleccione</option>
<?php
$sql_e = "select idestado, estado from estado ";
$result_e = mysqli_query($link,$sql_e);
if ($row_e = mysqli_fetch_array($result_e)){
mysqli_field_seek($result_e,0);
while ($field_e = mysqli_fetch_field($result_e)){
} do {
?>
<option value="<?php echo $row_e[0]; ?>" <?php if ($row_e[0]==$row_b[8]) echo "selected";?> > <?php echo $row_e[1];?></option>
<?php
} while ($row_e = mysqli_fetch_array($result_e));
} else {
}
?>
</select>
      </div>      
    </div>
<div class="row">
<div class="col-md-4"><h4>MODIFICAR RESUMEN DE ESTADO:</h4></div>
<div class="col-md-8"><textarea class="form-control" rows="3" name="resumen"><?php echo $row_b[4];?></textarea></div>
</div>

<div class="row">
<div class="col-md-12">
<input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row1[0]?>"> 
<input type="hidden" id="referencia"  name="referencia" value="<?php echo $row1[4]?>"> 
<input type="hidden" id="codigo"  name="codigo" value="<?php echo $row1[9];?>"> 
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualiza">
  AJUSTAR ESTADO DEL TRAMITE
</button>
</div>
</div>
</div>
<!----- modal de actualizacion de estado ---->

<div class="modal fade" id="actualiza" tabindex="-1" role="dialog" aria-labelledby="actualiza" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizaLabel">AJUSTAR ESTADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          ¿Esta seguro de AJUSTAR EL ESTADO DEL TRAMITE?
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR AJUSTES</button>
      </div>
    </div>
  </div>
</div>
<!----- modal de actualizacion de estado ---->
</form>
        </br>

<!----- SUBIR UN ARCHIVO ------>

<div class="row">
<div class="col-md-12">
<h2>DOCUMENTO ADJUNTO:</h2>
</div>
</div>

<?php
if ($row_b[6]=="") {
	?>
	<div class="box-area">
	<div class="row">

	<form method="post" action="sube_doc_ajustado.php" enctype="multipart/form-data">

		<input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row1[0]?>"> 
		<input type="hidden" id="referencia"  name="referencia" value="<?php echo $row1[4]?>"> 
		<input type="hidden" id="codigo"  name="codigo" value="<?php echo $row1[9];?>"> 
		<input type="hidden" id="resumen"  name="resumen" value="<?php echo $row_b[4];?>"> 

	<div class="col-md-12"><h4>SUBIR DOCUMENTO (OPCIONAL):</h4></div>
	<div class="col-md-8"><input type="file" name="file" class="form-control"></div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sube_doc">
		SUBIR DOCUMENTO
		</button>
	</div>
</div>
<!------- modal subir documento ---->
<div class="modal fade" id="sube_doc" tabindex="-1" role="dialog" aria-labelledby="sube_doc" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sube_docLabel">SUBIR DOCUMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
			<div class="modal-body">
			¿Esta seguro de SUBIR EL DOCUMENTO ADJUNTO ?
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR SUBIDA</button>
      </div>
    </div>
  </div>
</div>
	</form>

<!------- modal subir documento end ---->
	<?php
} else {
	?>
	<div class="box-area">
	<div class="row">
	<div class="col-md-6">
	<a href="obtiene_archivo_cge.php?id_archivo=<?php echo $row_b[6];?>&hash=<?php echo $row_b[7];?>" target="_blank" class="btn-link" onClick="window.open(this.href, this.target, 'width=800,height=1000,scrollbars=YES, left=300'); return false;">
		<h4 class="text-success">
  <?php
if ($row_b[6] != "") {
  echo "OBTENER DOCUMENTO";
} else {
}
?>
</h4></a>
	</div>

	<div class="col-md-6">
		</div>
		<form action="elimina_archivo.php" method="post">
		<input type="hidden" name="archivo_id" value="<?php echo $row_b[6];?>" >
		<input type="hidden" name="hash" value="<?php echo $row_b[7];?>" >
		<button type="button" class="btn-link" data-toggle="modal" data-target="#elimina_doc"> 			
		<h4 class="text-danger">ELIMINAR DOCUMENTO</h4>		
       </button>
	</div> 
	</div>
</div>
<!------- modal eliminar documento ---->
<div class="modal fade" id="elimina_doc" tabindex="-1" role="dialog" aria-labelledby="elimina_doc" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="elimina_docLabel">ELIMINA DOCUMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          ¿Esta seguro de ELIMINAR EL DOCUMENTO ADJUNTO ?
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn-link pull-center"><h4 class="text-danger">CONFIRMAR ELIMINADO</h4></button>
      </div>
    </div>
  </div>
</div>
</form>

<!------- modal eliminar documento end ---->
</div>
	<?php
}
?>
</br>

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