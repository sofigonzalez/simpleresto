<a href="?controller=usuarios&action=editar">Nuevo Usuario</a>
<table class="table table-hover">
<tr><td>NOMBRE</td><td>USUARIO</td><td></td><td></td></tr>
<?php


while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['usuario'].'</td>
<td><a href="index.php?controller=usuarios&action=_editar&idUsuario='.$x['id'].'&usuario='.$x['usuario'].'"  >Editar</a></td>
<td><a href="index.php?controller=permisos&idUsuario='.$x['id'].'&usuario='.$x['usuario'].'"  >Permisos</a></td>
</td></tr>
';
}

        ?>
</table>


