<a href="?controller=usuarios&action=editar">Nuevo Usuario</a>

<table><tr><td>
<form action="" method="post"> 
<SELECT multiple class="form-control" NAME="roles" >

<?php
$array=$datos[0];
$array2=$datos[1];

while($x = mysql_fetch_assoc($array))
{
echo '
<OPTION VALUE="'.$x['id'].'">'.$x['nombre'].'</OPTION>
';
}
?>
</SELECT>
</td><td><input name="agregar" type="submit" value="Agregar Permiso >>">
</td><td><input name="quitar" type="submit" value="<< Quitar Permiso ">

</td><td><SELECT multiple class="form-control" NAME="rolesxusuario" >

<?php
while($x = mysql_fetch_assoc($array2))
{
echo '
<OPTION VALUE="'.$x['id'].'">'.$x['nombre'].'</OPTION>
';
}
?>
</SELECT>
</form></td></tr></table>
