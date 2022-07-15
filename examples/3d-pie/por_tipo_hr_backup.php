<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$gestion        = date("Y");

$sql0 = " SELECT * FROM corres WHERE gestion='$gestion' ";
$result0 = mysqli_query($link,$sql0);
$total = mysqli_num_rows($result0);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='1' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$consistencia = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='2' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$auditoria = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='3' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$supervision = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='4' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$relevamiento = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='5' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$directas = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='6' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$eval_inf_uai = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='7' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$inf_poa = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='8' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$solicitudes = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='9' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$administrativas = mysqli_num_rows($result);

$sql = " SELECT * FROM corres WHERE idtipo_hojaruta='10' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$otras = mysqli_num_rows($result);


$p_consistencia    = ($consistencia*100)/$total;
$p_auditoria       = ($auditoria*100)/$total;
$p_supervision     = ($supervision*100)/$total;
$p_relevamiento    = ($relevamiento*100)/$total;
$p_directas        = ($directas*100)/$total;
$p_eval_inf_uai    = ($eval_inf_uai*100)/$total;
$p_inf_poa         = ($inf_poa*100)/$total;
$p_solicitudes     = ($solicitudes*100)/$total;
$p_administrativas = ($administrativas*100)/$total;
$p_otras           = ($otras*100)/$total;

$por_consistencia    = number_format($p_consistencia, 2, '.', '');
$por_auditoria       = number_format($p_auditoria, 2, '.', '');
$por_supervision     = number_format($p_supervision, 2, '.', '');
$por_relevamiento    = number_format($p_relevamiento, 2, '.', '');
$por_directas        = number_format($p_directas, 2, '.', '');
$por_eval_inf_uai    = number_format($p_eval_inf_uai, 2, '.', '');
$por_inf_poa         = number_format($p_inf_poa, 2, '.', '');
$por_solicitudes     = number_format($p_solicitudes, 2, '.', '');
$por_administrativas = number_format($p_administrativas, 2, '.', '');
$por_otras           = number_format($p_otras, 2, '.', '');


?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>REPORTE_idtipo_hojaruta_HOJA_RUTA</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
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
            text: 'TIPOS DE HOJA DE RUTA'
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
                ['EV. CONSISTENCIA',   <?php echo $p_consistencia;?>],
                ['AUDITORIAS',    <?php echo $p_auditoria;?>],
                ['SUPERVISIONES',   <?php echo $p_supervision ;?>],
                ['RELEVAMIENTOS DE INF.',    <?php echo $p_relevamiento;?>],
                ['CONTRATACIONES DIRECTAS',    <?php echo $p_directas;?>],
                ['EV. INF. UAIs',   <?php echo $p_eval_inf_uai;?>],
                ['EV. INF. POA Y PE',    <?php echo $p_inf_poa;?>],
                ['SOLICITUDES',   <?php echo $p_solicitudes;?>],
                ['TAREAS ADM.',    <?php echo $p_administrativas;?>],
                ['OTROS',    <?php echo $p_otras;?>]

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

<table width="646" border="1" align="center" bordercolor="#009999">

        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">EVALUACION DE CONSISTENCIA</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $consistencia;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7">   <?php echo $por_consistencia;?> %
          </span></td>
        </tr>
         <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">AUDITORIAS</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $auditoria;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $por_auditoria;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">SUPERVISIONES</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $supervision;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_supervision;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">RELEVAMIENTOS DE INFORMACIÓN</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $relevamiento;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_relevamiento;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">CONTRATACIONES DIRECTAS</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $directas;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_directas;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">EVALUACIÓN DE INFORMES DE UAIs</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $eval_inf_uai;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_eval_inf_uai;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">EVALUACIÓN DE INFORMES DE POA Y PE DE UAIs</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $inf_poa;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_inf_poa;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">SOLICITUDES Y DENUNCIAS</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $solicitudes;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_solicitudes;?> %
          </span></td>
        </tr>
        <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">OTROS</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $otras;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $por_otras;?> %
          </span></td>
        </tr>
         <tr>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">TOTAL DE HOJAS DE RUTA </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"><?php echo $total;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> 100 %
          </span></td>
        </tr>
    </table>
	</body>
</html>
