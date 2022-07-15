<? include("cabf.php");?>
<? include("inc.config.php");?>
<?
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$gestion    = date("Y");

$link0=Conectarse();
$sql0 = " SELECT * FROM eventoi WHERE idmodalidad='1' AND gestion='$gestion'";
$result0 = mysql_query($sql0, $link0);
$total = mysql_num_rows($result0);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='1' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$ben = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='2' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$cba = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='3' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$chu = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='4' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$lpz = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='5' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$oru = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='6' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$pnd = mysql_num_rows($result);

/* contamos los procesos derivados  ninfa y pomacagua*/

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='7' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$pts = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='8' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$scz = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='9' AND idmodalidad='1' AND gestion='$gestion'";
$result = mysql_query($sql, $link);
$tar = mysql_num_rows($result);

$beni       = ($ben *100)/$total;
$cbba       = ($cba *100)/$total;
$chuquisaca = ($chu *100)/$total;
$la_paz     = ($lpz *100)/$total;
$oruro      = ($oru *100)/$total;
$pando      = ($pnd *100)/$total;
$potosi     = ($pts *100)/$total;
$santa_cruz = ($scz *100)/$total;
$tarija     = ($tar *100)/$total;
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
                    text: '<?echo "EVENTOS PRESENCIALES A NIVEL NACIONAL"?>'
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
                    name: 'EVENTOS',
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

<div id="container" style="min-width: 350px; height: 400px; margin: 0 auto"></div>

<!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
<pre id="tsv" style="display:none">Browser Version	Total Market Share

BENI	<?echo $beni;?>%
COCHABAMBA	<?echo $cbba;?>%
CHUQUISACA	<?echo $chuquisaca;?>%
LA PAZ	<?echo $la_paz;?>%
ORURO	<?echo $oruro;?>%
PANDO	<?echo $pando;?>%
POTOSI	<?echo $potosi;?>%
S.CRUZ	<?echo $santa_cruz;?>%
TARIJA	<?echo $tarija;?>%

</pre>

 <table width="777" border="1" align="center" bordercolor="#009999">


        <tr>
          <td bgcolor="#FFFFFF"><span class="Estilo9">DEPARTAMENTO EN EL QUE SE DESARROLLO EL EVENTO DE CAPACITACION</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo5">CANTIDAD DE EVENTOS</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo14">CUANTIFICACION</span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo9">VER DETALLE</span></td>
        </tr>
        <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">BENI</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $ben;?></span></td>
          <td bgcolor="#FFFFFF" align="center"> 
          <a href="con_presupuesto.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a> </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
           <a href="reporte_tipo_proceso.php?iddepartamento=CON CERTIFICACION P.O.A." target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>         </td>
        </tr>
         <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">COCHABAMBA</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $cba;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="con_presupuesto.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=CON CERTIFICACION PRESUPUESTARIA" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
         <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">CHUQUISACA</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $chu;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="iniciados_rpa.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=PROCESO INICIADO POR EL R.P.A." target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
 		<tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">LA PAZ</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $lpz;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
           <a href="adjudicados_prov.php" target="_blank" onClick="window.open(this.href, this.target, 'width=2000,height=1000,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=ADJUDICADO AL PROVEEDOR" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
          <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">ORURO</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $oru;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="adjudicados_artistas.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=ADJUDICADO AL ARTISTA" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
        <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PANDO</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $pnd;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="procesos_conformidad.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=EN ESPERA DE CONFORMIDAD" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
                <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">POTOSI</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $pts;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="procesos_enviados_pago.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=ENVIADO A PAGO" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
             <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">SANTA CRUZ </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $scz;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="procesos_pagados.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=SE EFECTUO EL PAGO AL PROVEEDOR" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
                     <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">TARIJA</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $tar;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
           <a href="sin_iniciar.php" target="_blank" onClick="window.open(this.href, this.target, 'width=2000,height=1000,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>

                <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">TOTAL  DE TRAMITES </span></td>
          <td width="171" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $total;?></span></td>
          <td width="162" bgcolor="#FFFFFF" align="center">&nbsp;</td>
          <td width="144" colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_global.php" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=780,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
    </table>

	</body>
</html>
