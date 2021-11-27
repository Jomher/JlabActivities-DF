</br>
<!DOCTYPE html>
<html lang="en">

</br>
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Agregar Vehiculo</h4></div>
        <div class="contenido">
            <form action="registrarvehiculos.php" method='post' onsubmit = "validate(event, this);">
            <label for="i1">Código</label>
            <input type="text" id="cod" name="cod" autocomplete="off" required>
            <br>
            <label for="i2">Marca del Vehiculo</label>
            <input type="text" id="marca" name="marca" autocomplete="off" required>
            <br> <br>
            <label for="i2">Modelo del Vehiculo</label>
            <input type="text" id="modelo" name="modelo" autocomplete="off" required>
            <br> <br>
            <label for="i2">Placa del Vehiculo</label>
            <input type="text" id="placa" name="placa" autocomplete="off" required>
            <br> <br>
            <input type="submit"  data-toggle="modal" data-target="#myModal"name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>           
        </div>
    </div>

</html>