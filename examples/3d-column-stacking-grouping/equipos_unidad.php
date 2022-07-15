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
	height: 500px;
	min-width: 310px;
	max-width: 1300px;
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
            text: 'EQUIPOS DE COMPUTACION POR UNIDADES SOLICITANTES'
        },

        xAxis: {
            categories: [

<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT equipos.idequipo, unidad.nombreunidad, direccion.nombredireccion, equipos.idarea FROM equipos, areas, unidad, direccion ";
$sql.= " WHERE equipos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY equipos.idarea ORDER BY equipos.idequipo ";
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
                text: 'Numero de Equipos de Computacion <br />por Unidad Solicitante '
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
            name: 'Equipos Buenos',
            data: [

            <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT equipos.idequipo, unidad.nombreunidad, direccion.nombredireccion, equipos.idarea FROM equipos, areas, unidad, direccion ";
$sql.= " WHERE equipos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY equipos.idarea ORDER BY equipos.idequipo ";
$result = mysql_query($sql, $link);

$num_equipos = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


<?
$idarea = $row[3];

$link2=Conectarse();
$sql2 = " SELECT idequipo FROM equipos WHERE idarea='$idarea' AND estado='BUENO'";
$result2 = mysql_query($sql2, $link2);
$num_nuevos = mysql_num_rows($result2);


?>
             <? echo $num_nuevos;?>


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
            name: 'Equipos Nuevos',
            data: [

                         <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT equipos.idequipo, unidad.nombreunidad, direccion.nombredireccion, equipos.idarea FROM equipos, areas, unidad, direccion ";
$sql.= " WHERE equipos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY equipos.idarea ORDER BY equipos.idequipo ";
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
$sql2 = " SELECT idequipo FROM equipos WHERE idarea='$idarea' AND estado='NUEVO' ";
$result2 = mysql_query($sql2, $link2);
$num_buenos = mysql_num_rows($result2);


?>
             <? echo $num_buenos;?>


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
            name: 'Equipos Regulares',
            data: [

                                               <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT equipos.idequipo, unidad.nombreunidad, direccion.nombredireccion, equipos.idarea FROM equipos, areas, unidad, direccion ";
$sql.= " WHERE equipos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY equipos.idarea ORDER BY equipos.idequipo ";
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
$sql2 = " SELECT idequipo FROM equipos WHERE idarea='$idarea' AND estado='REGULAR' ";
$result2 = mysql_query($sql2, $link2);
$num_regulares = mysql_num_rows($result2);


?>
             <? echo $num_regulares;?>


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
            name: 'Equipos Malos',
            data: [

                       <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT equipos.idequipo, unidad.nombreunidad, direccion.nombredireccion, equipos.idarea FROM equipos, areas, unidad, direccion ";
$sql.= " WHERE equipos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY equipos.idarea ORDER BY equipos.idequipo ";
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
$sql2 = " SELECT idequipo FROM equipos WHERE idarea='$idarea' AND estado='MALO' ";
$result2 = mysql_query($sql2, $link2);
$num_malos = mysql_num_rows($result2);


?>
             <? echo $num_malos;?>


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

<div id="container" style="height: 600px"></div>

<table width="694" border="1" align="center">
    <tr>
      <td width="406">VER EQUIPOS POR UNIDADES ORGANIZACIONALES </td>
      <td width="272"><div align="center">

       <a href="cuadro_unidades.php" target="_blank" onClick="window.open(this.href, this.target, 'width=900,height=900,scrollbars=YES'); return false;">
    MOSTRAR CUADRO DE UNIDADES </a>

      </div></td>
    </tr>
  </table>

	</body>
</html>
