<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];



$prof_1 = '294';   /*ivan aruquipa*/
$prof_2 = '295';   /*claudia tapia*/
$prof_3 = '296';   /*deyci chavez*/
$prof_4 = '305';   /*marco paco*/
$prof_5 = '304';   /*richard balanza*/

$link3=Conectarse();
$sql3 = "SELECT SUM(esp_tecnicas.prec_item) AS subtotal FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso ";
$sql3.= " AND procesos.idprofesional = '294' ";
$resultado3 = mysql_query($sql3,$link3);
$monto_ivan = mysql_fetch_array($resultado3);

$link3=Conectarse();
$sql3 = "SELECT SUM(esp_tecnicas.prec_item) AS subtotal FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso ";
$sql3.= " AND procesos.idprofesional = '295' ";
$resultado3 = mysql_query($sql3,$link3);
$monto_claudia = mysql_fetch_array($resultado3);

$link3=Conectarse();
$sql3 = "SELECT SUM(esp_tecnicas.prec_item) AS subtotal FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso ";
$sql3.= " AND procesos.idprofesional = '296' ";
$resultado3 = mysql_query($sql3,$link3);
$monto_deicy = mysql_fetch_array($resultado3);

$link3=Conectarse();
$sql3 = "SELECT SUM(esp_tecnicas.prec_item) AS subtotal FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso ";
$sql3.= " AND procesos.idprofesional = '305' ";
$resultado3 = mysql_query($sql3,$link3);
$monto_marco = mysql_fetch_array($resultado3);

$monto_total =  $monto_ivan['subtotal'] +  $monto_claudia['subtotal'] + $monto_deicy['subtotal'] +  $monto_marco['subtotal'] ;


$p_ivan     = ($monto_ivan['subtotal']*100)/$monto_total;
$p_claudia  = ($monto_claudia['subtotal'] *100)/$monto_total;
$p_deicy    = ($monto_deicy['subtotal']*100)/$monto_total;
$p_marco    = ($monto_marco['subtotal']*100)/$monto_total;

$por_ivan    = number_format($p_ivan, 2, '.', '');
$por_claudia = number_format($p_claudia, 2, '.', '');
$por_deicy   = number_format($p_deicy, 2, '.', '');
$por_marco   = number_format($p_marco, 2, '.', '');


?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Reporte por Profesional</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo6 {font-size: 14px}
        .Estilo7 {font-size: 16px}
.Estilo8 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; }
.Estilo11 {font-size: 16}
        </style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'RELACION DE MONTOS DE TRAMITES EJECUTADOS POR PROFESIONAL DE CONTRATACION'
        },
        subtitle: {
            text: 'A LA FECHA <?echo $fecha;?>'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: '% del Monto Total Asignado',
            data: [
                ['Ivan Aruquipa', <?echo $por_ivan;?>],
                ['Claudia Tapia', <?echo $por_claudia;?>],
                ['Deicy Chavez', <?echo $por_deicy;?>],
                ['Marco Antonio Paco', <?echo $por_marco;?>],

            ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
<table width="778" border="1" align="center" bordercolor="#009999">


        <tr>
          <td bgcolor="#FFE6D9"><span class="Estilo5">Nombre Profesional de Contrataciones </span></td>
          <td align="center" bgcolor="#FFE6D9"><span class="Estilo5">Montos de tramites  a su cargo </span></td>
          <td align="center" bgcolor="#FFE6D9"><span class="Estilo5">Ver Detalle de Procesos </span></td>
          <td colspan="2" align="center" bgcolor="#FFE6D9"><span class="Estilo5">%</span></td>
        </tr>
        <tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Ivan Aruquipa </span></td>
          <td width="237" align="center" bgcolor="#FFFFFF"><span class="Estilo7 Estilo1 Estilo6"><?echo $monto_ivan['subtotal'];?> Bs</span></td>
          <td width="171" align="center" bgcolor="#FFFFFF">
          <a href="reporte_prof.php?idprofesional=294" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>		</td>
          <td width="84" colspan="2" align="center" bgcolor="#FFFFFF"><span class="Estilo7 Estilo1 Estilo6">   <?echo $por_ivan;?> %
          </span></td>
        </tr>
         <tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Claudia Tapia</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $monto_claudia['subtotal'];?> Bs</span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=295" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"> <?echo $por_claudia;?> %
          </span></td>
        </tr>
         <tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Deicy Chavez </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $monto_deicy['subtotal'];?> Bs</span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=296" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $por_deicy;?> %
          </span></td>
        </tr>
 		<tr>
          <td width="258" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo6">Marco Antonio Paco </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $monto_marco['subtotal'];?> Bs.</span></td>
          <td bgcolor="#FFFFFF" align="center">
          <a href="reporte_prof.php?idprofesional=305" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;"> VER DETALLE </a>          </td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $por_marco;?> %
          </span></td>
        </tr>

        <tr>
          <td width="258" bordercolor="#66FF99" bgcolor="#FFFFAA"><div align="right"><span class="Estilo8 Estilo1 Estilo6">MONTO TOTAL </span></div></td>
          <td align="center" bordercolor="#66FF99" bgcolor="#FFFFAA"><div align="center"><span class="Estilo7 Estilo1 Estilo6"><?echo $monto_total;?> Bs. </span></div></td>
          <td align="center" bordercolor="#66FF99" bgcolor="#FFFFAA">
          <a href="reporte_prof.php" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=690,height=1000,scrollbars=YES'); return false;">MOSTRAR TODO </a>          </td>
          <td colspan="2" align="center" bordercolor="#66FF99" bgcolor="#FFFFAA"><span class="Estilo7 Estilo1 Estilo6"> 100 %
          </span></td>
        </tr>
    </table>


	<table width="779" border="0" align="center">
      <tr>
        <td width="59">&nbsp;</td>
        <td width="715">&nbsp;</td>
      </tr>
      <tr>
        <td><span class="Estilo5">Literal : </span></td>
        <td><span class="Estilo11">
        <?echo isset($monto_total) ? numtoletras($monto_total) : ''; ?>
          <?php

//------    CONVERTIR NUMEROS A LETRAS         ---------------
//------    M?xima cifra soportada: 18 d?gitos con 2 decimales
//------    999,999,999,999,999,999.99
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE BILLONES
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE MILLONES
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE  99/100
//------    Creada por:                        ---------------
//------             ULTIMINIO RAMOS GAL?N     ---------------
//------            uramos@gmail.com           ---------------
//------    10 de junio de 2009. M?xico, D.F.  ---------------
//------    PHP Version 4.3.1 o mayores (aunque podr?a funcionar en versiones anteriores, tendr?as que probar)
function numtoletras($xcifra)
{
    $xarray = array(0 => "Cero",
        1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
        "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
        "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
        100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
    );
//
    $xcifra = trim($xcifra);
    $xlength = strlen($xcifra);
    $xpos_punto = strpos($xcifra, ".");
    $xaux_int = $xcifra;
    $xdecimales = "00";
    if (!($xpos_punto === false)) {
        if ($xpos_punto == 0) {
            $xcifra = "0" . $xcifra;
            $xpos_punto = strpos($xcifra, ".");
        }
        $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
        $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
    }

    $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
    $xcadena = "";
    for ($xz = 0; $xz < 3; $xz++) {
        $xaux = substr($XAUX, $xz * 6, 6);
        $xi = 0;
        $xlimite = 6; // inicializo el contador de centenas xi y establezco el l?mite a 6 d?gitos en la parte entera
        $xexit = true; // bandera para controlar el ciclo del While
        while ($xexit) {
            if ($xi == $xlimite) { // si ya lleg? al l?mite m?ximo de enteros
                break; // termina el ciclo
            }

            $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
            $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres d?gitos)
            for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                switch ($xy) {
                    case 1: // checa las centenas
                        if (substr($xaux, 0, 3) < 100) { // si el grupo de tres d?gitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                        } else {
                            $key = (int) substr($xaux, 0, 3);
                            if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es n?mero redondo (100, 200, 300, 400, etc..)
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Mill?n, Millones, Mil o nada)
                                if (substr($xaux, 0, 3) == 100)
                                    $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                            }
                            else { // entra aqu? si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                $key = (int) substr($xaux, 0, 1) * 100;
                                $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                $xcadena = " " . $xcadena . " " . $xseek;
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 0, 3) < 100)
                        break;
                    case 2: // checa las decenas (con la misma l?gica que las centenas)
                        if (substr($xaux, 1, 2) < 10) {

                        } else {
                            $key = (int) substr($xaux, 1, 2);
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux);
                                if (substr($xaux, 1, 2) == 20)
                                    $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3;
                            }
                            else {
                                $key = (int) substr($xaux, 1, 1) * 10;
                                $xseek = $xarray[$key];
                                if (20 == substr($xaux, 1, 1) * 10)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 1, 2) < 10)
                        break;
                    case 3: // checa las unidades
                        if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

                        } else {
                            $key = (int) substr($xaux, 2, 1);
                            $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                            $xsub = subfijo($xaux);
                            $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                        } // ENDIF (substr($xaux, 2, 1) < 1)
                        break;
                } // END SWITCH
            } // END FOR
            $xi = $xi + 3;
        } // ENDDO

        if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
            $xcadena.= " DE";

        if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
            $xcadena.= " DE";

        // ----------- esta l?nea la puedes cambiar de acuerdo a tus necesidades o a tu pa?s -------
        if (trim($xaux) != "") {
            switch ($xz) {
                case 0:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena.= "UN BILLON ";
                    else
                        $xcadena.= " BILLONES ";
                    break;
                case 1:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena.= "UN MILLON ";
                    else
                        $xcadena.= " MILLONES ";
                    break;
                case 2:
                    if ($xcifra < 1) {
                        $xcadena = "CERO $xdecimales/100 BOLIVIANOS";
                    }
                    if ($xcifra >= 1 && $xcifra < 2) {
                        $xcadena = "UN $xdecimales/100 BOLIVIANOS";
                    }
                    if ($xcifra >= 2) {
                        $xcadena.= " $xdecimales/100 BOLIVIANOS"; //
                    }
                    break;
            } // endswitch ($xz)
        } // ENDIF (trim($xaux) != "")
        // ------------------      en este caso, para M?xico se usa esta leyenda     ----------------
        $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
    } // ENDFOR ($xz)
    return trim($xcadena);
}

// END FUNCTION

function subfijo($xx)
{ // esta funci?n regresa un subfijo para la cifra
    $xx = trim($xx);
    $xstrlen = strlen($xx);
    if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
        $xsub = "";
    //
    if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
        $xsub = "MIL";
    //
    return $xsub;
}

// END FUNCTION
?>
        </span></td>
      </tr>
    </table>
	<p>&nbsp;</p>
	</body>
</html>
