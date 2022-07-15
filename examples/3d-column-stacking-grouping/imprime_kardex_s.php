<? include("cabf.php");?>
<? include("inc.config.php");?>
<?
$link=Conectarse();
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];
$idarea_ss     =  $_SESSION['idarea_ss'];

$funcionario     =  $_GET['funcionario'];

$link5=Conectarse();
$sql5 = " SELECT idnombre FROM usuarios WHERE idusuario='$funcionario'";
$result5 = mysql_query($sql5, $link5);
$row5 = mysql_fetch_array($result5);
$idnombre=$row5[0];
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo40 {color: #FFFFFF}
.Estilo41 {
	font-weight: bold;
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
}
.Estilo43 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
.Estilo44 {color: #000000}
.Estilo45 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo46 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo48 {font-family: Arial, Helvetica, sans-serif}
.Estilo49 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
.Estilo50 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.Estilo51 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; }
.Estilo52 {font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; }
.Estilo53 {font-size: 10px; font-weight: bold; }
-->
</style>
</head>

<body>

<span class="Estilo40">
<script type="text/javascript">
</script>
</span>
<p align="left" class="Estilo40">
    <SCRIPT type="text/javascript" src="calendario/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=<? echo $fecha_ram?>"></script>
<table width="700" border="1" align="center">
  <tr>
    <td><table width="700" border="1" bordercolor="#CCCCCC">
      <tr>
        <td width="148" height="149"><div align="center">
         <p class="Estilo50">ESTADO PLURINACIONAL DE BOLIVIA </p>
          <p><img src="logominculturasweb.png" alt="CHACANA" width="78" height="90"></p>
		  <p class="Estilo50">MINISTERIO DE CULTURAS Y TURISMO </p>
        </div></td>
        <td width="403"><p align="center" class="Estilo51">DIRECCION GENERAL DE ASUNTOS ADMINISTRATIVOS</p>
          <p align="center" class="Estilo52">UNIDAD DE RECURSOS HUMANOS  </p></td>
        <td width="127"><div align="center">
          <p><img src="imagen2.php?id=<?echo $funcionario;?>"/></p>

        </div></td>
      </tr>
    </table>
      <p align="center"><span class="Estilo41">DATOS GENERALES DEL FUNCIONARIO </span>
        <?
/*
Realizamos la consulta a la base datos
note que estamos trabajando con "inner join"
para relacionar 2 tablas libros y autor, con
"$sql .=" se puede separar la consulta en 2 l&iacute;neas a mas,
este tipo de consulta es para buscar un dato exacto
en la base de datos "where libros.titulo = '$libro'"
*/
$link=Conectarse();
$sql = " SELECT nombres.paterno, nombres.materno, nombres.nombres, personal.lugnacimiento, ";
$sql.= " personal.departamento, personal.fechanac, nombres.ci, ";
$sql.= " nombres.exp,personal.libmilitar,personal.estadocivil,personal.licconducir,";
$sql.= " personal.telefono,personal.celular,personal.domicilio,personal.nit,personal.nua,personal.afp,personal.segmedico,";
$sql.= " personal.regprofesional,personal.profesion,personal.titulo,bancos.nombrebanco,personal.cuenta,personal.decjurada, ";
$sql.= " cargos.num_item,personal.biometrico, cargos.nombrecargo,direccion.nombredireccion,unidad.nombreunidad,  ";
$sql.= " personal.tipofuncionario, personal.fechaingreso,cargos.haber_basico,   ";
$sql.= " personal.sipase, personal.aymara, personal.titulo_nal  ";
$sql.= " FROM nombres,personal, cargos,areas,unidad,direccion,bancos WHERE personal.idnombre=nombres.idnombre AND ";
$sql.= " personal.idcargo=cargos.idcargo AND  cargos.idarea=areas.idarea AND areas.idunidad=unidad.idunidad ";
$sql.= " AND areas.iddireccion=direccion.iddireccion AND personal.idbanco=bancos.idbanco AND personal.idnombre='$idnombre' ";

$result = mysql_query($sql, $link);
$row = mysql_fetch_array($result)

/*
Con "$row" mostramos los datos y
mostramos los registros
*/
?>
    </p>
      <table width="641" border="1" align="center" bordercolor="#CCCCCC">
        <tr>
          <th width="179" bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">APELLIDO PATERNO </div>
          </div></th>
          <td width="164" bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[0]; ?></div></td>
          <td width="145" bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">APELLIDO MATERNO </span></div></td>
          <td width="125" bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[1];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">NOMBRES</div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[2];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">LUGAR DE NACIMIENTO </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[3];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">DEPARTAMENTO</div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[4];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">FECHA DE NACIMIENTO </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[5];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">CEDULA DE IDENTIDAD </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[6];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">EXPEDIDO EN </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[7];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">No. DE LIBRETA DE SERVICIO MILITAR </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[8];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">ESTADO CIVIL </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[9];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">No. DE LICENCIA DE CONDUCIR </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[10];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">TELEFONOS DE REFERENCIA </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[11];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">TELEFONO CELULAR </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[12];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">DOMICILIO ZONA/CALLE/N&ordm;</span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[13];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">No N.I.T. </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[14];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">No. DE N.U.A. </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[15];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">A.F.P.</div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[16];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">No. DE SEGURO MEDICO </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[17];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">No. DE REGISTRO PROFESIONAL </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[18];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">PROFESION</span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[19];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="left" class="Estilo46">
              <div align="right">No. DE TITULO PROFESIONAL </div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[20];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">BANCO</span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[21];?></div></td>
        </tr>
        <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="center" class="Estilo53">
          <div align="right"><span class="Estilo48">No. DE CUENTA BANCARIA </span></div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[22];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">DECLARACION JURADA </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[23];?></div></td>
        </tr>
         <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="center" class="Estilo53">
          <div align="right"><span class="Estilo48">No. DE CERTIFICADO SIPPASSE </span></div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[32];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">No. DE CERTIFICADO DE IDIOMA(S) ORIGINARIO(S) </span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[33];?></div></td>
        </tr>
         <tr>
          <th bgcolor="#EEEEEE" scope="row"><div align="center" class="Estilo53">
          <div align="right"><span class="Estilo48">TITULO EN PROVISION NACIONAL </span></div>
          </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49"><? echo $row[34];?></div></td>
          <td bgcolor="#EEEEEE"><div align="right" class="Estilo53"><span class="Estilo48">&nbsp;</span></div></td>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo49">&nbsp;</div></td>
        </tr>
      </table>
      <p align="center"><span class="Estilo43">DATOS INSTITUCIONALES </span></p>
      <table width="572" border="1" align="center" bordercolor="#CCCCCC">
        <tr>
          <th width="234" bordercolor="#FFFFFF" bgcolor="#EEEEEE" scope="row"><div align="right" class="Estilo45">BIOMETRICO</div></th>
          <td width="322" bgcolor="#FFFFFF"><div align="left" class="Estilo46"><? echo $row[25];?></div></td>
        </tr>
        <tr>
          <th bordercolor="#FFFFFF" bgcolor="#EEEEEE" scope="row"><div align="right" class="Estilo45">CARGO</div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo46"><? echo $row[26];?></div></td>
        </tr>
        <tr>
          <th bordercolor="#FFFFFF" bgcolor="#EEEEEE" scope="row"><div align="right" class="Estilo45">DIRECCION</div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo46"><? echo $row[27];?></div></td>
        </tr>
        <tr>
          <th bordercolor="#FFFFFF" bgcolor="#EEEEEE" scope="row"><div align="right" class="Estilo45">UNIDAD</div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo46"><? echo $row[28];?></div></td>
        </tr>
        <tr>
          <th bordercolor="#FFFFFF" bgcolor="#EEEEEE" scope="row"><div align="right" class="Estilo45">TIPO DE FUNCIONARIO </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo46"><? echo $row[29];?></div></td>
        </tr>
        <tr>
          <th bordercolor="#FFFFFF" bgcolor="#EEEEEE" scope="row"><div align="right" class="Estilo45">FECHA DE INGRESO A LA ENTIDAD </div></th>
          <td bgcolor="#FFFFFF"><div align="left" class="Estilo46"><? echo $row[30];?></div></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p align="left" class="Estilo40">

<tr>
  <td colspan="2" class="Estilo44">&nbsp;</td>
</tr>
  <tr>
    <td width="877" bgcolor="#CCCCCC" class="Estilo40"><p align="center" class="Estilo43">&nbsp;</p>
      <p>&nbsp;</p>

</body>
</html>





