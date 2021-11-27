</br>
<!DOCTYPE html>
<html lang="en">

</br>
<div class="col-lg-12 col-sm-12" align="center">
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Crear Rubro</h4></div>
        <div class="contenido">
            <form action="JER_I_Rubros.php" method='post' onsubmit = "validate(event, this);">
        <br>
        <br>
            <div class="container">
                <div class="row">
                <div class="form-group two-fields">
                    <!--label for="i3">Informe</label-->
                    <div class="input-group">
                        <input type="text" class="form-control col-sm-3" id="busqueda_id" name="busqueda_id" 
                        placeholder="Codigo" required="true" readonly="true">
                        &nbsp; &nbsp; 
                        <input type="text" name="busqueda" class="form-control col-sm-9" id="busqueda" 
                        placeholder="Buscar Informe" autocomplete="off">          
                    </div> 
                </div> 
                    <div id="resultados" ></div>
                </div>
            </div>
            
            <div class="md-form mt-3"  >
            <label for="i2">Nombre del Rubro</label>
            <input type="text" id="rubro" name="rubro" autocomplete="off" required>
            </div>
            <div class="md-form mt-3">
            <label for="nivel">Nivel</label>
            <input type="number" id="nivel" name="nivel" autocomplete="off" >
            </div>

            <div class="md-form mt-3">
            <label for="nivel">Orden del Rubro</label>
            <input type="number" id="orden" name="orden" autocomplete="off" >
            </div>
            
            <label for="i5">Tipo de Operacion</label>
            <br>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-10">
                    <div class="checkbox">
                    <label class="text-success"> <input type="checkbox" value='1'onclick="uncheck()"  name="oper" id="activo"> Suma</label>
                    </div>
                    <div class="checkbox">
                    <label class="text-success"><input type="checkbox"  value='0' onclick="uncheck()"  name="oper" id="inactivo"> Resta</label>
                    </div>
                </div>
            </div>
     
            <input type="submit"  data-toggle="modal" data-target="#myModal"name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>           
            
        </div>
    </div>
</div>

<script>

// FUNCION DE BUSQUEDA DE CLIENTE ----------------------------------------------------------------

$("#busqueda").keyup(function(){
      var query = "select JER_IdInf as idbusqueda, Informe as descripbusqueda from JER_Informes where Informe like'%"+$(this).val()+"%'";
      var funcion = "agregar";
      if(query !='' && query.length >=3){
        //alert("esta es la consulta es: "+query);
        $.ajax({
          url: "buscar.php",
          method: "POST",
          data:{query:query,
                funcion:funcion},
          success: function(data){
            $("#resultados").fadeIn();
            $("#resultados").html(data);

          }
        });
      }
      else{
      } 
    });

    $(document).on('click','a', function(){
      /*var descrip = $(this).text().replace($(this).attr('id')+' ','');*/
      //$("#busqueda").val($(this).text());
/* 	if (isNaN(descrip)){
     $("#busqueda").val(descrip);
	}*/

      $("#resultados").fadeOut();
    });

    function agregar(id, texto){
        $("#busqueda_id").val(id);
        var descrip = document.getElementById(id).value;
        var descrip2 = texto.replace(id+' ','')
        $("#busqueda").val(descrip2);
        //alert("el id es: "+id +" el texto es: "+texto)
        }


// Funcion javascript para que no se seleccionen los dos checkbox a la vez y que tiene que seleccionar uno

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