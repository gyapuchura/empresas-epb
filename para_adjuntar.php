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
				<h2 class="pageTitle">ADJUNTAR DOCUMENTO </h2>
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
      <th>CODIGO</th>
      <th>HOJA DE RUTA</th>
      <th>REFERENCIA</th>
      <th>ADICIONAR</th>
      <th>DOCUMENTO ADICIONADO</th>
      <th>RECEPCIÓN DEL DOCUMENTO</th>
      <th>ACCION</th>
			        </tr>
			        </thead>
			        <tbody>
<?php

$sql =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, corres.fecha_corres, ";
$sql.=" corres.anexo, corres.idestado, corres.codigo, corres.origen, documento_adj.documento_adj, corres.fecha_recib, corres.hora_recib FROM corres, documento_adj WHERE ";
$sql.=" corres.iddocumento_adj=documento_adj.iddocumento_adj AND corres.gestion='$gestion' AND corres.idusuario='$idusuario_ss' ORDER BY corres.idcorres ";

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
      <td>
      <form name="ADJUNTO" action="guarda_adjunto.php" method="post">
      <select name="iddocumento_adj"  id="iddocumento_adj" class="form-control">
      <option value="">ELEGIR</option>
       <?php
      /*
      Realizamos una consulta ala tabla autor
      para mostrar los datos en un combo
      */
      
      $sql1 = "select iddocumento_adj, documento_adj from documento_adj ";
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
      
      </td>
      <td><?php echo $row[12]?></td>
      <td>
	  <?php
	 if($row[13]=="1111-11-11")
	 {
		 echo " ";
		}
	 else{
		 echo "RECIBIDO EL ".$row[13]."</br>";
		 echo "A HRS. ".$row[14];
		}  
	  ?>	  
	  </td>
      <td>
	  
	  <input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row[0]?>">
	  <button type="submit" class="btn-link">ADJUNTAR</button>
	  </form>
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