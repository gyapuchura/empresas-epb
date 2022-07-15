<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$idmin =  $_GET['idmin'];

$link1=Conectarse();
$sql1 = "select min from min WHERE idmin='$idmin'";
$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$linkc=Conectarse();
$sqlc = " SELECT usuarios.idusuario FROM usuarios, areas, min WHERE  usuarios.idarea=areas.idarea AND areas.idmin=min.idmin ";
$sqlc.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND areas.idmin='$idmin' ";
$resultc = mysql_query($sqlc,$linkc);
$totalc = mysql_num_rows($resultc);

?>
<!DOCTYPE HTML>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>PROVINCIAS PEA</title>

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
            text: 'DIRECCIONES GENERALES DEPENDIENTES DEL <br /> <? echo $row1[0]; ?> '
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

 <?
$numeroa = 0;

$link=Conectarse();
$sql = "SELECT usuarios.idusuario, areas.iddireccion, direccion.nombredireccion FROM usuarios, areas, direccion WHERE usuarios.idarea=areas.idarea  ";
$sql.= " AND areas.iddireccion=direccion.iddireccion AND areas.idmin='$idmin' GROUP BY areas.iddireccion ";
$result = mysql_query($sql,$link);

$totala = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$link2=Conectarse();
$sql2 = " SELECT usuarios.idusuario FROM usuarios, areas, min WHERE  usuarios.idarea=areas.idarea AND areas.idmin=min.idmin ";
$sql2.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND areas.idmin='$idmin' AND areas.iddireccion='$row[1]'";
$result2 = mysql_query($sql2,$link2);

$cantidad = mysql_num_rows($result2);


?>

 ['<? echo $row[2]; ?>', <? echo $cantidad; ?>]

<?

$numeroa++;

if ($numeroa == $totala) {

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

    <td width="318"><div align="center"><span class="Estilo7">DIRECCION GENERAL</span></div></td>
    <td width="187"><div align="center"><span class="Estilo7">CANTIDAD DE SERVIDORES PUBLICOS </span></div></td>
    <td width="128"><div align="center"><span class="Estilo7">VER POR DIRECCION GENERAL </span></div></td>
  </tr>

  <?
$numeroa = 0;

$link=Conectarse();
$sql = "SELECT usuarios.idusuario, areas.iddireccion, direccion.nombredireccion FROM usuarios, areas, direccion WHERE usuarios.idarea=areas.idarea  ";
$sql.= " AND areas.iddireccion=direccion.iddireccion AND areas.idmin='$idmin' GROUP BY areas.iddireccion ";
$result = mysql_query($sql,$link);

$totala = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

<?
$link2=Conectarse();
$sql2 = " SELECT usuarios.idusuario FROM usuarios, areas, min WHERE  usuarios.idarea=areas.idarea AND areas.idmin=min.idmin ";
$sql2.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND areas.idmin='$idmin' AND areas.iddireccion='$row[1]'";
$result2 = mysql_query($sql2,$link2);

$cantidad = mysql_num_rows($result2);


?>
  <tr>

    <td><div align="center" class="Estilo11"><? echo $row[2]; ?></div></td>
    <td><div align="center" class="Estilo11"><? echo $cantidad; ?></div></td>
    <td><div align="center"><span class="Estilo8"><span class="Estilo10"><span class="Estilo10"><span class="Estilo13">
    <a href="reporte_unidades.php?iddireccion=<?echo $row[1];?>&idmin=<?echo $idmin;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=650,scrollbars=YES'); return false;">VER DIRECCION</a>
    </span></span></span></span></div></td>
  </tr>


<?

$numeroa++;

if ($numeroa == $totala) {

echo "";


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
    <tr>
    <td width="318"><div align="center"><span class="Estilo7">TOTAL EN EL <? echo $row1[0]; ?></span></div></td>
    <td width="187"><div align="center"><span class="Estilo7"><? echo $totalc; ?></span></div></td>
    <td width="128"><div align="center"><span class="Estilo7"> </span></div></td>
  </tr>


</table>


	</body>
</html>
