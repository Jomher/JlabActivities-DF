<?php
//$nlinea = !empty($_GET['id']) ? $_GET['id'] : '';
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
    include('conexion.php');
	$sql = "SELECT [JA_CodTrabajador], [JA_Nombres] ,[JA_Apellidos],[JA_EstadoLab],[JA_Telef]
    FROM [JA_Trabajadores] WHERE JA_CodTrabajador = '$nlinea'";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
//}
?>  </br>
    <div class="card card-block responsive nowrap">
    <div class="cabecera"><h4 align="center" >Actualización de datos de Trabajador</h4></div>
    <div class="contenido">
    <form class="contact" action="actuatrabajador.php" method='post'>
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="cod" name="cod" value="<?php echo utf8_encode($field->JA_CodTrabajador);?>">
            <br>
            <label for="i2">Nombre</label>
            <input type="text" id="nom" name="nom" autocomplete="off" value="<?php echo utf8_encode($field->JA_Nombres);?>">
            <br>
            <label for="i3">Apellidos</label>
            <input type="text" id="apel" name="apel" autocomplete="off" value="<?php echo utf8_encode($field->JA_Apellidos);?>">
            <br>
            <label for="i4">Teléfono</label>
            <input type="text" id="tel" name="tel" autocomplete="off" value="<?php echo utf8_encode($field->JA_Telef);?>">
            <br>
            <label for="i5">Estado</label>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox" value='1'onclick="uncheck()"  name="estados" id="activo" value="<?php echo utf8_encode($field->JA_EstadoLab);?>"> Activo</label>
              </div>
              <div class="checkbox">
              <label class="text-success"><input type="checkbox" value='0' onclick="uncheck()" name="estados" id="inactivo" value="<?php echo utf8_encode($field->JA_EstadoLab);?>"> Inactivo</label>
              </div>
            </div>
            <input class="btn btn-info btn-md" type="submit" value="ACTUALIZAR">
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