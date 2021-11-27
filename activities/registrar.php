</br>
</br>
</br>
<?php
    include('conexion.php');
    $sql=<<<FIN
    select RIGHT ('000000'+cast (isnull(max(cliente),0)+1 as varchar(4)),5) as codigo from clientes
FIN;
    $resultado = odbc_exec($conexion, $sql);
    $field = odbc_fetch_object($resultado); 
    if(!odbc_exec($conexion, $sql)){
        die('No se pudo agregar el registro');
//    }
}
?>

</br>
    <div class="card card-block responsive nowrap" id="mostrar">
        <div class="cabecera"><h4 align="center">Registrar Cliente</h4></div>
        <div class="contenido">
            <form action="registra.php" method='post'>
            <label for="i1">Código</label>
            <input type="text" id="i1" name="c1" readonly="true" value="<?php echo $field->codigo ?>">
            <br>
            <label for="i2">Nombre</label>
            <input type="text" id="i2" name="c2" autocomplete="off">
            <br>
            <label for="i3">Dirección</label>
            <input type="text" id="i3" name="c3" autocomplete="off">
            <br>
            <label for="i4">Departamento</label>
            <input type="text" id="i4" name="c4" autocomplete="off">
            <br>
            <label for="i5">Persona de Contacto</label>
            <input type="text" id="i5" name="c5" autocomplete="off">
            <br>
            <label for="i6">Teléfono</label>
            <input type="text" id="i6" name="c6" autocomplete="off">
            <br>
            <label for="i7">Correo</label>
            <input type="email" id="i7" name="c7" autocomplete="off">
            <br>
            <input type="submit" value="registrar" class="btn btn-info btn-md">
            </form>

        </div>
    </div>