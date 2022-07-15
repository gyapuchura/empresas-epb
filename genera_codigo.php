<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<html>

<head>
  <title></title>
</head>

<body>

<?php


$sql9 = " SELECT codigo, idambito FROM directriz WHERE iddirectriz='1' ";
$result9 = mysqli_query($link,$sql9);
$row9 = mysqli_fetch_array($result9);

$cod_dir=$row9[0];
$idambito=$row9[1];


$sql0 = " SELECT sigla FROM ambito WHERE idambito='1' ";
$result0 = mysqli_query($link,$sql0);
$row0 = mysqli_fetch_array($result0);
$cod_amb=$row0[0];


$sql = " SELECT sigla FROM nivel_curso WHERE idnivel_curso='2' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
$cod_sigla=$row[0];


$sql1 = " SELECT n_curso FROM correl_curso WHERE iddirectriz='1' AND idnivel_curso='2' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);
$corr_nivel=$row1[0]+1;


$sql8 = " SELECT MAX(idcurso)+1 FROM curso ";
$result8 = mysqli_query($link,$sql8);
$row8 = mysqli_fetch_array($result8);
$cod_cur='CUR-'.$row8[0];

/*creamos el codigo con el formato D-01/CE/E-05/CUR-05 */

$codigo_curso=$cod_dir.'/'.$cod_amb.'/'.$cod_sigla.'-'.$corr_nivel.'/'.$cod_niv.$cod_cur;

echo $codigo_curso;

?>

</body>

</html>