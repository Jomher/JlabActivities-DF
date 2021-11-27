</br>
</br>
</br>
<!DOCTYPE html>
</br>
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Agregar Estado</h4></div>
        <div class="contenido">
            <form action="registrarestado.php" method='post' onsubmit = "validate(event, this);">
            <label for="i1">Código</label>
            <input type="text" id="cod" name="cod" autocomplete="off" required>
            <br>
            <label for="i2">Nombre del estado</label>
            <input type="text" id="nom" name="nom" autocomplete="off" required>
            <br> <br>
            <label for="i3">Color</label>
            <input type="color" id="color" name="color" autocomplete="off" required>
            <br> <br>
            <input type="submit"  data-toggle="modal" data-target="#myModal"name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>
            
        </div>
    </div>

</html>