<div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">

<!-- Desarrollado por Ing. Luis Gonzalo Yapuchura -->


        <?php 		/************************* PROGRAMAS DE ESPECIALIZACION *********/
		////////

		$idusuario_ss =  $_SESSION['idusuario_ss'];
		$perfil_ss =  $_SESSION['perfil_ss'];
	    ?>
				    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">BANDEJA ENTRADA<b class="caret"></b></a>
                        <ul class="dropdown-menu">

 <?php
		////////	/****** ELABORA MEMORANDUM ******/			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] =='USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
	 <li><a href="nuevas_hojas_ruta.php">NUEVAS HOJAS DE RUTA</a></li>
	 <li><a href="hojas_ruta_recibidas.php">HOJAS DE RUTA RECIBIDAS</a></li>
	 <li><a href="hojas_ruta_usuario.php">REGISTRO INDIVIDUAL</a></li>

<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>
                    </ul>
                    </li>

<?php		////////	/****** ELABORA MEMORANDUM ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] =='USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
      				<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">CORRESPONDENCIA<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="para_iniciar.php">INICIAR HOJAS DE RUTA</a></li>
							<li><a href="nueva_hoja_ruta.php">NUEVA HOJA DE RUTA</a></li>
							<li><a href="para_modificar_hr.php">MODIFICAR HOJA DE RUTA</a></li>
		<!--   <li><a href="para_adjuntar.php">ADJUNTAR DOCUMENTO</a></li> -->  
		<!--   <li><a href="historico.php">HISTORICO</a></li>  --> 
		<?php
		////////	/****** GESTIONAR USUARIOS ******/			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
	 			<li><a href="usuarios.php">USUARIOS</a></li>
    <!--   <li><a href="modificar_comunicacion.php">MODIFICAR COMUNICACCION</a></li> --> 
 <?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>
                    </ul>
                    </li>
                       <?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>

<?php		////////	/****** EVENTOS DE CAPACITACION ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] == 'USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
      				<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">BUSQUEDAS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						    <li><a href="busquedas.php">BÚSCAR HOJA DE RUTA</a></li>

							<?php
		////////	/****** GESTIONAR USUARIOS ******/			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
	 						<li><a href="concluidas.php">HOJAS DE RUTA CONCLUIDAS</a></li>
							<li><a href="archivadas_hr.php">HOJAS DE RUTA ARCHIVADAS</a></li>
    <!--   <li><a href="modificar_comunicacion.php">MODIFICAR COMUNICACCION</a></li> --> 
 <?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>
                            <li><a href="ver_todo.php">IMPRIMIR INICIO</a></li>
							<li><a href="seguimiento.php">SEGUIMIENTO GENERAL</a></li>
							<li><a href="estadisticas_hr.php">ESTADISTICAS</a></li>
							<li><a href="reportes.php">REPORTESS</a></li>
							<li><a href="formularios_archivo.php">FORMULARIOS ARCHIVO</a></li>
                        </ul>
                    </li>
                       <?php
		} while ($row = mysqli_fetch_array($result));
		} else {
		}
	?>
                        <li class="active"><a href="intranet.php">INICIO</a></li>
                    </ul>
</div>
