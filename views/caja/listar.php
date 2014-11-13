<a href="?controller=caja&action=_editar">Nueva Caja</a>
<table  class="table table-hover">
    <tr><td>Caja</td><td>Fecha</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr>
<td>'.$x['observacion'].'</td><td>'.$x['fecha'].'</td><td>';
if ($x['estado']=='1')
    echo '<a href="index.php?controller=caja&action=_editar&idCaja='.$x['id'].'"  >Editar</a>';

echo '</td><td><a href="index.php?controller=movimientos&action=_listarAction_&idCaja='.$x['id'].'"  >Movimientos</a></td>
<td><a href="index.php?controller=caja&action=_reporte&idCaja='.$x['id'].'"  >Reporte</a></td>
</tr>
';
}
        ?>
</table>
