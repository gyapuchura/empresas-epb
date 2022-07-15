<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$sqlus =" SELECT nombres, paterno, materno FROM nombres WHERE idnombre='$idnombre_ss'";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA DE EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="css/flexslider.css" rel="stylesheet" />
<!-- Vendor Styles -->
<link href="css/magnific-popup.css" rel="stylesheet"> 
<!-- Block Styles -->
<link href="css/style.css" rel="stylesheet" />
<link href="css/gallery-1.css" rel="stylesheet">
 
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
                
				<a class="navbar-brand" href="intranet.php"><img src="img/logo.png" alt="logo"/></a>
            
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle"> EMPRESAS PÚBLICAS</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
						
	</div>
	</section>	
			  <!-- INGRESO DE SISTEMAS -->
    <section id="gallery-1" class="content-block section-wrapper gallery-1">

    	 	<div class="container">
            <!-- /.galeria de sistemas -->            
            <div class="row">
                <div id="isotope-gallery-container">
                   
                    <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                        <div class="gallery-item">
                            <div class="gallery-thumb">
                                <img src="img/works/10.jpg" class="img-responsive" alt="5th gallery Thumb">
                                <div class="image-overlay"></div>
                             
                                <a href="nuevas_hojas_ruta.php" class="gallery-link"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="gallery-details">
                            	<div class="editContent">
                                	<h5>CORRESPONDENCIA INTERNA Y EXTERNA</h5>
                            	</div>
                            	<div class="editContent">
                                	<p>Este sistema permite realizar la gestion de la correspondencia interna de la Subcontraloria de Empresas Públicas</p>
                            	</div>
                            </div>
                        </div>
                    </div>  

                    <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                        <div class="gallery-item">
                            <div class="gallery-thumb">
                                <img src="img/works/legajo_permanente.jpg" class="img-responsive" alt="5th gallery Thumb">
                                <div class="image-overlay"></div>
                             
                                <a href="legajos_permanentes.php" class="gallery-link"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="gallery-details">
                            	<div class="editContent">
                                	<h5>LEGAJO PERMANENTE</h5>
                            	</div>
                            	<div class="editContent">
                                	<p>Este sistema permite realizar la gestion de LEGAJO PERMANENTE de la Subcontraloria de Empresas Públicas</p>
                            	</div>
                            </div>
                        </div>
                    </div>  

                        
                </div>
                <!-- /.isotope-gallery-container -->
            </div>

			<div class="row">		
			<div class="col-md-4"><a href="salir.php"><h4 class="text-warning">CERRAR SESIÓN</h4></a></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>	
			</div>

            <!-- /.row --> 

        <!-- /.container -->
		</div>
    </section>
    <!--// End Gallery 1-2 -->  
	</div>
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
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
 
</body>
</html>