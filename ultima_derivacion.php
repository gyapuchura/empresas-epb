<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$idcorres =  $_GET['idcorres'];


$sql3 = "SELECT fecha_corres, referencia, estado, codigo FROM corres WHERE idcorres='$idcorres'";
$result3 = mysqli_query($link,$sql3);
$row3 = mysqli_fetch_array($result3);

$fecha_corres = $row3[0];
$referencia = $row3[1];
$estado = $row3[2];
$codigo = $row3[3];

?>

<!DOCTYPE HTML>
<html>

<head>

</head>

<p align="center" class="Estilo6">ULTIMA DERIVACION</p>

<?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida";
$sql3.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='10'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {

?>

<table width="882" border="1" align="center" bordercolor="#006699">
<tr>
<td width="58" ><div align="center" class="Estilo9"><span class="Estilo79">N&ordm; Deriv.</span></div></td>
<td width="163" ><div align="center" class="Estilo9"><span class="Estilo79">Remitemte</span></div></td>
<td width="160" ><div align="center" class="Estilo9"><span class="Estilo79">Destinatario</span></div></td>
<td width="104" ><div align="center" class="Estilo9"><span class="Estilo79">Fecha Derivacion </span></div></td>
<td width="174" ><div align="center" class="Estilo9"><span class="Estilo79">Comentario</span></div></td>
<td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Derivada</span></div></td>
<td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Recibida</span></div></td>
</tr>




<?php
$origen = $row3[2];
$destino = $row3[3];


$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);


$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
<tr>

<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[0]; ?></span></div></td>

<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
<?php echo $row4[0]; ?>
<?php echo $row4[1]; ?>
<?php echo $row4[2]; ?><br />
<?php echo $row4[3]; ?>

</span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
<?php echo $row5[0]; ?>
<?php echo $row5[1]; ?>
<?php echo $row5[2]; ?><br />
<?php echo $row5[3]; ?>
</td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[4]; ?></span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[5]; ?></span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[6]; ?></span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[7]; ?></span></div></td>

</tr>


<?php} while ($row3 = mysqli_fetch_array($result3));



} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/

}
?>
</table>


<?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida";
$sql3.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {

?>
<table width="891" border="1" bordercolor="#006699">
<tr>
<td width="59" ><div align="center" class="Estilo12"><span class="Estilo79">N&ordm; Deriv.</span></div></td>
<td width="162" ><div align="center" class="Estilo12"><span class="Estilo79">Remitemte</span></div></td>
<td width="156" ><div align="center" class="Estilo12"><span class="Estilo79">Destinatario</span></div></td>
<td width="110" ><div align="center" class="Estilo12"><span class="Estilo79">Fecha Derivacion </span></div></td>
<td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Comentario</span></div></td>
<td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Derivada</span></div></td>
<td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Recibida</span></div></td>
</tr>


<?php
$origen = $row3[2];
$destino = $row3[3];


$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);


$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
<tr>

<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[0]; ?></span></div></td>

<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row4[0]; ?>
<?php echo $row4[1]; ?>
<?php echo $row4[2]; ?><br />
<?php echo $row4[3]; ?>
</span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row5[0]; ?>
<?php echo $row5[1]; ?>
<?php echo $row5[2]; ?><br />
<?php echo $row5[3]; ?>
</span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[4]; ?></span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[5]; ?></span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[6]; ?></span></div></td>
<td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[7]; ?></span></div></td>
</tr>


<?php} while ($row3 = mysqli_fetch_array($result3));



} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/

}
?>
</table>












<p align="center" class="Estilo6">ULTIMA DERIVACION</p>

<?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida";
$sql3.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='10'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
?>

<?php
$origen = $row3[2];
$destino = $row3[3];


$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);


$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);
?>

Remitemte: <?php echo $row4[0]; ?> <?php echo $row4[1]; ?> <?php echo $row4[2]; ?> </br>
Destinatario: <?php echo $row5[0]; ?> <?php echo $row5[1]; ?> <?php echo $row5[2]; ?></br>
Fecha Derivacion: <?php echo $row3[4]; ?></br>
Derivada: <?php echo $row3[6]; ?> - 
Recibida: <?php echo $row3[7]; ?>

<?php} while ($row3 = mysqli_fetch_array($result3));

} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>
<?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida";
$sql3.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
?>
<?php
$origen = $row3[2];
$destino = $row3[3];


$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);


$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";
$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
Remitemte: <?php echo $row4[0]; ?> &nbsp;<?php echo $row4[1]; ?> &nbsp;<?php echo $row4[2]; ?></br>
Destinatario: <?php echo $row5[0]; ?> &nbsp;<?php echo $row5[1]; ?> &nbsp;<?php echo $row5[2]; ?></br>
Fecha Derivacion: <?php echo $row3[4]; ?></br>
Derivada: <?php echo $row3[6]; ?> - 
Recibida: <?php echo $row3[7]; ?>
<?php} while ($row3 = mysqli_fetch_array($result3));

} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>







</html>
