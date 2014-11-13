<?php
header("Refresh: 10; URL='index.php?controller=pedidos&action=_pendientes'");
?>

<a href="?controller=mesas&action=_editar">Nueva Mesa</a>
<table  class="table table-hover">
    <tr><td>Fecha</td><td>Mesa</td><td>Producto</td><td>Estado</td><td></td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['Fecha'].'</td><td>'.$x['Mesa'].'</td><td>'.$x['Producto'].'</td><td>'.$x['Estado'].'</td>
<td><a href="index.php?controller=pedidos&action=_pendientes&idEntregado='.$x['idItem'].'">Entregado</a></td>
</td></tr>
';
}
        ?>
</table>
