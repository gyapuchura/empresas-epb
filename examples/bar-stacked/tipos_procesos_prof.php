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



/*IVAN ARUQUIPA*/

$link0=Conectarse();
$sql0 = " SELECT * FROM procesos ";
$result0 = mysql_query($sql0, $link0);
$total = mysql_num_rows($result0);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='' AND idprofesional='294'";
$result = mysql_query($sql, $link);
$ivan_servicios = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='BIENES' AND idprofesional='294'";
$result = mysql_query($sql, $link);
$ivan_bienes = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='CONSULTORIA' AND idprofesional='294'";
$result = mysql_query($sql, $link);
$ivan_consultorias = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='SI' AND idprofesional='294'";
$result = mysql_query($sql, $link);
$ivan_artistas = mysql_num_rows($result);

/*CLAUDIA TAPIA*/
$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='' AND idprofesional='295'";
$result = mysql_query($sql, $link);
$claudia_servicios = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='BIENES' AND idprofesional='295'";
$result = mysql_query($sql, $link);
$claudia_bienes = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='CONSULTORIA' AND idprofesional='295'";
$result = mysql_query($sql, $link);
$claudia_consultorias = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='SI' AND idprofesional='295'";
$result = mysql_query($sql, $link);
$claudia_artistas = mysql_num_rows($result);

/*DEICY CHAVEZ*/
$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='' AND idprofesional='296'";
$result = mysql_query($sql, $link);
$deicy_servicios = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='BIENES' AND idprofesional='296'";
$result = mysql_query($sql, $link);
$deicy_bienes = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='CONSULTORIA' AND idprofesional='296'";
$result = mysql_query($sql, $link);
$deicy_consultorias = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='SI' AND idprofesional='296'";
$result = mysql_query($sql, $link);
$deicy_artistas = mysql_num_rows($result);

/*MARCO ANTONIO PACO*/
$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='' AND idprofesional='305'";
$result = mysql_query($sql, $link);
$marco_servicios = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='BIENES' AND idprofesional='305'";
$result = mysql_query($sql, $link);
$marco_bienes = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='CONSULTORIA' AND idprofesional='305'";
$result = mysql_query($sql, $link);
$marco_consultorias = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='SI' AND idprofesional='305'";
$result = mysql_query($sql, $link);
$marco_artistas = mysql_num_rows($result);

/*balanza*/
$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='' AND idprofesional='299'";
$result = mysql_query($sql, $link);
$richard_servicios = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='BIENES' AND idprofesional='299'";
$result = mysql_query($sql, $link);
$richard_bienes = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='CONSULTORIA' AND idprofesional='299'";
$result = mysql_query($sql, $link);
$richard_consultorias = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='SI' AND idprofesional='299'";
$result = mysql_query($sql, $link);
$richard_artistas = mysql_num_rows($result);

/*tramites aun no asignados*/
$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='' AND idprofesional='0'";
$result = mysql_query($sql, $link);
$aun_servicios = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='BIENES' AND idprofesional='0'";
$result = mysql_query($sql, $link);
$aun_bienes = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='CONSULTORIA' AND idprofesional='0'";
$result = mysql_query($sql, $link);
$aun_consultorias = mysql_num_rows($result);

$link=Conectarse();
$sql = " SELECT * FROM procesos WHERE tipoproceso='SERVICIOS' AND artista='SI' AND idprofesional='0'";
$result = mysql_query($sql, $link);
$aun_artistas = mysql_num_rows($result);


?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Profesional Tipos de Contratacion</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		.Estilo1 {font-family: Arial, Helvetica, sans-serif}
        .Estilo2 {font-size: 14px}
.Estilo7 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000000; }
.Estilo8 {color: #000000}
        .Estilo10 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
        .Estilo12 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #006699;
	font-weight: bold;
}
        .Estilo14 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; font-weight: bold; }
        .Estilo16 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #009966;
	font-weight: bold;
}
        .Estilo18 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF6600;
	font-weight: bold;
}
        .Estilo19 {color: #003366}
        </style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'RELACION DE PROCESOS ATENDIDOS <br /> POR CADA PROFESIONAL DE CONTRATACIONES <br /> POR TIPO DE SOLICITUD AL <?echo $fecha;?>'
        },
        xAxis: {
            categories: ['Ivan Aruquipa', 'Claudia Tapia', 'Deicy Chavez', 'Marco Antonio Paco', 'Richard Balanza', 'AUN NO ASIGNADOS']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total fruit consumption'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'SERVICIOS GENERALES',
            data: [<?echo $ivan_servicios;?>, <?echo $claudia_servicios;?>, <?echo $deicy_servicios;?>, <?echo $marco_servicios;?>, <?echo $richard_servicios;?>, <?echo $aun_servicios;?>]
        }, {
            name: 'SERVICIOS ARTISTICOS',
            data: [<?echo $ivan_artistas;?>, <?echo $claudia_artistas;?>, <?echo $deicy_artistas;?>, <?echo $marco_artistas;?>, <?echo $richard_artistas;?>, <?echo $aun_artistas;?>]
        }, {
            name: 'ADQUISICION DE BIENES',
            data: [<?echo $ivan_bienes;?>, <?echo $claudia_bienes;?>, <?echo $deicy_bienes;?>, <?echo $marco_bienes;?>, <?echo $richard_bienes;?>, <?echo $aun_bienes;?>]
        }, {
            name: 'CONTRATACION DE CONSULTORIAS',
            data: [<?echo $ivan_consultorias;?>, <?echo $claudia_consultorias;?>, <?echo $deicy_consultorias;?>, <?echo $marco_consultorias;?>, <?echo $richard_consultorias;?>, <?echo $aun_consultorias;?>]
        }
        ]
    });
});
		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

<table width="748" border="1" align="center" bordercolor="#009999">


        <tr>
          <td bgcolor="#FFFFCC"><div align="center"><span class="Estilo10">NOMBRE PROFESIONAL </span></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><span class="Estilo12">Servicios Generales </span></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><span class="Estilo14">Servicios Artisticos </span></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><span class="Estilo16">Adquisicion de Bienes </span></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><span class="Estilo18">Contratacion de Consultorias </span></div></td>
          <td width="77" align="center" bgcolor="#FFFFCC"><div align="center"><span class="Estilo10">Cantidad</span></div></td>
          <td width="83" colspan="2" align="center" bgcolor="#FFFFCC"><div align="center"><span class="Estilo10">Porcentaje</span></div></td>
        </tr>
        <tr>
          <td width="174" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">Ivan Aruquipa </span></td>
          <td width="86" bgcolor="#FFFFFF"><div align="center"><?echo $ivan_servicios;?></div></td>
          <td width="81" bgcolor="#FFFFFF"><div align="center"><?echo $ivan_artistas;?></div></td>
          <td width="107" bgcolor="#FFFFFF"><div align="center"><?echo $ivan_bienes;?></div></td>
          <td width="94" bgcolor="#FFFFFF"><div align="center"><?echo $ivan_consultorias;?></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $ivan;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7">   <?echo $por_ivan;?> %
          </span></td>
        </tr>
         <tr>
           <td width="174" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">Claudia Tapia</span></td>
           <td width="86" bgcolor="#FFFFFF"><div align="center"><?echo $claudia_servicios;?></div></td>
           <td width="81" bgcolor="#FFFFFF"><div align="center"><?echo $claudia_artistas;?></div></td>
           <td width="107" bgcolor="#FFFFFF"><div align="center"><?echo $claudia_bienes;?></div></td>
          <td width="94" bgcolor="#FFFFFF"><div align="center"><?echo $claudia_consultorias;?></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $claudia;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?echo $por_claudia;?> %
          </span></td>
        </tr>
         <tr>
           <td width="174" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">Deicy Chavez </span></td>
           <td width="86" bgcolor="#FFFFFF"><div align="center"><?echo $deicy_servicios;?></div></td>
           <td width="81" bgcolor="#FFFFFF"><div align="center"><?echo $deicy_artistas;?></div></td>
           <td width="107" bgcolor="#FFFFFF"><div align="center"><?echo $deicy_bienes;?></div></td>
          <td width="94" bgcolor="#FFFFFF"><div align="center"><?echo $deicy_consultorias;?></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $deicy;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $por_deicy;?> %
          </span></td>
        </tr>
 		<tr>
 		  <td width="174" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">Marco Antonio Paco </span></td>
 		  <td width="86" bgcolor="#FFFFFF"><div align="center"><?echo $marco_servicios;?></div></td>
 		  <td width="81" bgcolor="#FFFFFF"><div align="center"><?echo $marco_artistas;?></div></td>
 		  <td width="107" bgcolor="#FFFFFF"><div align="center"><?echo $marco_bienes;?></div></td>
          <td width="94" bgcolor="#FFFFFF"><div align="center"><?echo $marco_consultorias;?></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $marco;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $por_marco;?> %
          </span></td>
        </tr>
         		<tr>
         		  <td width="174" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">Richard Balanza</span></td>
         		  <td width="86" bgcolor="#FFFFFF"><div align="center"><?echo $richard_servicios;?></div></td>
         		  <td width="81" bgcolor="#FFFFFF"><div align="center"><?echo $richard_artistas;?></div></td>
         		  <td width="107" bgcolor="#FFFFFF"><div align="center"><?echo $richard_bienes;?></div></td>
          <td width="94" bgcolor="#FFFFFF"><div align="center"><?echo $richard_consultorias;?></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $balanza;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?echo $por_balanza;?> %
          </span></td>
        </tr>
                 		<tr>
                 		  <td width="174" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">TRAMITES AUN SIN ASIGNAR </span></td>
                 		  <td width="86" bgcolor="#FFFFFF"><div align="center"><?echo $aun_servicios;?></div></td>
                 		  <td width="81" bgcolor="#FFFFFF"><div align="center"><?echo $aun_artistas;?></div></td>
                 		  <td width="107" bgcolor="#FFFFFF"><div align="center"><?echo $aun_bienes;?></div></td>
          <td width="94" bgcolor="#FFFFFF"><div align="center"><?echo $aun_consultorias;?></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $nadie;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?echo $por_nadie;?> %
          </span></td>
        </tr>
        <tr>
          <td colspan="5" bgcolor="#BBFFFF"><div align="right"><span class="Estilo2 Estilo1 Estilo8"><strong><span class="Estilo19">TOTAL TRAMITES AL</span> <?echo $fecha;?></strong></span></div></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?echo $total;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> 100 %
          </span></td>
        </tr>
    </table>

	</body>
</html>
