<a href="?controller=mesas&action=_editar">Nueva Mesa</a>
<table  class="table table-hover">
    <tr><td>Mesas</td><td>Horizontal</td><td>Vertical</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['ubicacionH'].'</td><td>'.$x['ubicacionV'].'</td>
<td><a href="index.php?controller=mesas&action=_editar&idMesas='.$x['id'].'"  >Editar</a></td>
</td></tr>
';
}
        ?>
</table>
