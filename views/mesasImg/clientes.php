<a href="?controller=clientes&action=_editar">Nuevo Cliente</a>

<form action="" method="post">
    <input placeholder="Observaciones" type="text" name="observaciones"><br>
    <select name="id_clientes">
        <option value="0">Seleccione un Cliente</option>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '<option value="'.$x['id'].'">'.$x['nombre'].'</option>';
}
        ?>
    </select><br>
    <input type="submit" name="Nuevo Pedido" value="Nuevo Pedido">
</form>