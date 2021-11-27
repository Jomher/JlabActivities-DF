</br>
<!DOCTYPE html>
<html lang="en">

<?php
    include('conexion.php');

    // $sql=<<<FIN
    // select RIGHT ('000000'+cast (isnull(max(JA_CodTrabajador),0)+1 as varchar(4)),5) as codigo from JA_Trabajadores
//FIN;
//     $resultado = odbc_exec($conexion, $sql);
//     $field = odbc_fetch_object($resultado); 
//     if(!odbc_exec($conexion, $sql)){
//         die('No se pudo agregar el registro');
//     }
// ?>

</br>
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Registrar Trabajador</h4></div>
        <div class="contenido">
            <form action="registrartrabajador.php" method='post' id="frm" name="frm" onsubmit = "validate(event, this);">
            <label for="i1">Código</label>
            <input type="text" id="cod" name="cod" autocomplete="off" required>
            <br>
            <label for="i2">Nombre</label>
            <input type="text" id="nom" name="nom" autocomplete="off" required>
            <br>
            <label for="i3">Apellidos</label>
            <input type="text" id="apel" name="apel" autocomplete="off" required>
            <br>
            <label for="i4">Teléfono</label>
            <input type="text" id="tel" name="tel" autocomplete="off">
            <br>
            <label for="i5">Estado</label>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox" value='1'onclick="uncheck()"  name="estados" id="activo"> Activo</label>
              </div>
              <div class="checkbox">
              <label class="text-success"><input type="checkbox"  value='0' onclick="uncheck()"  name="estados" id="inactivo"> Inactivo</label>
              </div>
            </div>
            <input type="submit" name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>
            
        </div>
    </div>

<!-- Funcion javascript para que no se seleccionen los dos checkbox a la vez y que tiene que seleccionar uno-->
    <script>
        function uncheck(){
        checkbox1 = document.getElementById("activo");
        var checkbox2 = document.getElementById("inactivo");
        checkbox1.onclick = function(){
        if(checkbox1.checked != false){
        checkbox2.checked =null;
    }
    }
        checkbox2.onclick = function(){
        if(checkbox2.checked != false){
        checkbox1.checked=null;
        }
        }
    }

    $('form').submit(function(e){
    // si la cantidad de checkboxes "chequeados" es cero,
    // entonces se evita que se envíe el formulario y se
    // muestra una alerta al usuario
    if ($('input[type=checkbox]:checked').length === 0) {
        e.preventDefault();
        alert('Debe seleccionar si el trabajador se encuentra activo o inactivo');
    }
    });
    </script>

</html>

    

   