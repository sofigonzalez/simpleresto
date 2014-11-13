<form action="" method="post">
    
    <select name="id_productos">
        <option value="0">Seleccione un Producto</option>
<?php
while($x = mysql_fetch_assoc($datos['productos']))
{
echo '<option value="'.$x['id'].'">'.$x['nombre'].'</option>';
}
        ?>
    </select><br>
    <input type="submit" name="Agregar" value="Agregar">
</form>




<table border = 1>
    <tr><td>Nombre</td><td>Precio</td><td>Estado</td></tr>
<?php
$total=0;

while($x = mysql_fetch_assoc($datos['items']))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['precioItem'].'</td><td>'.$x['estadoItem'].'</td>
<td><a href="index.php?controller=mesasImg&action=_nuevoPedido&idMesas='.$x['idMesas'].'&idBorrar='.$x['idBorrar'].'"  >Borrar</a></td>
</td></tr>
';

$total=$total+$x['precioItem'];
}
        ?>
</table>

<br>
<?php
        echo 'Total: '.$total;
?>
<br /><br />
<form action="index.php?controller=pedidos&action=_enMesa&idMesas=<?=$_GET['idMesas']?>" method="post">
<input type="submit" name="boton" value="Cerrar Pedido">
</form>