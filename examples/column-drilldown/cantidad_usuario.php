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
		.Estilo1 {font-family: Arial, Helvetica, sans-serif}
        .Estilo2 {font-size: 14px}
.Estilo5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #003333;
}
        .Estilo8 {color: #006666}
.Estilo9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #006666;
	font-weight: bold;
}
.Estilo12 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #0066CC; }
        .Estilo14 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #006666;
}
        </style>
		<script type="text/javascript">
$(function () {

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function (columns) {

            var brands = {},
                brandsData = [],
                versions = {},
                drilldownSeries = [];

            // Parse percentage strings
            columns[1] = $.map(columns[1], function (value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function (i, name) {
                var brand,
                    version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }
                    brand = name.replace(version, '');

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['v' + version, columns[1][i]]);
                    }
                }

            });

            $.each(brands, function (name, y) {
                brandsData.push({
                    name: name,
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            $.each(versions, function (key, value) {
                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: value
                });
            });

            // Create the chart
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: '<?echo " REPORTE POR ESTADO DE PROCESOS DE CONTRATACION"?>'
                },
                subtitle: {
                    text: 'Haciendo Click en las columnas se muestra el porcentaje del estado de los Tramites '
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Porcentaje Total a la fecha <?echo $fecha;?>'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                    name: 'TRAMITES',
                    colorByPoint: true,
                    data: brandsData
                }],
                drilldown: {
                    series: drilldownSeries
                }
            });
        }
    });
});


		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/data.js"></script>
<script src="../../js/modules/drilldown.js"></script>

<div id="container" style="min-width: 510px; height: 600px; margin: 0 auto"></div>

<!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
<pre id="tsv" style="display:none">Browser Version	Total Market Share
<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT idproceso, idnombre, fecha_solic FROM procesos GROUP BY idnombre ORDER BY idnombre";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

	<?

$idnombre = $row[1];

$link1=Conectarse();
$sql1 = " SELECT nombres.nombres, nombres.paterno FROM nombres WHERE nombres.idnombre='$idnombre'";
$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$link3=Conectarse();
$sql3 = " SELECT * FROM procesos WHERE idnombre='$idnombre'; ";
$result3 = mysql_query($sql3, $link3);
$por_idnombre = mysql_num_rows($result3);

$p_nombre       = ($por_idnombre*100)/$total;

?>

              <? echo $row1[0]; ?><? echo ' '; ?><? echo $row1[1]; ?> <? echo $p_nombre; ?> %



                           <?
$numero++;

if ($numero == $total) {

echo ",";

}
else {
echo "";

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
?></pre>







<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT idproceso, idnombre, fecha_solic FROM procesos GROUP BY idnombre ORDER BY idnombre";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

	<?

$idnombre = $row[1];

$link1=Conectarse();
$sql1 = " SELECT nombres.nombres, nombres.paterno FROM nombres WHERE nombres.idnombre='$idnombre'";
$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$link3=Conectarse();
$sql3 = " SELECT * FROM procesos WHERE idnombre='$idnombre'; ";
$result3 = mysql_query($sql3, $link3);
$por_idnombre = mysql_num_rows($result3);

$p_nombre       = ($por_idnombre*100)/$total;

?>

              <? echo $row1[0]; ?><? echo ' '; ?><? echo $row1[1]; ?> <? echo $por_idnombre; ?>%



                           <?
$numero++;

if ($numero == $total) {

echo ",";

}
else {
echo "";

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






	</body>
</html>
