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
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Historic and Estimated Worldwide Population Growth by Region'
        },
        subtitle: {
            text: 'Source: Wikipedia.org'
        },
        xAxis: {
            categories: [

             <?

$numero = 0;


$link=Conectarse();
$sql = " SELECT idproceso, fecha_solic, idarea FROM procesos GROUP BY fecha_solic ORDER BY fecha_solic";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>



             '<? echo $row[1]; ?>'


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


echo ",";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>



            ],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Tramites'
            },
            labels: {
                formatter: function () {
                    return this.value / 1;
                }
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: 'Tramites'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },


        series: [


     <?

$numero = 0;


$link=Conectarse();
$sql = " SELECT idproceso, fecha_solic, idarea FROM procesos GROUP BY idarea ORDER BY fecha_solic";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>
                {

                <?
$link3=Conectarse();
$sql3 = " SELECT unidad.nombreunidad, direccion.nombredireccion FROM areas, unidad, direccion ";
$sql3.= " WHERE areas.idunidad=unidad.idunidad AND areas.iddireccion=direccion.iddireccion ";
$sql3.= " AND areas.idarea='$row[2]'";
$result3 = mysql_query($sql3, $link3);
$row3 = mysql_fetch_array($result3);

?>

            name: '<? echo $row3[0]; ?> - <? echo $row3[1]; ?>',

            data: [




             <?

$numero5 = 0;


$link5=Conectarse();
$sql5 = " SELECT idproceso, fecha_solic, idarea FROM procesos GROUP BY fecha_solic ORDER BY fecha_solic";
$result5 = mysql_query($sql5,$link5);

$total5 = mysql_num_rows($result5);

 if ($row5 = mysql_fetch_array($result5)){

mysql_field_seek($result5,0);
while ($field5 = mysql_fetch_field($result5)){
} do {
	?>


<?
$link6=Conectarse();
$sql6 = " SELECT * FROM procesos WHERE fecha_solic='$row5[1]' AND idarea='$row[2]'";
$result6 = mysql_query($sql6,$link6);

$total6 = mysql_num_rows($result6);

?>


         <? echo $total6; ?>

                           <?

$numero5++;

if ($numero5 == $total5) {

echo "";


}
else {



echo ",";

}


} while ($row5 = mysql_fetch_array($result5));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>

           ]
        }





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


echo ",";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>



        ]
    });
});
		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 710px; height: 800px; margin: 0 auto"></div>




	</body>
</html>
