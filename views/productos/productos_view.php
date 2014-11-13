<a href="?controller=productos&action=editar">Nuevo Producto</a>
<table  class="table table-hover">
<tr><td>Productos</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['precio'].'</td>
<td><a href="index.php?controller=productos&action=_editar&idProducto='.$x['id'].'"  >Editar</a></td>
</td></tr>
';
}
        ?>
</table>
