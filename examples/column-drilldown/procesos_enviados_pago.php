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
		<title>MONTOS PROCESOS UNIDADES EN ESPERA DE CONFORMIDAD</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'bubble',
            plotBorderWidth: 1,
            zoomType: 'xy'
        },

        title: {
            text: 'PROCESOS PAGADOS POR MONTO SIGNIFICATIVO DE UNIDADES SOLICITANTES'
        },

        xAxis: {

            gridLineWidth: 1
        },

        yAxis: {
            startOnTick: false,
            endOnTick: false
        },

        series: [

<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT  idproceso, idnombre, idarea FROM procesos WHERE est_proceso='ENVIADO A PAGO' GROUP BY idarea ORDER BY idproceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

       <?
$idarea = $row[2];

/*aqui poner nombre area y direccion */
$link8=Conectarse();
$sql8 = " SELECT  unidad.nombreunidad FROM unidad,areas WHERE areas.idunidad=unidad.idunidad ";
$sql8.= " AND areas.idarea='$idarea' ";
$result8 = mysql_query($sql8, $link8);
$row8 = mysql_fetch_array($result8);


?>

{name: '<? echo $row8[0];?>',
            data: [

            <?
$numero2 = 0;
$link2=Conectarse();
$sql2 = " SELECT  idproceso, idnombre, precio_ref FROM procesos WHERE est_proceso='ENVIADO A PAGO' AND idarea='$idarea'";
$sql2.= " ORDER BY idproceso ";
$result2 = mysql_query($sql2, $link2);
$total2 = mysql_num_rows($result2);

 if ($row2 = mysql_fetch_array($result2)){

mysql_field_seek($result2,0);
while ($field2= mysql_fetch_field($result2)){
} do {
	?>

           <?
$link5=Conectarse();
$sql5 = "SELECT SUM(prec_item) AS subtotal FROM esp_tecnicas WHERE idproceso='$row2[0]'";
$resultado5 = mysql_query($sql5,$link5);
$monto = mysql_fetch_array($resultado5);

?>

            [<? echo $row2[0];?>, <? echo $row2[1];?>, <?echo $monto['subtotal'];?>]

                           <?
$numero2++;

if ($numero2 == $total2) {

echo "";

}
else {
echo ",";

}


} while ($row2 = mysql_fetch_array($result2));


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
            marker: {
                fillColor: {
                    radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                    stops: [
                        [0, 'rgba(255,255,255,0.5)'],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[<? echo $numero;?>]).setOpacity(0.5).get('rgba')]
                    ]
                }
            }
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

    });
});
		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-more.js"></script>

<div id="container" style="min-width: 610px; max-width: 700px; height: 600px; margin: 0 auto;"></div>






	</body>
</html>
