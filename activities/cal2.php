<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<link href='packages/timegrid/main.css' rel='stylesheet' />
<link href='packages/list/main.css' rel='stylesheet' />


<!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="addEvent.php">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Actividad</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titulo</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="busqueda_id" name="busqueda_id" placeholder="Codigo Cliente" required="true" readonly="true">   
          </div>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="busqueda" placeholder="Buscar Cliente" autocomplete="off">
            <div id="resultados" ></div> 
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Seleccione</option>
              <?php
                  $sql= "select tipoEvento, color, descripcion from tipoEvento ORDER BY tipoEvento";
                  require_once("conexion.php");
                  $resultado = odbc_exec($conexion, $sql); 
                  while ($field = odbc_fetch_object($resultado)){
                    echo '<option style="color:'.$field->color.'" value="'.$field->tipoEvento.'">&#9724; '.$field->descripcion.'</option>';
                  }
              ?>
              
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start" readonly>
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Fecha Final</label>
          <div class="col-sm-10">
            <input type="text" name="end" class="form-control" id="end" readonly>
          </div>
          </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      </div>
      </div>
    </div>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="editEventTitle.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle de Evento</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titulo</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" readonly="true">
          </div>
          </div>

          <div class="form-group">
            <label for="coment2" class="col-sm-2 control-label">Observaciones</label>
            <div class="col-sm-10">
            <input type="text" name="coment2" placeholder="Observaciones" class="form-control" id="coment2" readonly="true">
          </div>
          </div>
          <!--div class="form-group">
          <label for="color" class="col-sm-2 control-label">Tipo de Evento</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Seleccione</option>
              <?php
                  /*$sql= "select tipoEvento, color, descripcion from tipoEvento ORDER BY tipoEvento";
                  require_once("conexion.php");
                  $resultado = odbc_exec($conexion, $sql); 
                  while ($field = odbc_fetch_object($resultado)){
                    echo '<option style="color:'.$field->color.'" value="'.$field->tipoEvento.'">&#9724; '.$field->descripcion.'</option>';
                  }*/
              ?>
            </select>
          </div>
          </div-->
            <!--div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar evento</label>
              </div>
              <div class="checkbox">
              <label class="text-success"><input type="checkbox"  name="finalizar" id="finalizar" onclick="finalizarEvento()"> Finalizar evento</label>
              </div>
              <div class="col-sm-10">
              <input type="number" name="meses" class="form-control" id="meses" placeholder="Meses a programar" style="display: none">
          	  </div>
            </div>
          </div-->
          
          <input type="hidden" name="id" class="form-control" id="id">
          <input type="hidden" name="redirecciona" class="form-control" id="redirecciona" value="">
        </div>
        <div class="modal-footer">
        <a type="button" class="btn btn-purple btn-sm" href="#" onClick="agregarArchivo()" id="btnArchivo">Archivos</a> 
        <a type="button" class="btn btn-info btn-sm" href="#" onClick="verDetalle()" id="btnDetalle">Detalle</a> 
        <!--button type="submit" class="btn btn-primary btn-sm">Guardar</button-->
        </form>
        <script>

            function agregarArchivo(){
            var id = document.getElementById("id").value;
            id= "index.php?p=archivos&id="+id;
            //alert('algo '+id);
            window.location=id;
          }

          function finalizarEvento(){
          	if(document.getElementById("finalizar").checked == true){
          		//alert("marcado");
          		document.getElementById("meses").style="display:hidden";
          	}else if(document.getElementById("finalizar").checked == false){
          		//alert("desmarcado");
          		document.getElementById("meses").style="display:none";
          	}
          }	

          function verDetalle(){
            var id = document.getElementById("id").value;
            id = "index.php?p=Jlab_detalleActividad_2update&id="+id;
            //id= "index.php?p=detalleEvento&id="+id;
            //alert('algo '+id);
            window.location=id;
          }
        </script>

      </div>
      </div>
      </div>
    </div>





    

<script src='packages/core/main.js'></script>
<script src='packages/interaction/main.js'></script>
<script src='packages/daygrid/main.js'></script>
<script src='packages/timegrid/main.js'></script>
<script src='packages/list/main.js'></script>
<script src='packages/core/locales/es.js'></script>

</br>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'es',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'bootstrap' ],
      //themeSystem: 'bootstrap',
      height: 'parent',
      header: {
        left: 'title',
        center: 'prev,next',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,today'
      },
      defaultView: 'dayGridMonth',
      windowResize: 'true',
      titleFormat: { year: 'numeric', month: 'short', week:'short'},
      //defaultDate: '2019-08-12',
      navLinks: true, // can click day/week names to navigate views
      //editable: false,
      eventLimit: false, // allow "more" link when too many events
      selectable: true,
      //selectHelper: true,
      dateClick: function(info) {
      //alert('clicked ' + info.dateStr);
        }, 
      select: function(info) {
      alert('selected ' + info.startStr + ' to ' + info.endStr);
        /*$('#ModalAdd #start').val(moment(info.start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(info.end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');*/
        },
      eventDrop: function(info) {
          /*var str = calendar.formatDate(info.event.start, {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
          });*/
          //var inicio =  info.event.start.toISOString().substring(0, 10);
          //var fin =  info.event.start.toISOString().substring(0, 10);
          edit(info.event);
        },
          eventClick: function(info) {
          $('#ModalEdit #id').val(info.event.id);
          $('#ModalEdit #title').val(info.event.title);
          $('#ModalEdit #color').val(info.event.color);
          $('#ModalEdit #coment2').val(info.event.extendedProps.description);
          $('#ModalEdit').modal('show');
          info.el.style.borderColor = 'red';
        },
        eventResize: function(info) { // si changement de longueur

        //edit(info.event);

        },
      events: [
          <?php
          $sql= "select a.id, fecha, nombrecli as cliente, a.observacion,d.nombre as Tienda, color from agenda a inner join tipoEvento b 
          on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente inner join SucurCliente d on d.cod_suc = a.JA_IDSucursalCli where a.finalizado = 1";
          require_once("conexion.php");
          $resultado = odbc_exec($conexion, $sql); 
          while ($field = odbc_fetch_object($resultado)){
            echo '{ id: "'.$field->id .'", '; 
            echo 'title: "'.utf8_encode($field->Tienda) .'", ';
            echo 'start: "'.$field->fecha .'",';
            echo 'color: "'.$field->color .'",';
            $field->observacion = str_replace('"','\"',$field->observacion);
            echo 'description: "'.$field->observacion.'" },';
          }
      ?>
      ]
    });

    calendar.render();


      $("#busqueda").keyup(function(){
      var query = $(this).val();
      if(query !='' && query.length >=3){
        //alert("esta es la consulta es: "+query);
        $.ajax({
          url: "buscar.php",
          method: "POST",
          data:{query:query},
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
      var descrip = $(this).text().replace($(this).attr('id')+' ','');
      //$("#busqueda").val($(this).text());
      $("#busqueda").val(descrip);
      $("#resultados").fadeOut();
    });


    function edit(event){
         start = moment(event.start).format('YYYY-MM-DD');
      if(event.end){
        end = moment(event.end).format('YYYY-MM-DD');
      }else{
        end = start;
      }
      //alert('Inicio: '+start+' Final: '+end);

      id =  event.id;

      //alert('Id: '+id);      
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Se Modificó Correctamente');
          }else{
            alert('No se guardaron los cambios. Intente nuevamente'); 
          }
        }
      });
    }
  });


        function agregar(id){
        $("#busqueda_id").val(id);
        var descrip = document.getElementById(id).value;
        $("#busqueda").val(descrip);

        //alert("el id es: "+id)
        }


</script>


<style>

  body {
    /*margin: 10px 10px;
    padding: 0;*/
    
  }

  #calendar {
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 13px;
    max-width: 1800px;
    max-height: 1800px;
    margin: 0 auto;
  }

</style>
  </br>
  <div class="card card-block responsive">
 <div id='calendar-container'>
  <div><h4>Actividades Finalizadas </h4></div>
    <div id='calendar'></div>
  </div>
  </br>
</div>

</br>
</br>



