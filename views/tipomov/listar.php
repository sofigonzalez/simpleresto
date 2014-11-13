<a href="?controller=tipomov&action=_editar">Nuevo Tipo de Movimiento</a>
<table  class="table table-hover">
    <tr><td>Tipo de Movimiento</td><td>Suma / Resta</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['sumaResta'].'</td>
<td><a href="index.php?controller=tipomov&action=_editar&idtipomov='.$x['id'].'"  >Editar</a></td>
</td></tr>
';
}
        ?>
</table>
