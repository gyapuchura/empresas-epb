<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];



$linkf=Conectarse();
$sqlf = " SELECT nombres.paterno, nombres.materno, nombres.nombres, cargos.nombrecargo, ";
$sqlf.= " direccion.nombredireccion,unidad.nombreunidad,areas.idarea, cargos.num_item FROM usuarios,nombres,personal, ";
$sqlf.= " cargos,areas,unidad,direccion WHERE usuarios.idnombre=nombres.idnombre AND personal.idnombre=nombres.idnombre AND ";
$sqlf.= " personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad ";
$sqlf.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.perfil='FUNCIONARIO' and usuarios.condicion='ACTIVO'";
$sqlf.= " AND personal.domicilio='' AND personal.lugnacimiento='' AND personal.mes_nacimiento='' AND personal.sipase='' AND cargos.tipo_cargo='FUNCIONARIO'";

$resultf = mysql_query($sqlf, $linkf);
$faltan = mysql_num_rows($resultf);

$linkc=Conectarse();
$sqlc = " SELECT nombres.paterno, nombres.materno, nombres.nombres, cargos.nombrecargo, ";
$sqlc.= " direccion.nombredireccion,unidad.nombreunidad,areas.idarea, cargos.num_item FROM usuarios,nombres,personal, ";
$sqlc.= " cargos,areas,unidad,direccion WHERE usuarios.idnombre=nombres.idnombre AND personal.idnombre=nombres.idnombre AND ";
$sqlc.= " personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad ";
$sqlc.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.perfil='FUNCIONARIO' and usuarios.condicion='ACTIVO'";
$sqlc.= " AND cargos.tipo_cargo='FUNCIONARIO'";

$resultc = mysql_query($sqlc, $linkc);
$totalm = mysql_num_rows($resultc);

$cumplieron = $totalm - $faltan;



?>
<!DOCTYPE HTML>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>NO ACTUALIZARON</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
.Estilo7 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; color: #993300; }
        .Estilo8 {font-family: Arial, Helvetica, sans-serif}
.Estilo10 {font-size: 14px}
        .Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000000; }
.Estilo12 {color: #003399}
        .Estilo13 {color: #003399}
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
            text: 'CANTIDAD DE SERVIDORES PUBLICOS QUE CUMPLIERON LA ACTUALIZACION'
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




 ['NO ACTUALIZARON KARDEX', <? echo $faltan; ?>],
  ['SI ACTUALIZARON KARDEX', <? echo $cumplieron; ?>]




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

<div id="container" style="height:450px"></div>

<table width="655" border="1" align="center" bordercolor="#993300">
   <tr>
    <td width="318"><div align="center"><span class="Estilo7">CUMPLIMIENTO</span></div></td>
    <td width="187"><div align="center"><span class="Estilo7">CANTIDAD DE SERVIDORES PUBLICOS </span></div></td>

  </tr>


  <tr>

    <td><div align="center" class="Estilo11">SI ACTUALIZARON</div></td>
    <td><div align="center" class="Estilo11"><? echo $cumplieron; ?></div></td>

  </tr>
     <tr>

    <td><div align="center" class="Estilo11">NO ACTUALIZARON</div></td>
    <td><div align="center" class="Estilo11"><? echo $faltan; ?></div></td>

  </tr>


    <tr>
    <td width="318"><div align="center"><span class="Estilo7">TOTAL EN EL MDCYT</span></div></td>
    <td width="187"><div align="center"><span class="Estilo7"><? echo $totalm; ?></span></div></td>

  </tr>

</table>







	</body>
</html>
