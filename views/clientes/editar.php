<a href="?controller=clientes&action=editar">Nuevo Cliente</a>
<table>
    
<form action="?controller=clientes&action=_guardar" method="post"> 
<tr><td>	<input id="idClientes" name="idClientes" type="hidden" value="<?= $datos->getid()?>"> 
	<label>Nombre</label></td><td><input id="nombre" name="nombre" type="text" value="<?= $datos->getnombre()?>" autofocus></td></tr> 
<tr><td><label>Dni</label></td><td><input id="dni" name="dni" type="text" value="<?= $datos->getdni()?>" ></td></tr> 
<tr><td><label>Telefono</label></td><td><input id="telefono" name="telefono" type="text" value="<?= $datos->gettelefono()?>" ></td></tr>
<tr><td><label>Mail</label></td><td><input id="mail" name="mail" type="text" value="<?= $datos->getmail()?>" ></td></tr>
<tr><td><label>Direccion</label></td><td><input id="direccion" name="direccion" type="text" value="<?= $datos->getdireccion()?>" ></td></tr>
<tr><td><label>Fecha de Nacimiento</label></td><td><input id="fechaNac" name="fechaNac" type="text" value="<?= $datos->getfechaNac()?>" ></td></tr>
    <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
</form>
</table>
