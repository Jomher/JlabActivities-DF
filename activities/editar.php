<?php
//$nlinea = !empty($_GET['id']) ? $_GET['id'] : '';
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
    include('conexion.php');
	$sql = "SELECT TOP(50) cliente, nombrecli, direcli, email, telecli, departamento, contacto FROM clientes WHERE cliente = '$nlinea'";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
//}
?>  </br>
    <div class="card card-block responsive nowrap">
    <div class="cabecera"><h4 align="center" >Actualización de datos de Cliente</h4></div>
    <div class="contenido">
    <form class="contact" action="actualizar.php" method='post'>
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="i1" name="c1" value="<?php echo utf8_encode($field->cliente);?>">
            <br>
            <label for="i2">Nombre</label>
            <input type="text" id="i2" name="c2" autocomplete="off" value="<?php echo utf8_encode($field->nombrecli);?>">
            <br>
            <label for="i3">Dirección</label>
            <input type="text" id="i3" name="c3" autocomplete="off" value="<?php echo utf8_encode($field->direcli);?>">
            <br>
            <label for="i3">Departamento</label>
            <input type="text" id="i4" name="c4" autocomplete="off" value="<?php echo utf8_encode($field->departamento);?>">
            <br>
            <label for="i3">Contacto</label>
            <input type="text" id="i5" name="c5" autocomplete="off" value="<?php echo utf8_encode($field->contacto);?>">
            <br>
            <label for="i3">Telefono</label>
            <input type="number" id="i6" name="c6" autocomplete="off" value="<?php echo utf8_encode($field->telecli);?>">
            <br>
            <label for="i4">Correo</label>
            <input type="email" id="i7" name="c7" autocomplete="off" value="<?php echo utf8_encode($field->email);?>">
            <br>
            <input class="btn btn-info btn-md" type="submit" value="actualizar">
    </form>
    </div>
    </div>