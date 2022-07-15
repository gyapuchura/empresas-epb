<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$link0=Conectarse();
$sql0 = " SELECT * FROM eventoi ";
$result0 = mysql_query($sql0, $link0);
$total = mysql_num_rows($result0);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='1' ";
$result = mysql_query($sql, $link);
$ben = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='1' ";
$result = mysql_query($sql, $link);
$cba = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='3' ";
$result = mysql_query($sql, $link);
$chu = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='4' ";
$result = mysql_query($sql, $link);
$lpz = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='5' ";
$result = mysql_query($sql, $link);
$oru = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='6' ";
$result = mysql_query($sql, $link);
$pnd = mysql_num_rows($result);

/* contamos los procesos derivados  ninfa y pomacagua*/

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='7' ";
$result = mysql_query($sql, $link);
$pts = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='8' ";
$result = mysql_query($sql, $link);
$scz = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM eventoi WHERE iddepartamento='9' ";
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

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
<pre id="tsv" style="display:none">Browser Version	Total Market Share
Con Certificacion POA	<?echo $poa;?>%
Con Certificacion presupuestaria	<?echo $presup;?>%
Iniciados por el RPA	<?echo $rpa;?>%
Adjudicados al Proveedor	<?echo $proveedor;?>%
Adjudicados al Artista	<?echo $artista;?>%
Esperando Conformidad	<?echo $conformidad;?>%
Enviados para Pago a la U.F.	<?echo $enviados_pago;?>%
Pagados por la U.F.	<?echo $pagado;?>%
Solicitudes SIN INICIAR	<?echo $iniciar;?>%

</pre>

 <table width="777" border="1" align="center" bordercolor="#009999">


        <tr>
          <td bgcolor="#FFFFFF"><span class="Estilo9">CUADRO DE ESTADO DE PROCESOS </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo5">CANTIDAD DE TRAMITES</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo14">CUANTIFICACION</span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo9">VER LISTA</span></td>
        </tr>
        <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS CON CERTIFICACION POA </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $cert_poa;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="con_poa.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
           <a href="reporte_tipo_proceso.php?iddepartamento=CON CERTIFICACION P.O.A." target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>         </td>
        </tr>
         <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS CON CERTIFICACION PRESUPUESTARIA </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $cert_pres;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="con_presupuesto.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=CON CERTIFICACION PRESUPUESTARIA" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
         <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS INICIADOS POR EL RPA </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $inic_rpa;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="iniciados_rpa.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=PROCESO INICIADO POR EL R.P.A." target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
 		<tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS ADJUDICADOS AL PROVEEDOR </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $adj_prov;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
           <a href="adjudicados_prov.php" target="_blank" onClick="window.open(this.href, this.target, 'width=2000,height=1000,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=ADJUDICADO AL PROVEEDOR" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
          <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS ADJUDICADOS AL ARTISTA </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $adj_artista;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="adjudicados_artistas.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a>
          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=ADJUDICADO AL ARTISTA" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
        <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS EN ESPERA DE INFORME DE CONFORMIDAD</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $cont_conformidad;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="procesos_conformidad.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=EN ESPERA DE CONFORMIDAD" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
                <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS ENVIADOS A PAGO</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $a_pago;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="procesos_enviados_pago.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=ENVIADO A PAGO" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
             <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">PROCESOS PAGADOS POR LA UNIDAD FINANCIERA </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $cont_pagado;?></span></td>
          <td bgcolor="#FFFFFF" align="center"><a href="procesos_pagados.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR CUANTIFICACION </a></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center">
          <a href="reporte_tipo_proceso.php?iddepartamento=SE EFECTUO EL PAGO AL PROVEEDOR" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
        </tr>
                     <tr>
          <td width="272" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">SOLICITUDES SIN INICIAR</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $por_iniciar;?></span></td>
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
