<? include("cabf.php");?>
<? include("inc.config.php");?>
<?
$link=Conectarse();
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$idarea = $_GET['idarea'];

$link=Conectarse();
$sql = " SELECT idequipo, fecha_inv, poseedor, idarea, tipoequipo, procesador, ram, t_madre, t_video, t_sonido, disco_duro, red ";
$sql.= " , t_mouse, monitor, codigo_cpu, codigo_m, estado, observaciones, sistema, nombre_eq, contrasena, direccion_ip, tecnico, lugar, ano, mac FROM equipos ";
$sql.= " WHERE idarea = '$idarea' ";

$result = mysql_query($sql, $link);

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo6 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #006666;
}
.Estilo20 {color: #003333; font-family: Arial, Helvetica, sans-serif;}
.Estilo21 {font-size: 11px; }
.Estilo30 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo31 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo32 {
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo33 {font-size: 9; font-family: Arial, Helvetica, sans-serif; }
.Estilo35 {
	font-size: 9;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>

<body>

<p align="center" class="Estilo6">EQUIPOS DE COMPUTACION CORRESPONDIENTES A:

    <br />

<?
$link7 = Conectarse();
$sql7 = " SELECT  unidad.nombreunidad, direccion.nombredireccion FROM areas, unidad, direccion ";
$sql7.= " WHERE  unidad.idunidad = areas.idunidad AND direccion.iddireccion=areas.iddireccion  ";
$sql7.= " AND areas.idarea = '$idarea'";
$result7 = mysql_query($sql7, $link7);
$row7 = mysql_fetch_array($result7);
	?>

            <? echo $row7[0];?> <? echo '-';?> <? echo $row7[1];?>

   </p>

    <table width="646" border="1" align="center" bordercolor="#006666" bgcolor="#FFFFFF">
      <tr>
        <td width="17"><div align="center" class="Estilo30">
          <div align="center">N&ordm;</div>
        </div></td>
        <td width="274" ><div align="center" class="Estilo30">CARACTERISTICAS  EQUIPO
          </div>
        </div></td>
        <td width="107" ><div align="center" class="Estilo30">RESPONSABLE
        </div>
        </div></td>
        <td width="150" ><div align="center" class="Estilo30">DIRECCION IP  y MAC</div>
        </div></td>
        <td width="64" ><div align="center" class="Estilo31"><strong>VER FICHA TECNICA </strong>
          </div>
        </div></td>
      </tr>

      <?
if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {

?>
        <tr>

        <td><div align="left" class="Estilo21">
          <div align="center"><span class="Estilo20"><? echo $row[0]; ?></span></div>
        </div></td>
        <td><div align="left" class="Estilo21">
          <p class="Estilo32"><strong>PROCESADOR</strong>: <? echo $row[5]; ?><strong> TARJETA MADRE</strong>: <? echo $row[7]; ?><br />
            <strong>MEMORIA</strong>: <? echo $row[6]; ?><br />
            <strong>DISCO DURO</strong> : <? echo $row[10]; ?> <br />

             <strong>MONITOR</strong>: <? echo $row[13]; ?>   <br />
            <strong>ESTADO DEL EQUIPO</strong>: <? echo $row[16]; ?> <strong><br />CODIGO DE ACTIVOS FIJOS CPU</strong>: <? echo $row[14]; ?><br />
             <strong>ODIGO DE ACTIVOS FIJOS MONITOR: <? echo $row[15]; ?> </strong> <strong>DATA DEL EQUIPO</strong>: <? echo $row[24]; ?> </p>
        </div></td>
        <td><div align="left" class="Estilo21">
          <div align="center"><span class="Estilo33">
            <?php
 $link2=Conectarse();
$sql2 = " SELECT nombres.paterno, nombres.materno, nombres.nombres, cargos.nombrecargo, ";
$sql2.= " direccion.nombredireccion,unidad.nombreunidad,areas.idarea FROM usuarios,nombres,personal, ";
$sql2.= " cargos,areas,unidad,direccion WHERE usuarios.idnombre=nombres.idnombre AND personal.idnombre=nombres.idnombre AND ";
$sql2.= " personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad ";
$sql2.= " AND areas.iddireccion=direccion.iddireccion AND usuarios.idusuario='$row[2]'";
$result2 = mysql_query($sql2, $link2);
$row2 = mysql_fetch_array($result2);
?>
            <?echo $row2[2];?> <?echo $row2[0];?> <br />
            <?echo $row2[3];?> <br />
            <?echo $row2[5];?> <br />
            <?echo $row2[4];?></span></div>
        </div></td>
        <td><div align="left" class="Estilo21">
          <div align="center"><span class="Estilo20"><strong> IP:</strong>:<br /><? echo $row[21]; ?> <br /><strong>MAC:<br />
          </strong><span class="Estilo35"><? echo $row[25]; ?></span></span><br />
          <span class="Estilo20"><strong>UBICACION:</strong>:<br /><? echo $row[23]; ?></span></div>
        </div></td>
        <td><div align="left" class="Estilo21">
          <div align="center">

          <a href="imprime_ficha_tecnica.php?idequipo=<?echo $row[0];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=450,scrollbars=YES'); return false;">FICHA TECNICA</a>          </div>
        </div></td>
      </tr>


       <?

} while ($row = mysql_fetch_array($result));


} else {
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>
</table>

</body>
</html>