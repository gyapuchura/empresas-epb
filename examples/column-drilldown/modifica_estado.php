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
?>
<html>

<head>
  <title>Envio a Financiera</title>
</head>

<body>

            <?
$link2=Conectarse();
$sql2 = " SELECT idderiva_proceso, idproceso FROM deriva_proceso WHERE idusuariod ='302' AND derivada='SI' AND recibida='NO'";
$result2 = mysql_query($sql2, $link2);


 if ($row2 = mysql_fetch_array($result2)){

mysql_field_seek($result2,0);
while ($field2= mysql_fetch_field($result2)){
} do {
	?>





<?
$link=Conectarse();
$sql = "UPDATE procesos SET est_proceso='ENVIADO A PAGO' WHERE idproceso='$row2[1]' ";
$result = mysql_query($sql);

$link3=Conectarse();
$sql3 = " SELECT idproceso, est_proceso FROM procesos WHERE idproceso='$row2[1]' ";
$result3 = mysql_query($sql3, $link3);
$row3 = mysql_fetch_array($result3);

?>
               [<? echo $row2[0];?>, <? echo $row2[1];?>, <? echo $row3[1];?>]

                           <?
} while ($row2 = mysql_fetch_array($result2));


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
AGREGAR CAMBIOS A TABLA PROCESOS
CAMBIO DE ESTADO= ENVIADO A FINANCIERA:

<form name="FORM1" action="modifica_estado.php" method="post">
 <input type="submit" value="MODIFICAR">

</form>



</body>

</html>