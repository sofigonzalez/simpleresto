<a href="?controller=mesas&action=editar">Nueva Mesa</a>
<table>
    
<form action="?controller=mesas&action=_guardar" method="post"> 
<tr><td>	<input id="idMesas" name="idMesas" type="hidden" value="<?= $datos->getid()?>"> 
	<label>Nombre</label></td><td><input id="nombre" name="nombre" type="text" value="<?= $datos->getnombre()?>" autofocus></td></tr> 
<tr><td><label>Horizontal</label></td><td><input id="ubicacionH" name="ubicacionH" type="text" value="<?= $datos->getubicacionH()?>" ></td></tr> 
<tr><td><label>Vertical</label></td><td><input id="ubicacionV" name="ubicacionV" type="text" value="<?= $datos->getubicacionV()?>" ></td></tr>
<tr><td>Estado</td><td><select name="estado"><option value="1">Activo</option><option value="0" <?php if ($datos->getestado()=="0"){echo 'selected';} ?>>Inactivo</option></select></td></tr>
    <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
</form>
</table>



<table  class="table table-hover">
    <tr><td>Mesas</td><td>Horizontal</td><td>Vertical</td></tr>
<?php
while($x = mysql_fetch_assoc($datos))
{
echo '
<tr><td>'.$x['nombre'].'</td><td>'.$x['ubicacionH'].'</td><td>'.$x['ubicacionV'].'</td>
<td><a href="index.php?controller=mesas&action=_editar&idMesas='.$x['id'].'"  >Editar</a></td>
</td></tr>
';
}
        ?>
</table>
