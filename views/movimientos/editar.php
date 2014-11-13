
        <a href="?controller=movimientos&action=editar&idCaja=<?=$_GET['idCaja'] ?>">Nuevo Movimiento</a>
        <table>

            <form action="?controller=movimientos&action=_guardar&idCaja=<?=$_GET['idCaja'] ?>" method="post"> 
                <tr><td>	<input id="idMovimientos" name="idMovimientos" type="hidden" value="<?= $datos[0]->getid(); ?>"> 
                        <label>Observacion</label></td><td><input id="observacion" name="observacion" type="text" value="<?= $datos[0]->getobservacion(); ?>" autofocus></td></tr> 
                <tr><td><label>Importe</label></td><td><input id="importe" name="importe" type="text" value="<?= $datos[0]->getimporte(); ?>"></td></tr> 
                <tr><td>Tipo Movimiento</td><td><select name="tipomov">
                            <?php
                            while ($x = mysql_fetch_assoc($datos[1])) {
                                echo '<OPTION VALUE="' . $x['id'] . '" ';
                                if ($datos[0]->getid_tipoMov() == $x['id']) {
                                    echo 'selected';
                                }
                                echo'>' . $x['nombre'] . '</OPTION>
';
                            }
                            ?>
                            
                        </select></td></tr>
                <tr><td></td><td><input name="guardar" type="submit" value="Guardar"></td></tr>
            </form>
        </table>
