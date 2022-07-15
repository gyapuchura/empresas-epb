
<?
$link4=Conectarse();
$sql4 = " SELECT * FROM procesos WHERE idarea='$row5[2]'";
$result4 = mysql_query($sql4, $link4);

$cantidad_area = mysql_num_rows($result4);

?>


             <? echo $cantidad_area; ?>