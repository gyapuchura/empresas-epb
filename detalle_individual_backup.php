<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php

date_default_timezone_set('UTC');
$fecha_ram		= date("Ymd");
$fecha 				= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idusuario_rep =  $_GET['idusuario_rep'];

$gestion       = date("Y");
$sql = " SELECT estado FROM estado WHERE idestado='$idestado'  ";
$result = mysqli_query($link,$sql);
$row_e = mysqli_fetch_array($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>DETALLE HOJAS DE RUTA</title>
  <style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #003366;
	font-size: 14px;
	font-weight: bold;
}
.Estilo10 {color: #000000; font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Estilo16 {color: #003366; font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Estilo17 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo18 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #003366;
}
.Estilo18 {
    font-family: Times New Roman;
    font-size: 12px;
    text-align: center;
}
.times {
    font-family: Times New Roman;
    font-size: 12px;
}
.Estilo1 tbody tr td table tbody tr .Estilo10 {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
    font-size: 14px;
}
-->
  </style>
</head>

<body>
<table width="688" border="0" align="center" cellspacing="0">
  <tr>
    <td width="682"><p style="text-align: center; color: #002D5B;"><strong>HOJAS DE RUTA</strong></p>
      <p style="text-align: center"><?php echo $row_e[0];?></p>
      <table width="685" border="1">
        <tbody>
          <tr>
            <td style="color: #002D5B; font-family: Arial; font-size: 12px;">CODIGO</td>
            <td style="color: #002D5B; font-family: Arial; font-size: 12px;">HOJA DE RUTA</td>
            <td style="font-size: 12px; font-family: Arial; color: #002D5B;">N° CONTROL<span style="text-align: center"></span></td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial;">PROCEDENCIA</td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial;">REFERENCIA</td>
            <td style="font-size: 12px; font-family: Arial; color: #002D5B;">FECHA(HR)</td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial; text-align: center;">TIPO </td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial; text-align: center;">VER </td>
          </tr>
          <?php
$numero=1;
$sql =" SELECT idcorres FROM deriva_corres WHERE idusuariod='$idusuario_rep' GROUP BY idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql2 =" SELECT corres.idcorres, corres.origen, corres.referencia, corres.procedencia, corres.fecha_corres, corres.codigo, corres.idestado, corres.correlativo  ";
$sql2.=" ,tipo_hojaruta.tipo_hojaruta, estado.estado FROM corres, tipo_hojaruta, estado WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.idcorres ='$row[0]' ";
$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);
    ?>
          <tr>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $numero;?></td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row2[1];?></td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row2[5];?></td>
            <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[2]?></td>
            <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[3]?></td>
            <td style="text-align: center; font-family: Arial; font-size: 12px;">
            <?php 
            $fecha_elab        = explode('-',$row2[4]);
            $f_corres     = $fecha_elab[2].'/'.$fecha_elab[1].'/'.$fecha_elab[0];
            echo $f_corres;
            ?>
            </td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row[8]?></td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;">
            <a href="imprime_ficha_control.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=80,left=300'); return false;"><h5 class="text-warning">FICHA DE CONTROL</h5></a>    
            </td>
          </tr>
<?php 
}
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
        </tbody>
      </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>