<?php
//$nlinea = !empty($_GET['id']) ? $_GET['id'] : '';
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
    include('conexion.php');
	$sql = "SELECT cliente, nombrecli, direcli, email, telecli, departamento, contacto FROM clientes WHERE cliente = '$nlinea'";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
//}
?>  </br>
    <div class="card card-block responsive nowrap">
    <div class="cabecera"><h4 align="center" >Actualización de datos de Cliente</h4></div>
    <div class="contenido">
    <form class="contact" action="ProcesoUpdateClientes.php" method='post'>
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <br>
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="cod" name="cod" value="<?php echo utf8_encode($field->cliente);?>">
            <br><br>
            <label for="i2">Nombre</label>
            <input type="text" id="i2" name="nombrecl" autocomplete="off" value="<?php echo utf8_encode($field->nombrecli);?>">
            <br><br>
            <label for="i3">Dirección</label>
            <input type="text" id="i3" name="direc" autocomplete="off" value="<?php echo utf8_encode($field->direcli);?>">
            <br><br>
            <label for="i4">Departamento</label>
            <input type="text" id="i4" name="dep" autocomplete="off" value="<?php echo utf8_encode($field->departamento);?>">
            <br><br>
            <label for="i5">Persona de Contacto</label>
            <input type="text" id="i5" name="percont" autocomplete="off" value="<?php echo utf8_encode($field->contacto);?>">
            <br><br>
            <label for="i6">Telefono</label>
            <input type="number" id="i6" name="tel" autocomplete="off" value="<?php echo utf8_encode($field->telecli);?>">
            <br><br>
            <label for="i7">Correo</label>
            <input type="email" id="i7" name="correo" autocomplete="off" value="<?php echo utf8_encode($field->email);?>">
            <br><br>
            <input class="btn btn-info btn-md" type="submit" value="ACTUALIZAR">
    </form>
    </div>
    </div>