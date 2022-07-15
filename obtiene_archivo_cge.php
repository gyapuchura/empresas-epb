<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$id_archivo  = $_GET['id_archivo'];
$hash        = $_GET['hash'];

$ch = curl_init();

$token="Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjlhN2ZhZGUyLTRhYTQtNGUxMS1hMmE2LTE5MDc3MzgyYzExMiIsInRpcG8iOiJzaXN0ZW1hIiwic2lzX2NvZGlnbyI6MTIsInNpZ2xhIjoiU0lHQVJFU1QiLCJkZXNjcmlwY2lvbiI6IlNJU1RFTUEgU0lHQSBSRVNUIiwibW9tZW50IjoiMjAyMC0wNy0wM1QxMToxMDowMS0wNDowMCIsImlhdCI6MTU5Mzc4OTAwMX0.e-ogRwi46h9LQb534mWCAzpTHHZtmrlXRc2G7easZ4PHA-iBCNHADi0uOJC3o_qssGiBfn54SZCHQf1S8dJ-MA";

$url_o = 'http://172.16.80.32:7007/api/v1/archivo_digital/obtener_documentos';

$url = $url_o."/".$id_archivo."/".$hash;

//---- Se obtiene el documento del servidor de archivo digital -------//

$response = null;

$curl = curl_init($url) or die("Error");
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization:'.$token,
        'Content-Description: File Transfer'),
    CURLOPT_USERAGENT => 'cURL Request'
]);
$resp = curl_exec($curl);
$codigoRespuesta = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if($codigoRespuesta === 200){
    $respuestaDecodificada = json_decode($resp, true);
    $response = $respuestaDecodificada;
} else {
    if($codigoRespuesta === 400){
        $respuestaDecodificada = json_decode($resp, true);
        $response = $respuestaDecodificada;
    }    
# Error
// echo "Error consultando. Código de respuesta: $codigoRespuesta";
else {
  $response = "Error consultando. Código de respuesta: $codigoRespuesta";  
}
}
curl_close($curl);

//---- se muestran los valores extraidos del json response 

$file_pdf = $response ["datos"]["documento"];
$pdf_mime = $response ["datos"]["mime"];
$pdf_nombre = $response ["datos"]["nombre"];

$conten_type = $pdf_mime;
$nombre = $pdf_nombre;
$file_decode = base64_decode($file_pdf);

header("Content-type:".$conten_type);
header("Content-Disposition: inline; filename=\"".$nombre."\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: " . strlen($file_decode));
echo '%PDF-1.5'.$file_decode;  

?>