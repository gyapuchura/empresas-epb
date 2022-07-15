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

$prof_1 = '294';   /*ivan aruquipa*/
$prof_2 = '295';   /*claudia tapia*/
$prof_3 = '296';   /*deyci chavez*/
$prof_4 = '305';   /*marco paco*/
$prof_5 = '304';   /*richard balanza*/

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE idprofesional='' ";
$result = mysql_query($sql, $link);
$nadie = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE idprofesional='294' ";
$result = mysql_query($sql, $link);
$ivan = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE idprofesional='295' ";
$result = mysql_query($sql, $link);
$claudia = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE idprofesional='296'";
$result = mysql_query($sql, $link);
$deicy = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE idprofesional='305'";
$result = mysql_query($sql, $link);
$marco = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE idprofesional='299'";
$result = mysql_query($sql, $link);
$balanza = mysql_num_rows($result);



$p_ivan     = ($ivan *100)/$total;
$p_claudia  = ($claudia *100)/$total;
$p_deicy    = ($deicy*100)/$total;
$p_marco    = ($marco*100)/$total;
$p_balanza  = ($balanza*100)/$total;
$p_nadie    = ($nadie*100)/$total;

$por_ivan    = number_format($p_ivan, 2, '.', '');
$por_claudia = number_format($p_claudia, 2, '.', '');
$por_deicy   = number_format($p_deicy, 2, '.', '');
$por_marco   = number_format($p_marco, 2, '.', '');
$por_balanza = number_format($p_balanza, 2, '.', '');
$por_nadie   = number_format($p_nadie, 2, '.', '');

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Reporte por Profesional</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo6 {font-size: 14px}
        </style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'RELACION DE ASIGNACION DE TRAMITES POR PROFESIONAL DE CONTRATACION'
        },
        subtitle: {
            text: 'A LA FECHA <?echo $fecha;?>'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Cantidad de Tramites Asignados',
            data: [
                ['Ivan Aruquipa', <?echo $ivan;?>],
                ['Claudia Tapia', <?echo $claudia;?>],
                ['Deicy Chavez', <?echo $deicy;?>],
                ['Marco Antonio Paco', <?echo $marco;?>],
                ['Richard Balanza', <?echo $balanza;?>],
                ['TRAMITES AUN SIN ASIGNAR', <?echo $nadie;?>]
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
<table width="748" border="1" align="center" bordercolor="#009999">


        <tr>
          <td bgcolor="#91FFFF"><span class="Estilo5">Nombre Profesional de Contrataciones </span></td>
          <td align="center" bgcolor="#91FFFF"><span class="Estilo5">Cantidad de procesos a su cargo </span></td>
          <td align="center" bgcolor="#91FFFF"><span class="Estilo5">Ver Detalle de Procesos </span></td>
          <td colspan="2" align="center" bgcolor="#91FFFF"><span class="Estilo5">%</span></td>
        </tr>
        <tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Ivan Aruquipa </span></td>
          <td width="237" align="center" bgcolor="#FFFFFF"><span class="Estilo7 Estilo1 Estilo6"><?echo $ivan;?></span></td>
          <td width="171" align="center" bgcolor="#FFFFFF">
          <a href="reporte_prof.php?idprofesional=294" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>		</td>
          <td width="54" colspan="2" align="center" bgcolor="#FFFFFF"><span class="Estilo7 Estilo1 Estilo6">   <?echo $por_ivan;?> %
          </span></td>
        </tr>
         <tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Claudia Tapia</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $claudia;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=295" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"> <?echo $por_claudia;?> %
          </span></td>
        </tr>
         <tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Deicy Chavez </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $deicy;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=296" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $por_deicy;?> %
          </span></td>
        </tr>
 		<tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Marco Antonio Paco </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $marco;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=305" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $por_marco;?> %
          </span></td>
        </tr>
         		<tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Richard Balanza</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $balanza;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=304" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"> <?echo $por_balanza;?> %
          </span></td>
        </tr>
                 		<tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">TRAMITES AUN SIN ASIGNAR </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $nadie;?></span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=0" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"> <?echo $por_nadie;?> %
          </span></td>
        </tr>
        <tr>
          <td width="258" bordercolor="#66FF99" bgcolor="#FFFFAA"><div align="right"><span class="Estilo8 Estilo1 Estilo6">TOTAL TRAMITES </span></div></td>
          <td align="center" bordercolor="#66FF99" bgcolor="#FFFFAA"><div align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $total;?></span></div></td>
          <td align="center" bordercolor="#66FF99" bgcolor="#FFFFAA">
          <a href="reporte_prof.php" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;">MOSTRAR TODO </a>          </td>
          <td colspan="2" align="center" bordercolor="#66FF99" bgcolor="#FFFFAA"><span class="Estilo7 Estilo1 Estilo6"> 100 %
          </span></td>
        </tr>
    </table>


	</body>
</html>
