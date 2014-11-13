<a href="?controller=clientes&action=_editar">Nuevo Cliente</a>
<table  class="table table-hover">
    <tr><td>Nombre</td><td>Direccion</td><td>Telefono</td><td>Mail</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['direccion'].'</td><td>'.$x['telefono'].'</td><td>'.$x['mail'].'</td>
<td><a href="index.php?controller=clientes&action=_editar&idClientes='.$x['id'].'"  >Editar</a></td>
</td></tr>
';
}
        ?>
</table>
