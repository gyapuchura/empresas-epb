<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$gestion       =  date("Y");
?>
<!DOCTYPE html>
<html lang="es">
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

            </div>
        </div>
	</header>
	<!-- end header -->
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">PANEL DE SEGUIMIENTO</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</br>
<div class="row"></div>
<div class="row" align="center">
<a href="index.php"><h4 class="text-primary">VOLVER</h4></a>    
</div>

<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>
      <th>CODIGO</th>
      <th>HOJA DE RUTA</th>
      <th>REFERENCIA</th>
	  <th>TIPO HOJA DE RUTA</th>
      <th>ULTIMA DERIVACIÓN</th>
      <th>IMPRIMIR HOJA DE RUTA</th>
      <th>GRAFICO HISTORICO</th>
			        </tr>
			        </thead>
			        <tbody>
<?php
$sql =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, ";
$sql.=" corres.no_control, corres.fecha_corres, corres.anexo, corres.idestado, corres.codigo, corres.origen, tipo_hojaruta.tipo_hojaruta ";
$sql.=" FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' ORDER BY corres.idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
      <td><?php echo $row[10]?></td>
      <td><?php echo $row[11]?></td>
      <td><?php echo $row[4]?></td>
	  <td><?php echo $row[12]?></td>
      <td>

	  <?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_recibe, comentario, derivada, recibida,";
$sql3.= " hora_recibe FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$row[0]'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
?>

<?php
$origen = $row3[2];
$destino = $row3[3];
$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);

$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);
?>

De: <?php echo $row4[0]; ?> <?php echo $row4[1]; ?> <?php echo $row4[2]; ?> </br>
A: <?php echo $row5[0]; ?> <?php echo $row5[1]; ?> <?php echo $row5[2]; ?></br>

Recibida: <?php echo $row3[7]; ?> </br>


<?php } while ($row3 = mysqli_fetch_array($result3));

} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>
<?php
$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_recibe, comentario, derivada, recibida,";
$sql3.= " hora_recibe FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$row[0]'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
?>
<?php
$origen = $row3[2];
$destino = $row3[3];

$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);

$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";
$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
De: <?php echo $row4[0]; ?> &nbsp;<?php echo $row4[1]; ?> &nbsp;<?php echo $row4[2]; ?></br>
A: <?php echo $row5[0]; ?> &nbsp;<?php echo $row5[1]; ?> &nbsp;<?php echo $row5[2]; ?></br>
Recibida: <?php echo $row3[7]; ?> </br>
Fecha: <?php echo $row3[4]; ?></br>
hora de recepción: <?php echo $row3[8]; ?>
<?php } while ($row3 = mysqli_fetch_array($result3));

} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>	
	</td>
      <td>     
      <a href="public_hoja_ruta_ver.php?idcorres=<?php echo $row[0];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;">IMPRIMIR HOJA RUTA COMPLETA</a>  
      
	  <a href="public_ficha_control.php?idcorres=<?php echo $row[0];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;"><h5 class="text-warning">IMPRIMIR FICHA DE CONTROL</h5></a>    
	  </td>
      <td>
      <a href="examples/columnrange/public_historico.php?idcorres=<?php echo $row[0];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=1000,height=600,scrollbars=YES'); return false;">VER HISTOGRAMA</a>
      </td>
      </tr>
 <?php }
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
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<div class="widget">
					<h5 class="widgetheading">CONTACTANOS</h5>
					<address>
					<strong>Contraloria General del Estado</strong><br>
					SUBCONTRALORÍA DE EMPRESAS PÚBLICAS<br>
					Calle Indaburo Esquina Potosi S/N</address>
					<p>
						<i class="icon-phone"></i> (521) 2177400 - int 203 - 205 <br>
						<i class="icon-envelope-alt"></i> luis_yapuchura@contraloria.gob.bo
					</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="widget">
					<h5 class="widgetheading">Enlaces Relacionados</h5>
					<ul class="link-list">
						<li><a href="https://cencapweb.contraloria.gob.bo/">Preinscripciones</a></li>
						<li><a href="#">Programas de Especializacion</a></li>
						<li><a href="#">Normativa del CENCAP</a></li>
						<li><a href="#">Contraloria</a></li>
						<li><a href="#">Contactanos</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="widget">
					<h5 class="widgetheading">Enlaces Recomendados</h5>
					<ul class="link-list">
						<li><a href="#">Docentes del CENCAP</a></li>
						<li><a href="#">Entidades Publicas con Convenios</a></li>
						<li><a href="#">Plataforma de Participacion y Control Social Ambiental</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
					<div class="widget">
					<h5 class="widgetheading">PLATAFORMAS DE APRENDIZAJE</h5>
					<ul class="link-list">
						<li><a href="#">POLITICAS PUBLICAS</a></li>
						<li><a href="#">LEY N� 1178</a></li>
						<li><a href="#">RESPONSABILIDAD POR LA FUNCION PUBLICA</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; CENTRO DE CAPACITACION 2018  Desarrollado por: </span><a href="gonzy.cgecencap.org" target="_blank">Ing. Luis Gonzalo Yapuchura</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
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