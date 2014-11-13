<a href="?controller=tipomov&action=editar">Nuevo Tipo de Movimiento</a>
<table>
    
<form action="?controller=tipomov&action=_guardar" method="post"> 
<tr><td>	<input id="idtipomov" name="idtipomov" type="hidden" value="<?= $datos->getid()?>"> 
	<label>Nombre</label></td><td><input id="nombre" name="nombre" type="text" value="<?= $datos->getnombre()?>" autofocus></td></tr> 
<tr><td>Suma Resta</td><td><select name="sumaResta"><option value="1">Suma</option><option value="-1" <?php if ($datos->getsumaResta()=="-1"){echo 'selected';} ?>>Resta</option></select></td></tr>
    <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
</form>
</table>
