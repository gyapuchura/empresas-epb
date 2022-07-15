<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

$idarea =  $_GET['idarea'];

$link1=Conectarse();
$sql1 = "select unidad.nombreunidad, direccion.nombredireccion from unidad, areas, direccion  WHERE areas.iddireccion=direccion.iddireccion AND areas.idunidad=unidad.idunidad AND areas.idarea='$idarea'";
$result1 = mysql_query($sql1, $link1);
$row1 = mysql_fetch_array($result1);

$num_fila = 0;

$link=Conectarse();
$sql = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargos.num_item, cargos.nombrecargo,";
$sql.= " direccion.nombredireccion,unidad.nombreunidad, usuarios.idusuario FROM usuarios,nombres,personal,cargos,areas,unidad,direccion ";
$sql.= " WHERE personal.idnombre=nombres.idnombre AND personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea ";
$sql.= " AND areas.idunidad=unidad.idunidad AND areas.iddireccion=direccion.iddireccion AND usuarios.idnombre=nombres.idnombre ";
$sql.= " AND usuarios.condicion='ACTIVO' AND usuarios.perfil='FUNCIONARIO' AND areas.idarea='$idarea' ";
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
.Estilo26 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo27 {font-size: 14px}
.Estilo28 {font-weight: bold; font-family: Arial, Helvetica, sans-serif;}
.Estilo29 {font-size: 14px; font-weight: bold; }
.Estilo30 {color: #003333}
.Estilo31 {font-family: Arial, Helvetica, sans-serif; font-size: 14px;}
-->
</style>
</head>

<body>

    <p align="center" class="Estilo6">Listado de la unidad de <br />
<? echo $row1[0]; ?> - <? echo $row1[1]; ?></p>


    <table width="751" border="1" align="center" bordercolor="#006666" bgcolor="#FFFFFF">
      <tr>
        <td width="79"><div align="center" class="Estilo26">
          <div align="center">Nº ITEM</div>
        </div></td>
        <td width="283" ><div align="center" class="Estilo27"><span class="Estilo28">NOMBRES</span>
          </div>
        </div></td>
        <td width="250" ><div align="center" class="Estilo27"><span class="Estilo28">CARGO </span>
          </div>
        </div></td>
        <td width="111" ><div align="center" class="Estilo27"><span class="Estilo28">VER KARDEX </span>
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

        <td><div align="left" class="Estilo29">
          <div align="center"><span class="Estilo20"><? echo $row[3]; ?></span></div>
        </div></td>
        <td><div align="left" class="Estilo31">
          <div align="center">
            <p align="center" class="Estilo30"><? echo $row[0]; ?>

               <? echo $row[1]; ?>  <? echo $row[2]; ?></p>
          </div>
        </div></td>
        <td><div align="left" class="Estilo31">
          <div align="center"><span class="Estilo30"><? echo $row[4]; ?></span></div>
        </div></td>
        <td><div align="left" class="Estilo29">
          <div align="center"><span class="Estilo20">
          <a href="imprime_kardex_s.php?funcionario=<?echo $row[7];?>" target="_blank" onClick="window.open(this.href, this.target, 'width=740,height=860,scrollbars=YES'); return false;">
              VER FICHA KARDEX </a>
          </span></div>
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