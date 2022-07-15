<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT idderiva_proceso, idproceso, idareao, idaread, idusuarioo, idusuariod, fechaderiva, referencia, obs ";
$sql.= " FROM deriva_proceso WHERE derivada='SI' AND recibida='SI' AND idproceso='$idproceso' ORDER BY idderiva_proceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>
	 <?
        $idusuarioo = $row[4];
$idusuariod = $row[5];
$link1=Conectarse();
$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.nombrecargo, unidad.nombreunidad,";
$sql1.= " direccion.nombredireccion FROM usuarios, nombres, personal, cargos, areas, unidad, direccion WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql1.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$link2=Conectarse();
$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.nombrecargo, unidad.nombreunidad,";
$sql2.= " direccion.nombredireccion FROM usuarios, nombres, personal, cargos, areas, unidad, direccion WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql2.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$idusuariod' ";

$result2 = mysql_query($sql2, $link2);
$row2 = mysql_fetch_array($result2);

$fecha_derivacion = $row[6];

?>
             ' <? echo $row1[0]; ?>
              <? echo $row1[1]; ?>
              <? echo $row1[2]; ?> <? echo '<br />'; ?>
              <? echo $row1[3]; ?>'




                           <?
$numero++;

if ($numero == $total) {

echo ",";

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


<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT idderiva_proceso, idproceso, idareao, idaread, idusuarioo, idusuariod, fechaderiva, referencia, obs ";
$sql.= " FROM deriva_proceso WHERE derivada='NO' AND recibida='SI' AND idproceso='$idproceso' ORDER BY idderiva_proceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>
	 <?
        $idusuarioo = $row[4];
$idusuariod = $row[5];
$link1=Conectarse();
$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.nombrecargo, unidad.nombreunidad,";
$sql1.= " direccion.nombredireccion FROM usuarios, nombres, personal, cargos, areas, unidad, direccion WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql1.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$link2=Conectarse();
$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.nombrecargo, unidad.nombreunidad,";
$sql2.= " direccion.nombredireccion FROM usuarios, nombres, personal, cargos, areas, unidad, direccion WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql2.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$idusuariod' ";

$result2 = mysql_query($sql2, $link2);
$row2 = mysql_fetch_array($result2);

$fecha_derivacion = $row[6];

?>
             ' <? echo $row1[0]; ?>
              <? echo $row1[1]; ?>
              <? echo $row1[2]; ?> <? echo '<br />'; ?>
              <? echo $row1[3]; ?>'




                           <?
$numero++;

if ($numero == $total) {

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



<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT idderiva_proceso, idproceso, idareao, idaread, idusuarioo, idusuariod, fechaderiva, referencia, obs ";
$sql.= " FROM deriva_proceso WHERE derivada='SI' AND recibida='NO' AND idproceso='$idproceso' ORDER BY idderiva_proceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>
	 <?
        $idusuarioo = $row[4];
$idusuariod = $row[5];
$link1=Conectarse();
$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.nombrecargo, unidad.nombreunidad,";
$sql1.= " direccion.nombredireccion FROM usuarios, nombres, personal, cargos, areas, unidad, direccion WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql1.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$link2=Conectarse();
$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.nombrecargo, unidad.nombreunidad,";
$sql2.= " direccion.nombredireccion FROM usuarios, nombres, personal, cargos, areas, unidad, direccion WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql2.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$idusuariod' ";

$result2 = mysql_query($sql2, $link2);
$row2 = mysql_fetch_array($result2);

$fecha_derivacion = $row[6];

?>
             ' <? echo $row1[0]; ?>
              <? echo $row1[1]; ?>
              <? echo $row1[2]; ?> <? echo '<br />'; ?>
              <? echo $row1[3]; ?>'




                           <?
$numero++;

if ($numero == $total) {

echo ",";

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

