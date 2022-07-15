<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$link0=Conectarse();
$sql0 = " SELECT * FROM equipos ";
$result0 = mysql_query($sql0, $link0);
$total = mysql_num_rows($result0);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2004' ";
$result = mysql_query($sql, $link);
$uno = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2005'";
$result = mysql_query($sql, $link);
$dos = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2006' ";
$result = mysql_query($sql, $link);
$tres = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2007'";
$result = mysql_query($sql, $link);
$cuatro = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2008'";
$result = mysql_query($sql, $link);
$cinco = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2009' ";
$result = mysql_query($sql, $link);
$seis = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2010'";
$result = mysql_query($sql, $link);
$siete = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2011' ";
$result = mysql_query($sql, $link);
$ocho = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2012'";
$result = mysql_query($sql, $link);
$nueve = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2013'";
$result = mysql_query($sql, $link);
$diez = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2014'";
$result = mysql_query($sql, $link);
$once = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2015'";
$result = mysql_query($sql, $link);
$doce = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM equipos WHERE ano = '2016'";
$result = mysql_query($sql, $link);
$trece = mysql_num_rows($result);



?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Reporte_tipo_de_Contratacion</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		.Estilo1 {font-family: Arial, Helvetica, sans-serif}
        </style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'DATA DE LOS EQUIPOS DE COMPUTACION EN EL MINISTERIO DE CULTURAS'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [
                ['2004',    <?echo $uno;?>],
                ['2005',    <?echo $dos;?>],
                ['2006',    <?echo $tres;?>],
                ['2007',      <?echo $cuatro ;?>],
                ['2008',      <?echo $cinco;?>],
                ['2009',    <?echo $seis;?>],
                ['2010',      <?echo $siete;?>],
                ['2011',      <?echo $ocho;?>],
                ['2012',    <?echo $nueve;?>]
                ['2013',      <?echo $diez;?>],
                ['2014',      <?echo $once;?>],
                ['2015',    <?echo $doce;?>],
                ['2016',    <?echo $trece;?>],


            ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>

<table width="558" border="1" align="center" bordercolor="#009999">
               <tr>
          <td width="150" bgcolor="#FFFFCC"><div align="center"><span class="Estilo8 Estilo2 Estilo1">DATA DEL EQUIPO </span></div></td>
          <td width="244" align="center" bgcolor="#FFFFCC">DETALLE</td>
          <td width="142" align="center" bgcolor="#FFFFCC"><div align="center"><span class="Estilo8 Estilo2 Estilo1">CANTIDAD </span></div></td>
        </tr>

        <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2004</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2004" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $uno;?></span></div></td>
        </tr>
         <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2005</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2005" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $dos;?></span></div></td>
        </tr>
         <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2006</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2006" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $tres;?></span></div></td>
        </tr>
 		<tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2007</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2007" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $cuatro;?></span></div></td>
        </tr>
        <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2008</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2008" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $cinco;?></span></div></td>
        </tr>
         <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2009</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2009" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $seis;?></span></div></td>
        </tr>
         <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2010</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2010" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $siete;?></span></div></td>
        </tr>
         <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2011</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2011" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $ocho;?></span></div></td>
        </tr>
 		<tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2012</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2012" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $nueve;?></span></div></td>
        </tr>
        <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2013</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2013" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $diez;?></span></div></td>
        </tr>
                <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2014</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2014" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $once;?></span></div></td>
        </tr>
                        <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2015</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2015" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $doce;?></span></div></td>
        </tr>
                                <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">2016</span></div></td>
          <td bgcolor="#FFFFFF" align="center"><a href="reporte_data.php?ano=2016" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a></td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $trece;?></span></div></td>
        </tr>
                <tr>
          <td width="150" bgcolor="#FFFFFF"><div align="center"><span class="Estilo8 Estilo1 Estilo2">TOTAL DE EQUIPOS</span></div></td>
          <td bgcolor="#FFFFFF" align="center">&nbsp;</td>
          <td bgcolor="#FFFFFF" align="center"><div align="center"><span class="Estilo7"><?echo $total;?></span></div></td>
        </tr>
    </table>
	</body>
</html>
