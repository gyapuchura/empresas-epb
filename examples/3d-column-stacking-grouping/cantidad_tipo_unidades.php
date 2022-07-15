<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
#container {
	height: 400px;
	min-width: 310px;
	max-width: 800px;
	margin: 0 auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'EJECUCION DE PRESUPUESTO POR UNIDADES SOLICITANTES'
        },

        xAxis: {
            categories: [

<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {

	$idarea = $row[3];
	?>

            '<? echo $row[1];?> <? echo '-';?> <? echo $row[2];?>'


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

       ]
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Numero de Tramites <br />por Unidad Solicitante '
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'Servicios Generales',
            data: [

            <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


<?
$idarea = $row[3];

$link2=Conectarse();
$sql2 = " SELECT idproceso FROM procesos WHERE idarea='$idarea' AND tipoproceso='SERVICIOS' AND artista='' ";
$result2 = mysql_query($sql2, $link2);
$num_servicios = mysql_num_rows($result2);


?>
             <? echo $num_servicios;?>


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

            ],
            stack: 'male'
        }, {
            name: 'Servicios Artisticos',
            data: [

                         <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


<?
$idarea = $row[3];

$link2=Conectarse();
$sql2 = " SELECT idproceso FROM procesos WHERE idarea='$idarea' AND tipoproceso='SERVICIOS' AND artista='SI' ";
$result2 = mysql_query($sql2, $link2);
$num_artistas = mysql_num_rows($result2);


?>
             <? echo $num_artistas;?>


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

            ],
            stack: 'male'
        }, {
            name: 'Adquisicion de Bienes',
            data: [

                                               <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


<?
$idarea = $row[3];

$link2=Conectarse();
$sql2 = " SELECT idproceso FROM procesos WHERE idarea='$idarea' AND tipoproceso='BIENES' AND artista='' ";
$result2 = mysql_query($sql2, $link2);
$num_bienes = mysql_num_rows($result2);


?>
             <? echo $num_bienes;?>


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
   ],
            stack: 'female'
        }, {
            name: 'Consultorias',
            data: [

                       <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


<?
$idarea = $row[3];

$link2=Conectarse();
$sql2 = " SELECT idproceso FROM procesos WHERE idarea='$idarea' AND tipoproceso='CONSULTORIA' AND artista='' ";
$result2 = mysql_query($sql2, $link2);
$num_consultorias = mysql_num_rows($result2);


?>
             <? echo $num_consultorias;?>


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

            ],
            stack: 'female'
        }]
    });
});


		</script>
	</head>
	<body>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="height: 400px">
  <table width="590" border="1" align="center">
    <tr>
      <td width="406">VER EQUIPOS POR UNIDADES ORGANIZACIONALES </td>
      <td width="168"><div align="center"></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>



	</body>
</html>
