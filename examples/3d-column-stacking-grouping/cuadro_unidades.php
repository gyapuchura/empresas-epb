<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

?>
<html>

<head>
  <title>unidades</title>
  <style type="text/css">
<!--
.Estilo7 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #003399; }
.Estilo13 {font-size: 16}
.Estilo17 {font-family: Arial, Helvetica, sans-serif}
.Estilo18 {font-size: 14px; color: #000066; }
-->
  </style>
</head>

<body>

<p>


<table width="726" border="1" align="center">
  <tr>
    <td width="25"><div align="center"><span class="Estilo7">N&ordm;</span></div></td>
    <td width="416"><div align="center"><span class="Estilo7">UNIDAD ORGANIZACIONAL </span></div></td>
    <td width="89"><div align="center"><span class="Estilo7">CANTIDAD</span></div></td>
    <td width="168"><div align="center"><span class="Estilo7"> DETALLE</span></div></td>
  </tr>
  <?

$numero = 1;
$link=Conectarse();
$sql = " SELECT equipos.idequipo, unidad.nombreunidad, direccion.nombredireccion, equipos.idarea FROM equipos, areas, unidad, direccion ";
$sql.= " WHERE equipos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql.= " GROUP BY equipos.idarea ORDER BY equipos.idequipo ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {

	$idarea = $row[3];
	?>
	  <tr>
    <td><div align="left" class="Estilo18"><span class="Estilo17"><? echo $numero;?></span></div></td>
    <td><div align="left" class="Estilo18"><span class="Estilo17"><? echo $row[1];?> <? echo '-';?> <? echo $row[2];?></span></div></td>
    <td><div align="center" class="Estilo18"><span class="Estilo17">&nbsp;

        <?
    $link9=Conectarse();
$sql9 = " SELECT * FROM equipos WHERE idarea= '$idarea' ";
$result9 = mysql_query($sql9, $link9);
$cantidad = mysql_num_rows($result9);

?>
        <? echo $cantidad;?>    </span></div></td>
    <td><div align="center"><span class="Estilo13">

<a href="reporte_unidad.php?idarea=<? echo $idarea;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>

    </span></div></td>
  </tr>




                           <?
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo "";

}


} while ($row = mysql_fetch_array($result));


} else {


echo "]";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>
</p>
</table>
<p>&nbsp;</p>
</body>

</html>