
</br>
    <div class="card card-block responsive nowrap">
        <div class="cabecera"><h4 align="center">Agregar Sucursales o Tiendas</h4></div>
        <div class="contenido">
            <form action="ProcesoInsertSucursales.php" method='post' onsubmit = "validate(event, this);">
            <br>
            <label for="i1">Código Sucursal</label>
            <input type="text" id="codsuc" name="codsuc" autocomplete="off" required>
            <br><br>
            <label for="i2">Nombre de Sucursal</label>
            <input type="text" id="nombresuc" name="nombresuc" autocomplete="off" required>
            <br> <br>

            <div class="form-group two-fields">
            <label for="i3">Cliente</label>
            <div class="input-group">
            <input type="text" class="form-control col-sm-3" id="busqueda_id" name="busqueda_id" 
            placeholder="Codigo" required="true" readonly="true" required>
            &nbsp; &nbsp; 
            <input type="text" name="busqueda" class="form-control col-sm-9" id="busqueda" 
            placeholder="Buscar Cliente" autocomplete="off" required>
            </div> 
            </div>
            <br>
            <div id="resultados" ></div>

            <label for="i4">Direccion</label>
            <input type="text" id="direc" name="direc" autocomplete="off" >
            <br> <br>
            <label for="i5">Teléfono</label>
            <input type="text" id="tel" name="tel" autocomplete="off" >
            <br> <br>
            <label for="i6">Persona de Contacto</label>
            <input type="text" id="percont" name="percont" autocomplete="off" >
            <br> <br>
            
            <input type="submit" name="enviar" value="REGISTRAR" class="btn btn-info btn-md">
            </form>           
        </div>
    </div>

    <script>
    // FUNCION DE BUSQUEDA DE CLIENTE ----------------------------------------------------------------

$("#busqueda").keyup(function(){
    var query = "select top(8) cliente as idbusqueda, nombrecli as descripbusqueda from clientes where nombrecli like'%"+$(this).val()+"%'";
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

</script>