<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");
$gestion        = date("Y");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>REPORTE_CONTROL_INTERNO</title>

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
            text: 'CONTROL INTERNO'
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

<?php
$sql0 = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1'";
$result0 = mysqli_query($link,$sql0);
$total = mysqli_num_rows($result0);

$numero = 0;
$sql = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1' GROUP BY corres.idtipo_hojaruta ORDER BY corres.idtipo_hojaruta ";
$result = mysqli_query($link,$sql);
$conteo_tipo = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql_t = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE  idtipo_hojaruta='$row[0]' AND idcontrol='1'";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);

$sql_c= " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idtipo_hojaruta='$row[0]' AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1'";
$result_c = mysqli_query($link,$sql_c);
$conteo = mysqli_num_rows($result_c);

$p_conteo   = ($conteo*100)/$total;
$porcentaje    = number_format($p_conteo, 2, '.', '');

?>

['<?php echo $row_t[1];?>', <?php echo $porcentaje;?>]

        <?php
        $numero++;
        if ($numero == $conteo_tipo) {
        echo "";
        }
        else {
        echo ",";
        }
        
} while ($row = mysqli_fetch_array($result));
} else {
/*
Si no se encontraron resultados
*/
}
?>
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
          <td width="10" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> N° </span></td>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> TIPO DE HOJA DE RUTA</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7">CANTIDAD</span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7">  %
          </span></td>
        </tr>

<?php

$numeroa = 1;
$sqla = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1' GROUP BY corres.idtipo_hojaruta ORDER BY corres.idtipo_hojaruta ";
$resulta = mysqli_query($link,$sqla);
$conteo_tipoa = mysqli_num_rows($resulta);

 if ($rowa = mysqli_fetch_array($resulta)){
mysqli_field_seek($resulta,0);
while ($fielda = mysqli_fetch_field($resulta)){
} do {

$sql_ta = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE  idtipo_hojaruta='$rowa[0]' AND idcontrol='1' ";
$result_ta = mysqli_query($link,$sql_ta);
$row_ta = mysqli_fetch_array($result_ta);

$sql_ca = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idtipo_hojaruta='$rowa[0]' AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1' ";
$result_ca = mysqli_query($link,$sql_ca);
$conteoa = mysqli_num_rows($result_ca);

$p_conteoa   = ($conteoa*100)/$total;

$porcentajea    = number_format($p_conteoa, 2, '.', '');

	?>

        <tr>
          <td width="10" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> <?php echo $numeroa;?> </span></td>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> <?php echo $row_ta[1];?> </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $conteoa;?> </span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $porcentajea;?> %
          </span></td>
        </tr>
   
        <?php
        $numeroa=$numeroa+1;
} while ($rowa = mysqli_fetch_array($resulta));
} else {
/*
Si no se encontraron resultados
*/
}
?>
     
    </table>
   
	</body>
</html>
