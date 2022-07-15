<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$gestion        = date("Y");

?>
<h2>REPORTE POR TIPO DE HOJA DE RUTA</h2>


<table width="646" border="1" align="center" bordercolor="#009999">

<?php

$sql0 = " SELECT * FROM corres WHERE gestion='$gestion' ";
$result0 = mysqli_query($link,$sql0);
$total = mysqli_num_rows($result0);

$numero = 1;
$sql = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1' GROUP BY corres.idtipo_hojaruta ORDER BY corres.idtipo_hojaruta ";
$result = mysqli_query($link,$sql);

 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql_t = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE  idtipo_hojaruta='$row[0]' AND idcontrol='1' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);

$sql_c= "  SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idtipo_hojaruta='$row[0]' AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='1' ";
$result_c = mysqli_query($link,$sql_c);
$conteo = mysqli_num_rows($result_c);

$p_conteo   = ($conteo*100)/$total;

$porcentaje    = number_format($p_conteo, 2, '.', '');

	?>

        <tr>
          <td width="10" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> <?php echo $numero;?> </span></td>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> <?php echo $row_t[1];?> </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $conteo;?> </span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $porcentaje;?> %
          </span></td>
        </tr>
   

        <?php
        $numero=$numero+1;
} while ($row = mysqli_fetch_array($result));
} else {
/*
Si no se encontraron resultados
*/
}
?>
     
    </table>
	</body>
</html>