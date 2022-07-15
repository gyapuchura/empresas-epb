
 <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT  idproceso, idnombre, idarea FROM procesos WHERE pagado ='SI' AND fecha_comprobante != '0000-00-00' GROUP BY idarea ORDER BY idproceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

       <?
$idarea = $row[2];

/*aqui poner nombre area y direccion */
$link8=Conectarse();
$sql8 = " SELECT  unidad.nombreunidad FROM unidad,areas WHERE areas.idunidad=unidad.idunidad ";
$sql8.= " AND areas.idarea='$idarea' ";
$result8 = mysql_query($sql8, $link8);
$row8 = mysql_fetch_array($result8);


?>

{name: '<? echo $row8[0];?>',
            data: [

            <?
$numero2 = 0;
$link2=Conectarse();
$sql2 = " SELECT  idproceso, idnombre, precio_ref FROM procesos WHERE pagado ='SI' AND fecha_comprobante != '0000-00-00' AND idarea='$idarea'";
$sql2.= " ORDER BY idproceso ";
$result2 = mysql_query($sql2, $link2);
$total2 = mysql_num_rows($result2);

 if ($row2 = mysql_fetch_array($result2)){

mysql_field_seek($result2,0);
while ($field2= mysql_fetch_field($result2)){
} do {
	?>

            [<? echo $row2[0];?>, <? echo $row2[1];?>, <? echo $row2[2];?>]

                           <?
$numero2++;

if ($numero2 == $total2) {

echo "";

}
else {
echo ",";

}


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
            ],
            marker: {
                fillColor: {
                    radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                    stops: [
                        [0, 'rgba(255,255,255,0.5)'],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[<? echo $numero;?>]).setOpacity(0.5).get('rgba')]
                    ]
                }
            }
        }

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