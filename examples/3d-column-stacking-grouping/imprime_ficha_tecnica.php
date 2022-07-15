<? include("cabf.php");?>
<? include("inc.config.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">

<TITLE>.:: FORMULARIO INSCRIPCION ::.</TITLE>
<META content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="estilo.css">

<?
$fecha 			  =  date("Y-m-d");
$idusuario_ss     =  $_SESSION['idusuario_ss'];

$idequipo       =  $_GET['idequipo'];

$link=Conectarse();
$sql = " SELECT idequipo, fecha_inv, poseedor, idarea, tipoequipo, procesador, ram, t_madre, t_video, t_sonido, disco_duro, red ";
$sql.= " , t_mouse, monitor, codigo_cpu, codigo_m, estado, observaciones, sistema, nombre_eq, contrasena, direccion_ip, ano, mac, ";
$sql.= " idimpresora, impresora_ip, lugar, tecnico FROM equipos WHERE idequipo = '$idequipo' ";
$result = mysql_query($sql,$link);
$row = mysql_fetch_array($result);

?>
<style type="text/css">
<!--
.Estilo31 {
	color: #000000;
	font-size: 16px;
	font-weight: bold;
}
.Estilo37 {font-size: 0.7em}
.Estilo44 {font-size: 12px}
.Estilo50 {
	font-size: 1.1em;
	font-weight: bold;
}
.Estilo51 {
	font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo53 {font-size: 10px}
.Estilo55 {font-size: 9px}
.Estilo56 {
	font-size: 14px;
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo57 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
.Estilo58 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<body>
<script type="text/javascript">
</script>
<link type="text/css" rel="stylesheet" href="calendario/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=<? echo $fecha_ram?>" media="screen"></LINK>
<div align="center">




  <table align="center" width="590" bgcolor="#FFFFFF">

    <tr>
      <td width="88" rowspan="3" bgcolor="#FFFFFF"><div align="center"><span class="Estilo31">

        </span><img src="ESCUDO SIN FONCO.png" alt="escudo" width="67" height="56" longdesc="boliviano"><span class="Estilo57">ESTADO PLURINACIONAL DE BOLIVIA </span></div>
      <div align="center"></div></td>
      <td height="30" bgcolor="#FFFFFF"><div align="center"><span class="Estilo53">UNIDAD DE PLANIFICACION Y TECNOLOGIAS DE INFORMACION</span></div></td>
      <td width="86" rowspan="3" bgcolor="#FFFFFF"><div align="center">
        <p><img src="logominculturasweb.png" alt="logo" width="53" height="63" longdesc="chacana"><span class="Estilo57">MINISTERIO DE CULTURAS Y TURISMO </span></p>
        </div></td>
    </tr>
    <tr>
    <td height="30" bgcolor="#FFFFFF"><p align="center" class="Estilo51">FICHA TECNICA </p>      </td>
    </tr>
  <tr>
    <td width="400" height="30" bgcolor="#FFFFFF"><div align="center" class="Estilo56">.  N&ordm; <? echo $idequipo;?> / <? echo date("Y");;?></div></td>
    </tr>
  <tr>
    <td height="30" colspan="3" bgcolor="#FFFFFF"><div align="center">
      <table width="561" border="1" bordercolor="#CCCCCC">
        <tr>
          <td><span class="Estilo57"><strong>TIPO DE EQUIPO (PORTATIL/ESCRITORIO</strong></span></td>
          <td width="128"><span class="Estilo57"><?echo $row[4];?></span></td>
          <td width="136"><span class="Estilo57"><strong>PROCESADOR :</strong></span></td>
          <td width="129"><span class="Estilo57"><?echo $row[5];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>MEMORIA RAM:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[6];?></span></td>
          <td><span class="Estilo57"><strong>MODELO TARJETA MADRE:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[7];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>TARJETA DE VIDEO:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[8];?></span></td>
          <td><span class="Estilo57"><strong>TARJETA DE SONIDO:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[9];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>CAPACIDAD EN DISCO DURO:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[10];?></span></td>
          <td><span class="Estilo57"><strong>INTERFACES DE RED</strong></span></td>
          <td><span class="Estilo57"><?echo $row[11];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>TECLADO Y MOUSE</strong></span></td>
          <td><span class="Estilo57"><?echo $row[12];?></span></td>
          <td><span class="Estilo57"><strong>MONITOR</strong></span></td>
          <td><span class="Estilo57"><?echo $row[13];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>CODIGO DE ACTIVOS FIJOS CPU</strong></span></td>
          <td><span class="Estilo57"><?echo $row[14];?></span></td>
          <td><span class="Estilo57"><strong>CODIGO DE ACTIVOS FIJOS MONITOR</strong></span></td>
          <td><span class="Estilo57"><?echo $row[15];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>ESTADO GENERAL DEL EQUIPO:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[16];?></span></td>
          <td><span class="Estilo57"><strong>DATA DEL EQUIPO</strong></span></td>
          <td><span class="Estilo57"><?echo $row[22];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>OBSERVACIONES:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[17];?></span></td>
          <td><span class="Estilo57"><strong>DISPONIBILIDAD FISICA:</strong></span></td>
          <td><span class="Estilo57"><?echo $row[26];?></span></td>
        </tr>
        <tr>
          <td><span class="Estilo57"><strong>SISTEMA OPERATIVO INSTALADO</strong></span></td>
          <td><span class="Estilo57"><?echo $row[18];?></span></td>
          <td><span class="Estilo57"><strong>NOMBRE DE EQUIPO</strong></span></td>
          <td><span class="Estilo57"><?echo $row[17];?></span></td>
        </tr>
        <tr>
          <td width="140"><span class="Estilo57"><strong>DIRECCION IP ASIGNADA</strong></span></td>
          <td><span class="Estilo57"><?echo $row[21];?></span></td>
          <td><span class="Estilo57"><strong>DIRECCION MAC</strong></span></td>
          <td><span class="Estilo57"><?echo $row[23];?></span></td>
        </tr>
      </table>
      <table width="561" border="1" bordercolor="#CCCCCC">
         <tr>
           <td colspan="3"><div align="center" class="Estilo50">DATOS COMPLEMENTARIOS </div></td>
          </tr>
         <tr>
           <td width="223"><p align="center" class="Estilo57"><?php
 $link2=Conectarse();
$sql2 = " SELECT nombres.paterno, nombres.materno, nombres.nombres, cargos.nombrecargo, ";
$sql2.= " direccion.nombredireccion,unidad.nombreunidad,areas.idarea FROM usuarios,nombres,personal, ";
$sql2.= " cargos,areas,unidad,direccion WHERE usuarios.idnombre=nombres.idnombre AND personal.idnombre=nombres.idnombre AND ";
$sql2.= " personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad ";
$sql2.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$row[2]'";
$result2 = mysql_query($sql2, $link2);
$row2 = mysql_fetch_array($result2);
?> <?echo $row2[2];?> <?echo $row2[0];?> <br /> <?echo $row2[3];?>   <br /> <?echo $row2[5];?><br />
            <?echo $row2[4];?></p>            </td>
           <td width="203"><div align="center"><span class="Estilo57">
             <?php
 $link4=Conectarse();
$sql4 = " SELECT nombres.paterno, nombres.materno, nombres.nombres, cargos.nombrecargo, ";
$sql4.= " direccion.nombredireccion,unidad.nombreunidad,areas.idarea FROM usuarios,nombres,personal, ";
$sql4.= " cargos,areas,unidad,direccion WHERE usuarios.idnombre=nombres.idnombre AND personal.idnombre=nombres.idnombre AND ";
$sql4.= " personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad ";
$sql4.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$row[27]'";
$result4 = mysql_query($sql4, $link4);
$row4 = mysql_fetch_array($result4);
?>
             <?echo $row4[2];?> <?echo $row4[0];?> <br />
             <?echo $row4[3];?> <br />
             <?echo $row4[5];?> <br />
             <?echo $row4[4];?></span></div></td>
           <td width="134"><p align="center"><span class="Estilo44">
              <?php
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */



    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "phpqrcode.php";


    //capturamos el valor de "data"

        $espacio='-';
         $barra='/';
         $idequipoi='Equipo Nro. ';

    $_REQUEST['data'] = $idequipoi.$idequipo.$barra.date(Y).$espacio.$row[5].$espacio.$row[6].$espacio.$row[10].$espacio.$row[14].$espacio.$row[15];
    $_REQUEST['size'] = 2 ;
    $_REQUEST['level'] = M ;


    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);


    $filename = $PNG_TEMP_DIR.'test.png';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) {

        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');

        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    } else {

        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>
        <div align="right">';
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    }

    //display generated file


echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';

?>
           </span></p>             </td>
          </tr>

         <tr>
           <td><div align="center" class="Estilo58"><span class="Estilo55">SERVIDOR PUBLICO A CARGO DEL EQUIPO DE COMPUTACION </span></div></td>
           <td><div align="center" class="Estilo58"><span class="Estilo55">TECNICO QUE REALIZO LA FICHA TECNICA </span></div></td>
           <td><div align="center" class="Estilo37"><span class="Estilo57">Codigo de Inventario </span></div></td>
          </tr>
       </table>
       </div></td>
  </tr>
</table>


</body>
