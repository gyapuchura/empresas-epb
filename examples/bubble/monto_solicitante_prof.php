<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$link0=Conectarse();
$sql0 = " SELECT * FROM procesos ";
$result0 = mysql_query($sql0, $link0);
$total = mysql_num_rows($result0);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		.Estilo1 {font-family: Arial, Helvetica, sans-serif}
        .Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #003366;
}
        .Estilo4 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo8 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; }
        .Estilo10 {
	font-family: Arial, Helvetica, sans-serif;
	color: #003399;
	font-weight: bold;
	font-size: 16px;
}
        .Estilo11 {
	color: #0066CC;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
}
        .Estilo13 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; }
        </style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'bubble',
            zoomType: 'xy'
        },

        title: {
            text: 'PROCESOS POR PONDERACION DE MONTO EN Bs.'
        },

        series: [{
            data: [

<?
$numero = 0;
$link=Conectarse();
$sql = " SELECT  idproceso, idnombre, precio_ref, proceso_dgaa, observaciones, est_proceso, proceso_concluido, ";
$sql.= " fecha_conformidad FROM procesos WHERE idprofesional = '294' ORDER BY idproceso ";
$result = mysql_query($sql, $link);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$link5=Conectarse();
$sql5 = "SELECT SUM(prec_item) AS subtotal FROM esp_tecnicas WHERE idproceso='$row[0]'";
$resultado5 = mysql_query($sql5,$link5);
$monto_ivan = mysql_fetch_array($resultado5);

?>


            [<? echo $row[0];?>, <? echo $row[1];?>, <?echo $monto_ivan['subtotal'];?>]

                           <?
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo ",";

}


} while ($row = mysql_fetch_array($result));


} else {


echo "]";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>
 ] }

 , {
            data: [

            <?
$numero = 0;
$link=Conectarse();
$sql = " SELECT  idproceso, idnombre, precio_ref, proceso_dgaa, observaciones, est_proceso, proceso_concluido, ";
$sql.= " fecha_conformidad FROM procesos WHERE idprofesional = '295' ORDER BY idproceso ";
$result = mysql_query($sql, $link);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

                      <?
$link5=Conectarse();
$sql5 = "SELECT SUM(prec_item) AS subtotal FROM esp_tecnicas WHERE idproceso='$row[0]'";
$resultado5 = mysql_query($sql5,$link5);
$monto_claudia = mysql_fetch_array($resultado5);

?>


            [<? echo $row[0];?>, <? echo $row[1];?>, <?echo $monto_claudia['subtotal'];?>]

                           <?
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo ",";

}


} while ($row = mysql_fetch_array($result));


} else {


echo "]";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>   ]
        }

         , {
            data: [

            <?
$numero = 0;
$link=Conectarse();
$sql = " SELECT  idproceso, idnombre, precio_ref, proceso_dgaa, observaciones, est_proceso, proceso_concluido, ";
$sql.= " fecha_conformidad FROM procesos WHERE idprofesional = '296' ORDER BY idproceso ";
$result = mysql_query($sql, $link);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$link5=Conectarse();
$sql5 = "SELECT SUM(prec_item) AS subtotal FROM esp_tecnicas WHERE idproceso='$row[0]'";
$resultado5 = mysql_query($sql5,$link5);
$monto_deicy = mysql_fetch_array($resultado5);

?>


            [<? echo $row[0];?>, <? echo $row[1];?>, <?echo $monto_deicy['subtotal'];?>]

                           <?
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo ",";

}


} while ($row = mysql_fetch_array($result));


} else {


echo "]";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>            ]
        }

, {
            data: [

            <?
$numero = 0;
$link=Conectarse();
$sql = " SELECT  idproceso, idnombre, precio_ref, proceso_dgaa, observaciones, est_proceso, proceso_concluido, ";
$sql.= " fecha_conformidad FROM procesos WHERE idprofesional = '305' ORDER BY idproceso ";
$result = mysql_query($sql, $link);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

                     <?
$link5=Conectarse();
$sql5 = "SELECT SUM(prec_item) AS subtotal FROM esp_tecnicas WHERE idproceso='$row[0]'";
$resultado5 = mysql_query($sql5,$link5);
$monto_marco = mysql_fetch_array($resultado5);

?>


            [<? echo $row[0];?>, <? echo $row[1];?>, <?echo $monto_marco['subtotal'];?>]

                           <?
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo ",";

}


} while ($row = mysql_fetch_array($result));


} else {


echo "]";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>            ]
        }



        ]
    });
});
		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-more.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="height: 400px; min-width: 510px; max-width: 700px; margin: 0 auto">

</div>
<?php
$monto_total =  $monto_ivan['subtotal'] +  $monto_claudia['subtotal'] + $monto_deicy['subtotal'] +  $monto_marco['subtotal'] ;
?>

 <table width="786" align="center">
    <tr>
      <td colspan="4"><div align="center" class="Estilo2">REFERENCIAS</div></td>
    </tr>
    <tr>
      <td bgcolor="#A4C1FF"><span class="Estilo1">Serie 1</span></td>
      <td><span class="Estilo8">Ivan Aruquipa </span></td>
      <td colspan="2"><span class="Estilo1">Formato de lectura al apuntar </span></td>
    </tr>
    <tr>
      <td bgcolor="#999999"><span class="Estilo1">Serie 2 </span></td>
      <td><span class="Estilo8">Claudia Tapia </span></td>
      <td colspan="2"><span class="Estilo4">(# solicitud, idsolicitante), size = MONTO en Bs</span></td>
    </tr>
    <tr>
      <td width="83" bgcolor="#84FF84"><span class="Estilo1">Serie 3 </span></td>
      <td width="236"><span class="Estilo8">Deicy Chavez </span></td>
      <td width="223"><span class="Estilo1"></span></td>
      <td width="224"><span class="Estilo1"></span></td>
    </tr>
    <tr>
      <td height="21" bgcolor="#FFCC99"><span class="Estilo1">Serie 4 </span></td>
      <td><span class="Estilo8">Marco Paco</span></td>
      <td>&nbsp;</td>
      <td><span class="Estilo1">.</span></td>
    </tr>
  </table>



    </table>
	<p>&nbsp;</p>
	</body>
</html>
