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
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>CANTIDAD DE SERVIDORES PUBLICOS</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
#container {
	height: 500px;
	min-width: 410px;
	max-width: 1200px;
	margin: 0 auto;
}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #006699; font-weight: bold; }
        .Estilo12 {font-size: 14px; color: #006699; font-family: Arial, Helvetica, sans-serif;}
        .Estilo14 {font-family: Arial, Helvetica, sans-serif}
        .Estilo15 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
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
            text: 'CANTIDAD DE FUNCIONARIOS POR UNIDADES ORGANIZACIONALES'
        },

        xAxis: {
            categories: [

<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT usuarios.idusuario, unidad.nombreunidad, direccion.nombredireccion, usuarios.idarea FROM usuarios, areas, unidad, direccion ";
$sql.= " WHERE usuarios.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY usuarios.idarea ORDER BY usuarios.idarea ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
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
                text: 'NUMERO DE FUNCIONARIOS'
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
            name: 'CANTIDAD DE FUNCIONARIOS',
            data: [
           <?
$numero = 0;
$link=Conectarse();
$sql = " SELECT usuarios.idusuario, unidad.nombreunidad, direccion.nombredireccion, usuarios.idarea FROM usuarios, areas, unidad, direccion ";
$sql.= " WHERE usuarios.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion ";
$sql.= " GROUP BY usuarios.idarea ORDER BY usuarios.idarea";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$idarea = $row[3];


$link3=Conectarse();
$sql3 = " SELECT usuarios.idusuario, usuarios.idnombre  FROM usuarios, personal, cargos WHERE usuarios.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND ";
$sql3.= " usuarios.idarea='$idarea' AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND cargos.tipo_cargo='FUNCIONARIO' GROUP BY usuarios.idnombre ";
$resultado = mysql_query($sql3,$link3);
$num_funcionarios = mysql_num_rows($resultado);

?>

<?echo $num_funcionarios;?>

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
            name: 'CANTIDAD DE CONSULTORESS',
            data: [

 <?
$numero = 0;
$link=Conectarse();
$sql = " SELECT usuarios.idusuario, unidad.nombreunidad, direccion.nombredireccion, usuarios.idarea FROM usuarios, areas, unidad, direccion ";
$sql.= " WHERE usuarios.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion ";
$sql.= " GROUP BY usuarios.idarea ORDER BY usuarios.idarea";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$idarea = $row[3];


$link3=Conectarse();
$sql3 = " SELECT usuarios.idusuario, usuarios.idnombre  FROM usuarios, personal, cargos WHERE usuarios.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND ";
$sql3.= " usuarios.idarea='$idarea' AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND cargos.tipo_cargo='CONSULTOR' GROUP BY usuarios.idnombre ";
$resultado = mysql_query($sql3,$link3);
$num_funcionarios = mysql_num_rows($resultado);

?>

<?echo $num_funcionarios;?>

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
	} , {
            name: 'CANTIDAD DE PASANTES',
            data: [

 <?
$numero = 0;
$link=Conectarse();
$sql = " SELECT usuarios.idusuario, unidad.nombreunidad, direccion.nombredireccion, usuarios.idarea FROM usuarios, areas, unidad, direccion ";
$sql.= " WHERE usuarios.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion ";
$sql.= " GROUP BY usuarios.idarea ORDER BY usuarios.idarea";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$idarea = $row[3];


$link3=Conectarse();
$sql3 = " SELECT usuarios.idusuario, usuarios.idnombre  FROM usuarios, personal, cargos WHERE usuarios.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND ";
$sql3.= " usuarios.idarea='$idarea' AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND cargos.tipo_cargo='PASANTE' GROUP BY usuarios.idnombre ";
$resultado = mysql_query($sql3,$link3);
$num_funcionarios = mysql_num_rows($resultado);

?>

<?echo $num_funcionarios;?>

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


        }




        ]
    });
});

	</script>
	</head>
	<body>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="height: 700px"></div>

	</body>
</html>
