<?php include("inc.config.php");?>
<?php
$origen = $_POST["origen"];

$sqlh = "  SELECT idcorres, gestion, correlativo, idusuario, no_control ";
$sqlh.= "  FROM corres WHERE origen= '$origen' ORDER BY idcorres DESC LIMIT 1";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);
$nuevo= $rowh[2]+1;
?>
<form name="FORM9" action="guarda_hoja_ruta.php" method="post">
<div class="box-area">
<div class="row">
			<div class="col-lg-12">
				<h2 class="text-primary">HOJA DE RUTA <?php echo $origen; ?> N° <?php echo $nuevo;?></h2>
			</div>
		</div>

<div class="row">
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-10"><textarea class="form-control" rows="3" name="referencia"></textarea></div>
</div>

<div class="row">
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="2" name="procedencia"></textarea></div>
<input type="hidden" name="origen" value="<?php echo $origen;?>">
  <div class="col-md-2"><h4>NUMERO DE CONTROL:</h4></div>
  <div class="col-md-4"><input type="text" class="form-control" name="no_control"/></div>
</div>

<div class="row">
<div class="col-md-3"><h4>FECHA:</h4></div>
<div class="col-md-3">
<input type="text" id="fecha1" class="form-control" name="fecha_corres">
</div>
<div class="col-md-2"><h4>ANEXOS:</h4></div>
<div class="col-md-4"><textarea class="form-control" rows="2" name="anexo"></textarea></div>
</div>


<div class="row">
  <div class="col-md-4"><h4>CLASIFICACIÓN:</h4></div>
  <div class="col-md-8">
  <select name="idcontrol"  id="idcontrol" class="form-control">
<option value="">ELEGIR</option>
 <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/

$sql1 = " SELECT idcontrol, control FROM control ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div>
  </div>

<div class="row">
  <div class="col-md-4"><h4>TIPO DE HOJA DE RUTA:</h4></div>
  <div class="col-md-8">
  <select name="idtipo_hojaruta" id="idtipo_hojaruta" class="form-control"></select>
  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  REGISTRAR HOJA DE RUTA
  </button>
  </div>
  </div>
</div>
</div>
<!---- --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO HOJA DE RUTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Registrar esta HOJA DE RUTA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>     
      </div>
    </div>
  </div>
</div>
</form>
<script src="js/datepicker-es.js"></script>
<script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#idcontrol").change(function () {
            $("#idcontrol option:selected").each(function () {
                control=$(this).val();
                $.post("tipo_hojaruta.php", { control: control }, function(data){
                $("#idtipo_hojaruta").html(data);
                });
            });
    })
    });
</script>