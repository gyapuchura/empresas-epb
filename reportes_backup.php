<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
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

				<a class="navbar-brand" href="intranet.php"><img src="img/logo.png" alt="logo"/></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                 
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
				<h2 class="pageTitle">REPORTES</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</hr>
<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<form name="INDIV" action="reporte_individual.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-2"><h3> REPORTE INDIVIDUAL </h3></div>
<div class="col-md-6"><h3> 

<select name="idusuario_rep"  id="idusuario_rep" class="form-control">
   <option value="">-SELECCIONE-</option>
<?php
$sql1 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
$sql1.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.condicion='ACTIVO'  ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[4]." ". $row1[1]." ". $row1[2]." ". $row1[3]." - ". $row1[5]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron usuarios";
}
?>
</select>

</h3></div>
<div class="col-md-4"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
 </div>
</div>
</form>

<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<form name="TIPO_HR" action="reporte_tipo_hr.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-12"><h3> REPORTE POR TIPO DE HOJA DE RUTA </h3></div>
</div>
<div class="row">
  <div class="col-md-4"><h4>CLASIFICACIÓN:</h4></div>
  <div class="col-md-8">
  <select name="idcontrol"  id="idcontrol" class="form-control">
<option value="">ELEGIR</option>
<?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = " SELECT idcontrol, control FROM control ";
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

<div class="row">
  <div class="col-md-4"><h4>TIPO DE HOJA DE RUTA:</h4></div>
  <div class="col-md-8">
  <select name="idtipo_hojaruta" id="idtipo_hojaruta" class="form-control"></select>
  </div>
</div>

<div class="row">
<div class="col-md-6"></div>
<div class="col-md-6"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
</div>
</form>
</div>

<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<form name="GLOBAL" action="reporte_seguimiento_global.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-6"><h3> REPORTE SEGUIMIENTO GENERAL EN EXCEL </h3></div>
<div class="col-md-6"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
</div>
</div>
</form>


<div class="row">
<div class="col-md-12"><h3> </h3></div>
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
	<script src="jquery.min.js"></script>
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <script>
	$(document).ready(function(){
		  var consulta;
		  //hacemos focus al campo de b�squeda
		  $("#busqueda").focus();
		  //comprobamos si se pulsa una tecla
		  $("#busqueda").keyup(function(e){
				//obtenemos el texto introducido en el campo de b�squeda
				consulta = $("#busqueda").val();
				 //hace la b�squeda
					 $.ajax({
						   type: "POST",
						   url: "buscar_corres.php",
						   data: "b="+consulta,
						   dataType: "html",
						   beforeSend: function(){
									  //imagen de carga
								   $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
						   },
						   error: function(){
								   alert("error petici�n ajax");
							 },
						  success: function(data){
								$("#resultado").empty();
								$("#resultado").append(data);
								//$("#busqueda").val(consulta);
							}
					});
		  });
	});
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#idcontrol").change(function () {
            $("#idcontrol option:selected").each(function () {
                control=$(this).val();
                $.post("tipo_hojaruta.php", { control: control }, function(data){
                $("#idtipo_hojaruta").html(data);
                });
            });
    })
    });
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idusuario_rep").change(function () {
           $("#dusuario_rep option:selected").each(function () {
            origen=$(this).val();
            $.post("reporte_usuario.php", {usuario_rep:usuario_rep}, function(data){
            $("#reporte_usuario").html(data);
            });
        });
   })
});
</script>
</body>
</html>