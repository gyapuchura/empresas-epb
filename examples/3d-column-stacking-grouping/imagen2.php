<? include("inc.config.php");?>
<?
$id= $_GET['id'];

$link5=Conectarse();
$sql5 = " SELECT imagen, tipo_imagen FROM fotos WHERE funcionario = '$id'";
$result5 = mysql_query($sql5, $link5);
$datos = mysql_fetch_assoc($result5);
 //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
$imagen = $datos['imagen'];
$tipo = $datos['tipo_imagen'];
//ahora colocamos la cabeceras correcta segun el tipo de imagen
header("Content-type: $tipo");

echo $imagen;
?>