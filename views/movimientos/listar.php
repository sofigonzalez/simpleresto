
<a href="?controller=movimientos&action=_editar&idCaja=<?=$_GET['idCaja'] ?>">Nuevo Movimiento</a>
<table  class="table table-hover">
    <tr><td>Observacion</td><td>Importe</td><td>Tipo Movimiento</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr>
<td>'.$x['observacion'].'</td><td>'.$x['importe'].'</td><td>'.$x['tipomov'].'</td><td>';
//if ($x['estado']=='1')
echo '<a href="index.php?controller=movimientos&action=_editar&idCaja='.$x['id_caja'].'&idMovimientos='.$x['id'].'"  >Editar</a>';
echo '</td></tr>';
}
        ?>
</table>