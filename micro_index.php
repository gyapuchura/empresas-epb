<?php include("inc.config.php"); 

$idmacrocurricula = $_POST["macrocurricula"];

$sql_ma =" SELECT macrocurricula.idmacrocurricula, macrocurricula.macrocurricula, modelo_educativo.modelo_educativo, tipo_macrocurricula.tipo_macrocurricula, ";
$sql_ma.=" macrocurricula.codigo, ambito.ambito, macrocurricula.archivo_id, macrocurricula.hash FROM macrocurricula, modelo_educativo, tipo_macrocurricula, ambito  ";
$sql_ma.=" WHERE macrocurricula.idmodelo_educativo=modelo_educativo.idmodelo_educativo AND macrocurricula.idtipo_macrocurricula=tipo_macrocurricula.idtipo_macrocurricula ";
$sql_ma.=" AND macrocurricula.idambito=ambito.idambito AND macrocurricula.idmacrocurricula='$idmacrocurricula' ";
$result_ma = mysqli_query($link,$sql_ma);
$row_ma = mysqli_fetch_array($result_ma);

?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DENOMINACIÓN DE LA MACROCURRICULA</h6>
                                </div>
                                <div class="card-body">
                                <h3><?php echo $row_ma[1];?> --> <?php echo $row_ma[4];?></h3>              
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">MODELO EDUCATIVO</h6>
                                </div>
                                <div class="card-body">
                                <h6><?php echo $row_ma[2];?></h6>              
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">TIPO DE MACROCURRICULA:</h6>
                                </div>
                                <div class="card-body">
                                <h6><?php echo $row_ma[3];?></h6>              
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">AMBITO DE LA MACROCURRICULA</h6>
                                </div>
                                <div class="card-body">
                                <h6><?php echo $row_ma[5];?></h6>              
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DOCUMENTOS DE LA MACROCURRÍCULA</h6>
                                </div>
                                <div class="card-body">

<!------------ EL BULCE DE DOCUMENTOS DE LA MACRO ---->

<?php
$num=1;                    
$sql9 =" SELECT adjunto_macro.idadjunto_macro, adjunto_macro.idmacrocurricula, adjunto_macro.idmacrocurricula, documento_macro.documento_macro,  ";
$sql9.=" adjunto_macro.url, adjunto_macro.codigo, adjunto_macro.archivo_id, adjunto_macro.hash FROM adjunto_macro, documento_macro ";
$sql9.=" WHERE adjunto_macro.iddocumento_macro=documento_macro.iddocumento_macro AND adjunto_macro.idmacrocurricula='$idmacrocurricula' ORDER BY adjunto_macro.idadjunto_macro ";
$result9 = mysqli_query($link,$sql9);
if ($row9 = mysqli_fetch_array($result9)){
mysqli_field_seek($result9,0);
while ($field9 = mysqli_fetch_field($result9)){
} do {
?> 
            <a href="obtiene_archivo_cge.php?id_archivo=<?php echo $row9[6];?>&hash=<?php echo $row9[7];?>" target="_blank" class="btn btn-link" onClick="window.open(this.href, this.target, 'width=800,height=1000,scrollbars=YES, left=300'); return false;"><h6 class="text-primary">
    <?php   
    if ($row9[6] !="" && $row9[7]!="") {
        echo $num.".- ".$row9[3];
    } else {
    }
   ?></h6> </a>     
<br>
<?php
$num=$num+1;
   }
  while ($row9 = mysqli_fetch_array($result9));
} else {
}
?>
<!------------ EL BULCE DE DOCUMENTOS DE LA MACRO ---->                           
                                </div>
                            </div>
                        </div>
                    </div>


<div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">Nª</th>
                                            <th style="width: 35%">MICROCURRÍCULA</th>                                           
                                            <th style="width: 60%">DOCUMENTOS DE LA MICROCURRICULA</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    <?php
$conteo=1;
$sql =" SELECT microcurricula.idmicrocurricula, macrocurricula.macrocurricula, tematica.tematica, microcurricula.competencia_objetivo, nivel_conocimiento.nivel_conocimiento, ";
$sql.=" modalidad.modalidad, microcurricula.carga_horaria, microcurricula.fecha_aprobacion, microcurricula.acta_aprobacion, microcurricula.estado, microcurricula.codigo, modalidad.modalidad FROM microcurricula, tematica, area_conocimiento, macrocurricula, nivel_conocimiento, modalidad WHERE  ";
$sql.=" microcurricula.idarea_conocimiento = area_conocimiento.idarea_conocimiento AND macrocurricula.idmacrocurricula = microcurricula.idmacrocurricula AND microcurricula.idnivel_conocimiento = nivel_conocimiento.idnivel_conocimiento AND ";
$sql.=" microcurricula.idmodalidad = modalidad.idmodalidad AND microcurricula.idtematica=tematica.idtematica AND microcurricula.idmodalidad=modalidad.idmodalidad AND microcurricula.idmacrocurricula='$idmacrocurricula' ORDER BY microcurricula.idmicrocurricula  ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
                                        <tr>
                                            <td><?php echo $conteo;?></td>
                                            <td><h6 class="text text-secondary"><?php echo $row[2];?></h6> <br><br>CÓDIGO:<h5 class="text text-primary"><?php echo $row[10];?></h5> <br>Modalidad:<br><h5 class="text text-primary"><?php echo $row[11];?></h5></td>
                                          
                                            <td class="align-left">  
                                           
<?php  
$numero=1;                 
$sql2 =" SELECT adjunto_micro.idadjunto_micro, adjunto_micro.idmacrocurricula, adjunto_micro.idmicrocurricula, documento_micro.documento_micro, adjunto_micro.url ";
$sql2.=" ,adjunto_micro.archivo_id, adjunto_micro.hash FROM adjunto_micro, documento_micro  ";
$sql2.=" WHERE adjunto_micro.iddocumento_micro=documento_micro.iddocumento_micro AND adjunto_micro.idmicrocurricula='$row[0]' ORDER BY adjunto_micro.idadjunto_micro ";
$result2 = mysqli_query($link,$sql2);
if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {  
?>

<a href="obtiene_archivo_cge.php?id_archivo=<?php echo $row2[5];?>&hash=<?php echo $row2[6];?>" target="_blank" class="btn btn-link" onClick="window.open(this.href, this.target, 'width=800,height=1000,scrollbars=YES, left=300'); return false;">
<?php 
if ($row2[5]!="" && $row2[6]!="") {
    echo "<h6 aling='left'>".$numero.".- ".$row2[3]."</h6>";
} else {
}
?>
</a>
  
<br> 

<?php
$numero = $numero + 1;
   }
  while ($row2 = mysqli_fetch_array($result2));
} else {
}
?>                                        
                                        </td>
                                        </tr>
                                     
                                        <?php
$conteo=$conteo+1;
   }
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
                                    </tbody>
                                </table>
</div>

<script src="js/demo/datatables-demo.js"></script>

<script>
$(document).ready(function() {
$('#example').DataTable( {
    "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]] ,
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first":    "Primero",
            "last":    "Último",
            "next":    "Siguiente",
            "previous": "Anterior"
        },
    }
} );
} );
</script>
<script>
    function openModelPDF(url) {
    $('#modalPdf').modal('show');
    $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/biblioteca_cge/'; ?>'+url);
    }
</script>
