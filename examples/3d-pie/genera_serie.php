<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$gestion        = date("Y");

?>
<h2>REPORTE POR TIPO DE HOJA DE RUTA</h2>

<?php
$sql0 = " SELECT * FROM corres WHERE gestion='$gestion' ";
$result0 = mysqli_query($link,$sql0);
$total = mysqli_num_rows($result0);

$numero = 0;
$sql = " SELECT idtipo_hojaruta FROM corres WHERE gestion='$gestion' GROUP BY idtipo_hojaruta ORDER BY idtipo_hojaruta ";
$result = mysqli_query($link,$sql);
$conteo_tipo = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql_t = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE  idtipo_hojaruta='$row[0]' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);

$sql_c= " SELECT * FROM corres WHERE idtipo_hojaruta='$row[0]' AND gestion='$gestion' ";
$result_c = mysqli_query($link,$sql_c);
$conteo = mysqli_num_rows($result_c);

$p_conteo   = ($conteo*100)/$total;

$porcentaje    = number_format($p_conteo, 2, '.', '');
?>

['<?php echo $row_t[1];?>', <?php echo $porcentaje;?>]

        <?php
        $numero++;
        if ($numero == $conteo_tipo) {
        echo "";
        }
        else {
        echo ",";
        }
        
} while ($row = mysqli_fetch_array($result));
} else {
/*
Si no se encontraron resultados
*/
}
?>
     
   
	</body>
</html>
