</br>
<!DOCTYPE html>
<html lang="en">

</br>
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Agregar Clientes</h4></div>
        <div class="contenido">
            <form action="ProcesoInsertClientes.php" method='post' onsubmit = "validate(event, this);">
            <br>
            <label for="i1">Código</label>
            <input type="text" id="cod" name="cod" autocomplete="off" required>
            <br><br>
            <label for="i3">Nombre del Cliente</label>
            <input type="text" id="nombrecl" name="nombrecl" autocomplete="off" required>
            <br> <br>
            <label for="i4">Direccion</label>
            <input type="text" id="direc" name="direc" autocomplete="off" >
            <br> <br>
            <label for="i5">Departamento</label>
            <input type="text" id="dep" name="dep" autocomplete="off" >
            <br> <br>
            <label for="i6">Persona de Contacto</label>
            <input type="text" id="percont" name="percont" autocomplete="off" >
            <br> <br>
            <label for="i7">Teléfono</label>
            <input type="text" id="tel" name="tel" autocomplete="off" >
            <br> <br>
            <label for="i8">Correo </label>
            <input type="email" id="correo" name="correo" autocomplete="off" >
            <br> <br>
            <input type="submit" name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>           
        </div>
    </div>

</html>