<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$gestion      = date("Y");

$subfondo      = "SCEP";

$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];
$idusuario_arch_ss = $_SESSION['idusuario_arch_ss'];
$codigo_form_ss    = $_SESSION['codigo_form_ss'];

$sqle =" SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_ss'";
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
				<h2 class="pageTitle">FORMULARIO DE ARCHIVO</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4">

<form name="VOLVER" action="formularios_archivo.php" method="post">
<h3><button type="submmit" class="btn-link" >VOLVER</button></h3>
</form>
</div>
<div class="col-md-4"></div>
</div>

<!------- subtitulos de el modulo -------->

<div class="row">
<div class="col-md-2"><h4>CODIGO FORMULARIO:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $codigo_form_ss;?></h4></div>
<div class="col-md-2"><h4>EMPRESA:</h4></div>
<div class="col-md-5"><h4 class="text-muted"><?php echo $rowe[1];?></h4></div>
</div>

<div class="row">
<div class="col-md-12">
<div class="container contenido">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5>N°</h5></th>
      <th scope="col"><h5>SUBFONDO/</br>SECCIÓN</h5></th>
      <th scope="col"><h5>SERIE DOCUMENTAL</h5></th>
      <th scope="col"><h5>CÓDIGO DEL DOCUMENTO</h5></th>
      <th scope="col"><h5>ENTIDAD</h5></th>
      <th scope="col"><h5>CONTENIDO O NOMBRE DEL DOCUMENTO</h5></th>
      <th scope="col"><h5>DPTO.</h5></th>
      <th scope="col"><h5>Nº DE CAJA</h5></th>
      <th scope="col"><h5>FECHA DESPACHO</h5></th>
      <th scope="col"><h5>FECHA HOJA DE RUTA</h5></th>
      <th scope="col"><h5>ACCION</h5></th>
    </tr>
  </thead>
  <tbody>
<?php
$contador=1;
$sql =" SELECT item_archivo.iditem_archivo, item_archivo.idform_archivo, item_archivo.idempresa, serie_documental.serie_documental, item_archivo.codigo ";
$sql.=" , departamento.departamento, item_archivo.no_caja, item_archivo.fecha_despacho, item_archivo.fecha_hr, item_archivo.no_tomo, item_archivo.contenido, ";
$sql.=" item_archivo.no_fojas, cubierta.cubierta, item_archivo.cantidad, item_archivo.descripcion, item_archivo.observaciones, item_archivo.idusuario_arch FROM item_archivo, serie_documental, cubierta, departamento ";
$sql.=" WHERE item_archivo.idserie_documental=serie_documental.idserie_documental AND item_archivo.idcubierta=cubierta.idcubierta ";
$sql.=" AND item_archivo.iddepartamento=departamento.iddepartamento AND item_archivo.idform_archivo='$idform_archivo_ss' ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>    
      <tr>
      <th scope="row"> <h5 class="text-muted"> <?php echo $contador;?> </h5></th>
      <td> <h5 class="text-muted"> <?php echo $subfondo;?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[3];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[4];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $rowe[2];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[10];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[5];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[6];?> </h5></td>
      <td> <h5 class="text-muted"> 
      <?php 
            $fecha_elab1 = explode('-',$row[7]);
            $f_desp    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
            echo $f_desp;
      ?>	  
      </h5></td>
      <td> <h5 class="text-muted"> 
      <?php 
            $fecha_elab2 = explode('-',$row[8]);
            $f_hr    = $fecha_elab2[2].'/'.$fecha_elab2[1].'/'.$fecha_elab2[0];
            echo $f_hr;
      ?>	
      </h5></td>
      <td>
            <form name="BORRA" action="elimina_item_archivo.php" method="post">
            <input type="hidden" name="idlegislacion" value="<?php echo $row[0];?>">
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
<!------ EMISION DE REPORTES INSTATANEOM Y EXCEL ----->
<div class="row">
<div class="col-md-12">
 </div>
</div>

<div class="box-area">
<div class="row">
<div class="col-md-6"><h3> 
<a href="imprime_formulario_arch.php?idform_archivo=<?php echo $idform_archivo_ss;?>&idusuario_arch=<?php echo $idusuario_arch_ss;?>&codigo_form=<?php echo $codigo_form_ss;?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=1100,height=800,scrollbars=YES,left=200'); return false;">IMPRIMIR FORMULARIO DE ARCHIVO</a>    
</h3></div>
<div class="col-md-3"><h3>FORMULARIO EN EXCEL </h3></div>
<form name="FORM_ARCH" action="reporte_formulario_arch.php" method="post">
<input name="idform_archivo" type="hidden" value="<?php echo $idform_archivo_ss;?>">
<input name="idusuario_arch" type="hidden" value="<?php echo $idusuario_arch_ss;?>">
<input name="codigo_form" type="hidden" value="<?php echo $codigo_form_ss;?>">
<div class="col-md-3"><button type="submit" class="btn btn-primary">GENERAR EXCEL</button>
</form>
</div>
</div>
</div>

<!------ FORMULARIO DE INGRESO DE DATOS ----->
<div class="row">
<h2>INGRESAR DATOS DE CADA REGISTRO DOCUMENTAL</h2>
</div>
<div class="row">
<div class="col-md-12"><p>Ingresar los datos de cada registro documental, el resultado será mostrando en la parte superior de este formulario.. </p></div>
</div>
<div class="box-area">
  
<form method="post" action="guarda_item_archivo.php" >
<div class="row">
    <div class="col-md-2"><h4>SERIE DOCUMENTAL:</h4></div>
    <div class="col-md-2">
    <select name="idserie_documental" id="idserie_documental" class="form-control">
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT idserie_documental, serie_documental FROM serie_documental";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>    
    </div>  
    <div class="col-md-2"><h4>DEPARTAMENTO:</h4></div>
    <div class="col-md-2">
    <select name="iddepartamento"  id="iddepartamento" class="form-control">
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT iddepartamento, departamento FROM departamento";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>     
    </div>    
    <div class="col-md-2"><h4>NÚMERO DE CAJA:</h4></div>
    <div class="col-md-2">
    <select name="no_caja"  id="no_caja" class="form-control">
      <option value="CAJA 1">CAJA 1</option>
      <option value="CAJA 2">CAJA 2</option>
      <option value="CAJA 3">CAJA 3</option>
      <option value="CAJA 4">CAJA 4</option>
      <option value="CAJA 5">CAJA 5</option>
      </select>
    </div>   
</div>

<div class="row">
    <div class="col-md-2"><h4>FECHA ADE DESPACHO</h4></div>
    <div class="col-md-2">
    <input type="text" id="fecha1" class="form-control" name="fecha_despacho">     
    </div>  
    <div class="col-md-2"><h4>FECHA DE LA HOJA DE RUTA (HR):</h4></div>
    <div class="col-md-2">
    <input type="text" id="fecha2" class="form-control" name="fecha_hr">
    </div>    
    <div class="col-md-2"><h4>N° TOMO:</h4></div>
    <div class="col-md-2">
    <select name="no_tomo"  id="no_tomo" class="form-control">
      <option value="TOMO 1">TOMO 1</option>
      <option value="TOMO 2">TOMO 2</option>
      <option value="TOMO 3">TOMO 3</option>
      <option value="TOMO 4">TOMO 4</option>
      <option value="TOMO 5">TOMO 5</option>
      </select>
    </div>   
</div>

<div class="row">
<div class="col-md-2"><h4>CONTENIDO O NOMBRE DEL DOCUMENTO:</h4></div>
<div class="col-md-5"><textarea class="form-control" rows="3" name="contenido"></textarea></div>
<div class="col-md-2"><h4>N° FOJAS:</h4></div>
<div class="col-md-3"><input type="text"  class="form-control" name="no_fojas"></div> 
</div> 

<div class="row">
    <div class="col-md-2"><h4>CUBIERTA:</h4></div>
    <div class="col-md-5">
    <select name="idcubierta"  id="idcubierta" class="form-control">
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT idcubierta, cubierta FROM cubierta ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>   
    </div>    
    <div class="col-md-2"><h4>CANTIDAD:</h4></div>
    <div class="col-md-3">
    <input type="text"  class="form-control" name="cantidad">
    </div>   
</div>

<div class="row">
<div class="col-md-2"><h4>DESCRIPCIÓN:</h4></div>
<div class="col-md-5"><textarea class="form-control" rows="3" name="descripcion"></textarea></div>
<div class="col-md-2"><h4>OBSERVACIONES:</h4></div>
<div class="col-md-3">
<select name="observaciones"  id="observaciones" class="form-control">
      <option value="ORIGINAL">ORIGINAL</option>
      <option value="FOTOCOPIA">FOTOCOPIA</option>
      <option value="ORIGINAL Y FOTOCOPIA">ORIGINAL Y FOTOCOPIA</option>
      <option value="ORIGINAL, FOTOCOPIA Y MEDIO MAGNÉTICO">ORIGINAL Y FOTOCOPIA</option>
</select>
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
   <script>
    $("#fecha2").datepicker($.datepicker.regional[ "es" ]);
  </script>
</body>
</html>