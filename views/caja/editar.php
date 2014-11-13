<a href="?controller=caja&action=editar">Nueva caja</a>
<table>
    
<form action="?controller=caja&action=_guardar" method="post"> 
<tr><td>	<input id="idCaja" name="idCaja" type="hidden" value="<?= $datos->getid()?>"> 
	<label>Observacion</label></td><td><input id="observacion" name="observacion" type="text" value="<?= $datos->getobservacion()?>" autofocus></td></tr> 
<tr><td>Estado</td><td><select name="estado"><option value="1">Activa</option><option value="0" <?php if ($datos->getestado()=="0"){echo 'selected';} ?>>Cerrada</option></select></td></tr>
    <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
</form>
</table>
