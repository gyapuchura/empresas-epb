<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>OPCIONES MULTIPLES  A TRAVES DE SELECT</h2>


<select id="tipo" name="tipo" onchange="elegir_opcion(this);">
<option value="">Elija un tipo</option>
<option value="op1">Tipo 1</option>
<option value="op2">Tipo 2</option>
<option value="op3">Tipo 3</option>
</select>
    
<div class="opciones">
<div id="op1">
    
<form>Nombre: <input name="op1" required="required" size="30" type="text" />

Direccion: <input name="op1" size="30" type="text" />

DNI: <input name="op1" size="30" type="text" />

<input class="btn" name="submit" type="submit" value="ENVIAR" /></form></div>

<div id="op2"><form>Razón Social: <input name="op1" required="required" size="30" type="text" />

Direccion: <input name="op1" required="required" size="30" type="text" />

RUC: <input name="op1" size="30" type="text" />

<input class="btn" name="submit" type="submit" value="ENVIAR" /></form></div>
</div>

<script>

    function elegir_opcion(combo) {
    $tipo = jQuery(combo).val();
    $campos = jQuery("#"+$tipo).html();
    jQuery("op1").html($campos);
}

</script>

</body>
</html>