<a href="?controller=usuarios&action=editar">Nuevo Usuario</a>
<table>
    <?php
    ?>
<form action="?controller=usuarios&action=_guardar" method="post"> 
<tr><td>	<input id="iduser" name="iduser" type="hidden" value="<?= $datos->getid()?>"> 
	<label>Nombre</label></td><td><input id="nombreuser" name="nombreuser" type="text" value="<?= $datos->getnombre()?>" autofocus></td></tr> 
	<tr><td><label>Usuario</label></td><td><input id="useruser" name="useruser" type="text" value="<?= $datos->getusuario()?>"> </td></tr>
    <tr><td><label>Contrase&ntilde;a</label></td><td><input id="passworduser" name="passworduser" type="password" value="<?= $datos->getpass()?>"></td></tr>
    <tr><td><label>Repetir Contrase&ntilde;a</label></td><td><input id="repassworduser" name="repassworduser" type="password"></td></tr>
    <tr><td><label>Telefono</label></td><td><input id="telefonouser" name="telefonouser" type="text" value="<?= $datos->gettelefono()?>"> </td></tr>
    <tr><td><label>Mail</label></td><td><input id="mailuser" name="mailuser" type="text" value="<?= $datos->getmail()?>"> </td></tr>
    <tr><td><label>Direccion</label></td><td><input id="direccionuser" name="direccionuser" type="text" value="<?= $datos->getdireccion()?>"> </td></tr>
    <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
</form>
</table>
