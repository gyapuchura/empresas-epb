<? include("cabf.php");?>
<? include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss =  $_SESSION['idnombre_ss'];

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
#container {
	height: 400px;
	min-width: 310px;
	max-width: 800px;
	margin: 0 auto;
}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #006699; font-weight: bold; }
        .Estilo12 {font-size: 14px; color: #006699; font-family: Arial, Helvetica, sans-serif;}
        .Estilo14 {font-family: Arial, Helvetica, sans-serif}
        .Estilo15 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
        </style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'EJECUCION DE PRESUPUESTO POR UNIDADES SOLICITANTES'
        },

        xAxis: {
            categories: [

<?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion AND procesos.preventivo='SI' ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>

            '<? echo $row[1];?> <? echo '-';?> <? echo $row[2];?>'


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


echo "]";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>

       ]
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Number of fruits'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'Monto en Bs. al <? echo $fecha;?>',
            data: [

            <?

$numero = 0;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion AND procesos.preventivo='SI' ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$num_servicios = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


<?
$idarea = $row[3];


$link3=Conectarse();
$sql3 = " SELECT SUM(esp_tecnicas.prec_item) AS subtotal FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso AND procesos.preventivo='SI' ";
$sql3.= " AND procesos.idarea='$idarea' ";
$resultado = mysql_query($sql3,$link3);
$registro = mysql_fetch_array($resultado);

?>

<?echo $registro['subtotal'];?>



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
            stack: 'male'
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

<table width="890" border="1" align="center">
  <tr>
    <td width="320"><span class="Estilo11">Nombre Unidad Solicitante </span></td>
    <td width="280"><span class="Estilo11">Direccion</span></td>
    <td width="209"><span class="Estilo11">MONTO CON CERTIFICACION PRESUPUESTARIA </span></td>
  </tr>

  <?

$numero = 1;
$link=Conectarse();
$sql = " SELECT procesos.idproceso, unidad.nombreunidad, direccion.nombredireccion, procesos.idarea FROM procesos, areas, unidad, direccion ";
$sql.= " WHERE procesos.idarea=areas.idarea AND unidad.idunidad=areas.idunidad AND direccion.iddireccion=areas.iddireccion AND procesos.preventivo='SI' ";
$sql.= " GROUP BY procesos.idarea ORDER BY procesos.idproceso ";
$result = mysql_query($sql, $link);

$total = mysql_num_rows($result);

 if ($row = mysql_fetch_array($result)){

mysql_field_seek($result,0);
while ($field = mysql_fetch_field($result)){
} do {
	?>


  <tr>
    <td><span class="Estilo15"><? echo $row[1];?></span></td>
    <td><span class="Estilo15"><? echo $row[2];?></span></td>
    <td align="center"><span class="Estilo15">

    <?
$idarea = $row[3];


$link3=Conectarse();
$sql3 = "SELECT SUM(esp_tecnicas.prec_item) AS subtotal FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso AND procesos.preventivo='SI' ";
$sql3.= " AND procesos.idarea='$idarea' ";
$resultado = mysql_query($sql3,$link3);
$registro = mysql_fetch_array($resultado);
$parcial = $registro['subtotal'];
$por_parcial    = number_format($parcial, 2, '.', ',');

?>

<?echo $por_parcial;?> Bs.

   </span> </td>
  </tr>

    <?
$numero++;


} while ($row = mysql_fetch_array($result));


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

</table>










<table width="890" border="1" align="center">
  <tr>
    <td><span class="Estilo11">MONTO TOTAL </span><span class="Estilo12">CON CERTIFICACION PRESUPUESTARIA </span></td>
    <td><div align="center" class="Estilo14"><?



$link3=Conectarse();
$sql3 = "SELECT SUM(esp_tecnicas.prec_item) AS total FROM procesos,esp_tecnicas WHERE procesos.idproceso=esp_tecnicas.idproceso AND procesos.preventivo='SI'";
$resultado = mysql_query($sql3,$link3);
$monto = mysql_fetch_array($resultado);
$p_total = $monto['total'];

$por_total    = number_format($p_total, 2, '.', ',');

?>
    <?echo $por_total;?></div>    </td>
  </tr>
  <tr>
    <td width="342"><div align="center"><span class="Estilo11">LITERAL</span></div></td>
    <td width="532"><div align="center" class="Estilo15"><?echo isset($p_total) ? numtoletras($p_total) : ''; ?>
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
?></div></td>
  </tr>
</table>

	</body>
</html>
