</br>
<!DOCTYPE html>
<html lang="en">

</br>
<div class="col-lg-12 col-sm-12" align="center">
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Crear informe</h4></div>
        <div class="contenido">
            <form action="JER_I_Informe.php" method='post' onsubmit = "validate(event, this);">


            <div class="md-form mt-3">
            <label for="i1"  >Código</label>
            <input type="text" id="cod" name="cod" autocomplete="off"  required>
            <br>
            </div>
            <div class="md-form mt-3"  >
            <label for="i2">Nombre del Informe</label>
            <input type="text" id="informe" name="informe" autocomplete="off" required>
            </div>
            <br> <br>
          
            <input type="submit"  data-toggle="modal" data-target="#myModal"name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>           
        </div>
    </div>
</div>
</html>