<? include("cabf.php");?>
<? include("inc.config.php");?>

<?
$link=Conectarse();
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$link0=Conectarse();
$sql0 = " SELECT  nombres, paterno, materno FROM nombres WHERE idnombre='$idnombre_ss' ";
$result0 = mysql_query($sql0, $link0);

$row0 = mysql_fetch_array($result0);

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
.Estilo24 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>
</head>

<body>

    <p align="center" class="Estilo6">TRAMITES REALIZADOS EN EL SISTEMA DE GESTION DE BIENES Y SERVICIOS</p>

    <table width="676" border="1" align="center" bordercolor="#006666" bgcolor="#FFFFFF">
      <tr>
        <td><div align="center" class="Estilo24">
          <div align="center">N&ordm;</div>
        </div></td>
        <td ><span class="Estilo24">OBJETO  </span>          </div></td>
        <td ><span class="Estilo24">FECHA SOLICITUD </span>          </div></td>
        <td ><span class="Estilo24">PREV.</span>          </div></td>
        <td ><span class="Estilo24">PROCESO N&ordm; </span>          </div></td>
        <td ><span class="Estilo24">ESTADO DEL PROCESO </span>          </div></td>
        <td ><span class="Estilo24">A CARGO DE:</span>          </div></td>
      </tr>

      <?
      $num_fila = 0;

      $link=Conectarse();
$sql = " SELECT  idproceso, objeto, fecha_solic, preventivo, proceso_dgaa, observaciones, est_proceso, proceso_concluido, ";
$sql.= " fecha_conformidad, idnombre, idprofesional FROM procesos ORDER BY idproceso  DESC ";
$result = mysql_query($sql, $link);

          if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {



?>


        <tr>

        <td><div align="left" class="Estilo21">
          <div align="center"><span class="Estilo20"><? echo $row[0]; ?></span></div>
        </div></td>
        <td><div align="left" class="Estilo21"><span class="Estilo20"><? echo $row[1]; ?>
        <br />
        <strong>SOLICITANTE:</strong>
<?
$link3=Conectarse();
$sql3 = " SELECT nombres.nombres, nombres.paterno, cargos.nombrecargo, unidad.nombreunidad, direccion.nombredireccion, ";
$sql3.= " usuarios.idusuario, areas.idarea FROM usuarios,nombres,personal,cargos,areas,unidad,direccion ,procesos ";
$sql3.= " WHERE usuarios.idnombre=nombres.idnombre AND nombres.idnombre=personal.idnombre AND personal.idcargo=cargos.idcargo  ";
$sql3.= " AND procesos.idnombre=nombres.idnombre AND cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad  ";
$sql3.= " AND areas.iddireccion=direccion.iddireccion AND procesos.idnombre='$row[9]' AND procesos.idproceso='$row[0]' ";


$result3 = mysql_query($sql3, $link3);
$row3 = mysql_fetch_array($result3);
?>       <? echo $row3[0]; ?> <? echo $row3[1]; ?> <br /> 
<strong><? echo $row3[3]; ?><br />
<? echo $row3[4]; ?></strong></span></div></td>
        <td><div align="left" class="Estilo21"><span class="Estilo20"><? echo $row[2]; ?></span></div></td>
        <td><div align="left" class="Estilo21"><span class="Estilo20"><? echo $row[3]; ?>

         <?
        $link2=Conectarse();
$sql2 = "SELECT nombres.nombres, nombres.paterno FROM nombres, usuarios WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario = '$row[10]'";
$result2 = mysql_query($sql2, $link2);
$row2 = mysql_fetch_array($result2);

?>

        </span></div></td>
        <td><div align="left" class="Estilo21"><span class="Estilo20"><? echo $row[4]; ?></span></div></td>
        <td><div align="left" class="Estilo21"><span class="Estilo20"><? echo $row[6]; ?></span></div></td>
        <td><div align="left" class="Estilo21"><span class="Estilo20">

        <?
        $link1=Conectarse();
$sql1 = "SELECT nombres.nombres, nombres.paterno FROM nombres, usuarios WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario = '$row[10]'";
$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

?>

<? echo $row1[0]; ?> <? echo $row1[1]; ?>
 </span></div></td>
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