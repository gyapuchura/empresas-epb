<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$iddireccion =  $_GET['iddireccion'];
$idmin =  $_GET['idmin'];

$link1=Conectarse();
$sql1 = "select nombredireccion from direccion WHERE iddireccion='$iddireccion'";
$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$linkc=Conectarse();
$sqlc = " SELECT usuarios.idusuario FROM usuarios, areas, min WHERE  usuarios.idarea=areas.idarea AND areas.idmin=min.idmin ";
$sqlc.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO'  AND areas.iddireccion='$iddireccion'";
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
            text: 'UNIDADES DEPENDIENTES DE <br /> <? echo $row1[0]; ?> '
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
$sql = "SELECT usuarios.idusuario, areas.idarea, unidad.nombreunidad FROM usuarios, areas, direccion, unidad WHERE usuarios.idarea=areas.idarea  ";
$sql.= " AND areas.iddireccion=direccion.iddireccion AND areas.idunidad=unidad.idunidad AND areas.idmin='$idmin' AND areas.iddireccion='$iddireccion' GROUP BY areas.idarea ";
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
$sql2.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND areas.idarea='$row[1]'";
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

    <td width="318"><div align="center"><span class="Estilo7">UNIDAD ORGANIZACIONAL</span></div></td>
    <td width="187"><div align="center"><span class="Estilo7">CANTIDAD DE SERVIDORES PUBLICOS </span></div></td>
    <td width="128"><div align="center"><span class="Estilo7">VER LISTA DE LA UNIDAD</span></div></td>
  </tr>


 <?
$numeroa = 0;

$link=Conectarse();
$sql = "SELECT usuarios.idusuario, areas.idarea, unidad.nombreunidad FROM usuarios, areas, direccion, unidad WHERE usuarios.idarea=areas.idarea  ";
$sql.= " AND areas.iddireccion=direccion.iddireccion AND areas.idunidad=unidad.idunidad AND areas.idmin='$idmin' AND areas.iddireccion='$iddireccion' GROUP BY areas.idarea ";
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
$sql2.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND areas.idarea='$row[1]'";
$result2 = mysql_query($sql2,$link2);

$cantidad = mysql_num_rows($result2);


?>
  <tr>

    <td><div align="center" class="Estilo11"><? echo $row[2]; ?></div></td>
    <td><div align="center" class="Estilo11"><? echo $cantidad; ?></div></td>
    <td><div align="center"><span class="Estilo8"><span class="Estilo10"><span class="Estilo10"><span class="Estilo13">
    <a href="reporte_servidores.php?idarea=<?echo $row[1];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=950,scrollbars=YES'); return false;">VER NOMINA</a>
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
    <td width="318"><div align="center"><span class="Estilo7">TOTAL EN <br /> <? echo $row1[0]; ?></span></div></td>
    <td width="187"><div align="center"><span class="Estilo7"><? echo $totalc; ?></span></div></td>
    <td width="128"><div align="center"><span class="Estilo7"> </span></div></td>
  </tr>
</table>




	</body>
</html>
