<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 		    = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idlegajo_ss  = $_SESSION['idlegajo_ss'];
$idempresa_ss = $_SESSION['idempresa_ss'];
$codigo_lp_ss = $_SESSION['codigo_lp_ss'];

$sqle =" SELECT idempresa, razon_social FROM empresa WHERE idempresa='$idempresa_ss'";
$resulte = mysqli_query($link,$sqle);
$rowe = mysqli_fetch_array($resulte);

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
				<h2 class="pageTitle">LEGAJO PERMANENTE</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4">

<form name="VOLVER" action="legislacion_ep.php" method="post">
<h3><button type="submmit" class="btn-link" >VOLVER</button></h3>
</form>
</div>
<div class="col-md-4"></div>
</div>

<!------- subtitulos de el modulo -------->

<div class="row">
<div class="col-md-2"><h3>CODIGO:</h3></div>
<div class="col-md-3"><h3 class="text-muted"><?php echo $codigo_lp_ss;?></h3></div>
<div class="col-md-2"><h3>EMPRESA:</h3></div>
<div class="col-md-5"><h3 class="text-muted"><?php echo $rowe[1];?></h3></div>
</div>
<div class="row">
<div class="col-md-12"><h2>4.1.2.- RELACIONES DE TUICIÓN Y VINCULACIÓN INSTITUCIONAL </h2></div>
</div>
<div class="row">
<div class="col-md-12">
<div class="container contenido">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5>N°</h5></th>
      <th scope="col"><h5>ENTE TUTOR (NOMBRE DE LA ENTIDAD)</h5></th>
      <th scope="col"><h5>TIPO DE RELACIÓN/TUICIÓN</h5></th>
      <th scope="col"><h5>ACCION</h5></th>
    </tr>
  </thead>
  <tbody>
<?php
$contador=1;
$sql =" SELECT idrelacion_tuicion, idlegajo, entidad, relacion_tuicion ";
$sql.=" FROM relacion_tuicion WHERE idlegajo='$idlegajo_ss' ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>    
      <tr>
      <th scope="row"> <h5 class="text-muted"> <?php echo $contador;?> </h5></th>
      <td> <h5 class="text-muted"> <?php echo $row[2];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[3];?> </h5></td>
      <td>
            <form name="BORRA" action="elimina_item_relacion.php" method="post">
            <input type="hidden" name="idrelacion_tuicion" value="<?php echo $row[0];?>">
            <button tipe="submit" class="btn-link"><h5 class="text-danger">QUITAR</h5></button>
            </form>                
      </td>
      </tr>
          <?php 
        $contador=$contador+1;  
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

<!------ FORMULARIO DE INGRESO DE DATOS ----->
<div class="row">
<h4>INGRESAR DATOS DE RELACIÓN Y TUICIÓN INSTITUCIONAL:</h4>
</div>
<div class="row">
<div class="col-md-12"><p>Detallar los entes tutores y otras entidades con las que se tiene relación.</p></div>
</div>
<div class="box-area">
<div class="row">
  
<form method="post" action="guarda_relacion_tuicion.php">
    <div class="col-md-2"><h4>ENTE TUTOR (NOMBRE DE LA ENTIDAD):</h4></div>
      <div class="col-md-4">
      <textarea class="form-control" rows="3" name="entidad"></textarea>    
      </div>  
      <div class="col-md-2"><h4>TIPO DE RELACIÓN/TUICIÓN:</h4></div>
      <div class="col-md-4">
      <textarea class="form-control" rows="3" name="relacion_tuicion"></textarea>
      </div>    
    </div>

<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-8">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualiza">
  AGREGAR ITEM
</button>
</div>
</div>
</div>
<!----- modal de actualizacion de estado ---->
<div class="modal fade" id="actualiza" tabindex="-1" role="dialog" aria-labelledby="actualiza" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizaLabel">AGREGAR ITEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          ¿Esta seguro de AGREGAR EL ITEM?
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR</button>
      </div>
    </div>
  </div>
</div>
<!----- modal de GUARDADO DE ITEM ---->
    </form>

 </div>
    </br>

    <div class="row">
    <div class="col-md-8">
    </div>
      <div class="col-md-4">
      <a href="estructura_organizativa.php"><h4 class="text-primary">CONTINUAR</h4></a>
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
    <script src="js/jquery.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/datepicker-es.js"></script>
 <script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
  </script>
</body>
</html>