
<a href="?controller=productos&action=editar">Nuevo Producto</a>
<table>
    
<form action="?controller=productos&action=_guardar" method="post"> 
<tr><td>	<input id="iduser" name="idProducto" type="hidden" value="<?= $datos->getid()?>"> 
	<label>Nombre</label></td><td><input id="nombre" name="nombre" type="text" value="<?= $datos->getnombre()?>" autofocus></td></tr> 
<tr><td><label>Precio</label></td><td><input id="precio" name="precio" type="text" value="<?= $datos->getprecio()?>" ></td></tr> 
<tr><td>Stock</td><td><select name="stock"><option value="1">Con Stock</option><option value="0" <?php if ($datos->getstock()=="0"){echo 'selected';} ?>>Sin Stock</option></select></td></tr>
<tr><td>Estado</td><td><select name="estado"><option value="1">Activo</option><option value="0" <?php if ($datos->getestado()=="0"){echo 'selected';} ?>>Inactivo</option></select></td></tr>
    <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
</form>
</table>
