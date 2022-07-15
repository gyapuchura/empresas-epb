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
	min-width: 410px;
	max-width: 1000px;
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
            text: 'UNIDADES SOLICITANTES DE SOPORTE TECNICO'
        },

        xAxis: {
            categories: [

<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
            name: 'Luis Gonzalo Yapuchura',
            data: [

            <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
$sql2 = " SELECT idactiv_soporte FROM activ_soporte WHERE idarea='$idarea' AND tecnico='37' ";
$result2 = mysql_query($sql2, $link2);
$num_gonzalo = mysql_num_rows($result2);


?>
             <? echo $num_gonzalo;?>


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
            name: 'Efrain Americo Quispe',
            data: [

                         <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
$sql2 = " SELECT idactiv_soporte FROM activ_soporte WHERE idarea='$idarea' AND tecnico='352'";
$result2 = mysql_query($sql2, $link2);
$num_americo = mysql_num_rows($result2);


?>
             <? echo $num_americo;?>


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
            name: 'Vladimir Javier Loma',
            data: [

                                               <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
$sql2 = " SELECT idactiv_soporte FROM activ_soporte WHERE idarea='$idarea' AND tecnico='40' ";
$result2 = mysql_query($sql2, $link2);
$num_vladimir = mysql_num_rows($result2);


?>
             <? echo $num_vladimir;?>


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
            name: 'Hans Wilmer Choque',
            data: [

                       <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
$sql2 = " SELECT idactiv_soporte FROM activ_soporte WHERE idarea='$idarea' AND tecnico='38'  ";
$result2 = mysql_query($sql2, $link2);
$num_hans = mysql_num_rows($result2);


?>
             <? echo $num_hans;?>


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
            name: 'Jose Luis Mancilla',
            data: [

                       <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
$sql2 = " SELECT idactiv_soporte FROM activ_soporte WHERE idarea='$idarea' AND tecnico='131'  ";
$result2 = mysql_query($sql2, $link2);
$num_jose = mysql_num_rows($result2);


?>
             <? echo $num_jose;?>


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
            name: 'Marco Antonio Mamani',
            data: [

                       <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT activ_soporte.idactiv_soporte, unidad.nombreunidad, direccion.nombredireccion, activ_soporte.idarea FROM activ_soporte, areas, unidad, direccion ";
$sql.= " WHERE activ_soporte.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY activ_soporte.idarea ORDER BY activ_soporte.idactiv_soporte ";
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
$sql2 = " SELECT idactiv_soporte FROM activ_soporte WHERE idarea='$idarea' AND tecnico='39'  ";
$result2 = mysql_query($sql2, $link2);
$num_marco = mysql_num_rows($result2);


?>
             <? echo $num_marco;?>


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

<div id="container" style="height: 550px">

  <p>&nbsp;</p>
  </div>



	</body>
</html>
