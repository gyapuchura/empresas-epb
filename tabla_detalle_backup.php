<div class="row">    
        <div class="col-lg-2">
        <?php
$sql_p =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='2'";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
?> 
        <h6 class="text-primary">EN PROCESO: </h6><h4 class="text-muted">&nbsp;<?php echo $row_p[0]; ?></h4>
        </div>
        <div class="col-lg-2">
        <?php
$sql_c =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='3'";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);
?> 
        <h6 class="text-primary">CONCLUIDAS: </h6><h4 class="text-muted">&nbsp;<?php echo $row_c[0]; ?></h4>
        </div>
        <div class="col-lg-2">
        <?php
$sql_a =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='4'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>
        <h6 class="text-primary">ARCHIVADAS: </h6><h4 class="text-muted">&nbsp;<?php echo $row_a[0]; ?></h4>
        </div>
        <div class="col-lg-2">
        <?php
$sql_t =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);
?>  
        <h6 class="text-primary">TOTAL: </h6><h4 class="text-muted">&nbsp;<?php echo $row_t[0]; ?></h4>
        </div>
    </div>
</div>
