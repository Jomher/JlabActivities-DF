<style type="text/css">
    #example{
        font-size: 13px;
    }
</style>

<?php
//$nlinea = !empty($_GET['id']) ? $_GET['id'] : '';
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
    include('conexion.php');
	$sql = "SELECT TOP(50) cliente, nombrecli, direcli, email, telecli, departamento, contacto FROM clientes WHERE cliente = '$nlinea';";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
//}
?>  </br>
	<div class="row">
	<div class="col-lg-6 col-sm-12">
    <div class="card card-block responsive nowrap">
    <div class="cabecera"><h4 align="center" >Datos de Cliente</h4></div>
    <div class="contenido">
    <form class="contact" action="actualizar.php" method='post'>
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="i1" name="c1" value="<?php echo utf8_encode($field->cliente);?>">
            <br>
            <label for="i2">Nombre</label>
            <input readonly="true" type="text" id="i2" name="c2" value="<?php echo utf8_encode($field->nombrecli);?>">
            <br>
            <label for="i3">Dirección</label>
            <input readonly="true" type="text" id="i3" name="c3" value="<?php echo utf8_encode($field->direcli);?>">
            <br>
            <label for="i3">Departamento</label>
            <input readonly="true" type="text" id="i4" name="c4" value="<?php echo utf8_encode($field->departamento);?>">
            <br>
            <label for="i3">Persona de Contacto</label>
            <input readonly="true" type="text" id="i5" name="c5" value="<?php echo utf8_encode($field->contacto);?>">
            <br>
            <label for="i3">Telefono</label>
            <input readonly="true" type="text" id="i6" name="c6" value="<?php echo utf8_encode($field->telecli);?>">
            <br>
            <label for="i4">Correo</label>
            <input readonly="true" type="text" id="i7" name="c7" value="<?php echo utf8_encode($field->email);?>">
            <br><br>
            <!-- <a class="btn purple-gradient btn-md" href="index.php?p=editar&id=<?php echo utf8_encode($field->cliente);?>">Modificar</a> -->
    </form>
	</div>
	</div>
	</div>
	<div class="col-lg-6 col-sm-12">
    <div class="card card-block responsive nowrap">
    <h4 align="center">Detalle de Visitas</h4>
    <br>
    <?php
    $sql = "select a.*, b.descripcion from Agenda a inner join tipoEvento b 
    		on a.tipoEvento = b.tipoEvento where cliente = '$nlinea'";
    //echo $sql;
    //echo "Detalle de visitas";
    $resultado = odbc_exec($conexion, $sql);
    //$field = odbc_fetch_object($resultado);

    $tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Observacion</th>
            <th>Dirección</th>
            <th>Tipo de Evento</th>
        </tr>
    </thead>
    <tbody>';
    while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    $tabla.="<td><a href='index.php?p=detalleEvento&id=".utf8_encode($field->id)."' >".date("d/m/Y", strtotime($field->fecha))."</a></td>";
    $tabla.="<td>".utf8_encode($field->observacion)."</td>";
    $tabla.="<td>".utf8_encode($field->direccion)."</td>";
    $tabla.="<td>".utf8_encode($field->descripcion)."</td>";
    $tabla.='</tr>';
    }
    $tabla.='</tbody></table>';
    echo $tabla;
     ?>
    </div>
    </div>
	</div>
	<br>