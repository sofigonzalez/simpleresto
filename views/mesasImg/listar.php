<a href="javascript:location.reload()"><img src="img/actualizar.png" width="40" height="40"/></a>

    <?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<div style=" display: scroll;
            position:fixed;
            bottom:'.$x['ubicacionV'].'px;
            right:'.$x['ubicacionH'].'px;
            " 
>
<a   href="index.php?controller=mesasImg&action=_nuevoPedido&idMesas='.$x['id'].'" 
    target=""/>';
if ($x['estadoPedidos']==0){
echo '<img src="img/mesa-on.png" width="100" height="100"/>';
}else{
echo '<img src="img/mesa-off.png" width="100" height="100"/>';
}        
echo '</a><p>'.$x['nombre'].'</p></div>';
}