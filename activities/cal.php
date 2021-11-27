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
            <input type="text" name="busqueda" class="form-control" id="busqueda" placeholder="Buscar Cliente" autocomplete="off">
            <div id="resultados" ></div> 
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Tipo de actividad</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color" required="true">
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
            <input type="datetime" name="start" class="form-control" id="start" required>
          </div>
      	  </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Fecha Final</label>
          <div class="col-sm-10">
            <input type="datetime" name="end" class="form-control" id="end" required>
          </div>
          </div>

            <div class="form-group">
            <label for="coment" class="col-sm-2 control-label">Observaciones</label>
            <div class="col-sm-10">
            <input type="text" name="coment" placeholder="Observaciones" class="form-control" id="coment" autocomplete="off">
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
    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="editEventTitle.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Actividad</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-6 control-label">Sucursal y Cliente</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" readonly="true">
          </div>
          </div>
            <div class="form-group">
          	<label for="coment2" class="col-sm-6 control-label">Detalle de la Actividad</label>
            <div class="col-sm-10">
            <input type="text" name="coment2" placeholder="Observaciones" class="form-control" id="coment2" autocomplete="off">
          </div>
          </div>

          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Estado</label>
          <div class="col-sm-10">
          <select name="color" class="form-control" id="color">
              <!-- <option value="">Seleccione</option> -->
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
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar evento</label>
              </div>
              <div class="checkbox">
              <label class="text-success"><input type="checkbox"  name="finalizar" id="finalizar" onclick="finalizarEvento()"> Finalizar evento</label>
              </div>
              <div class="col-sm-10">
              <input type="number" name="meses" class="form-control" id="meses" placeholder="Meses a programar"  step=".25" style="display: none">
          	  </div>
            </div>
          </div>
          
          <input type="hidden" name="id" class="form-control" id="id">
          <input type="hidden" name="redirecciona" class="form-control" id="redirecciona" value="">
        </div>
        <div class="modal-footer">
        <a type="button" class="btn btn-purple btn-sm" href="#" onClick="agregarArchivo()" id="btnArchivo">Archivos</a> 
        <a type="button" class="btn btn-info btn-sm" href="#" onClick="verDetalle()" id="btnDetalle">Detalle</a> 
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
        </form>

        <script>

          function finalizarEvento(){
          	if(document.getElementById("finalizar").checked == true){
          		//alert("marcado");
          		document.getElementById("meses").style="display:hidden";
              document.getElementById("btnDetalle").style="display:none";
          	}else if(document.getElementById("finalizar").checked == false){
          		//alert("desmarcado");
          		document.getElementById("meses").style="display:none";
              document.getElementById("btnDetalle").style="display:hidden";
          	}
          }	

          function verDetalle(){
            var id = document.getElementById("id").value;
            id= "index.php?p=Jlab_detalleActividad_2update&id="+id;
            //alert('algo '+id);
            window.location=id;
          }

          function agregarArchivo(){
            var id = document.getElementById("id").value;
            id= "index.php?p=archivos&id="+id;
            //alert('algo '+id);
            window.location=id;
          }

          function getTiempo(id){
            var color = document.getElementById(id);
            var horas = color.options[color.selectedIndex].id;
            document.getElementById("tiempo").value = horas;
            //alert('Algo cambio '+minutos);
            asignarTiempo();
          }

          function asignarTiempo(){
            //var hora_escogida = document.getElementById("start").value;
            var hora_escogida = moment(document.getElementById("start").value, 'YYYY-MM-DD hh:mm:ss a');
            var hora_estimada = document.getElementById("tiempo").value;
            var hora_sumada = moment(hora_escogida).add(hora_estimada, 'h').format('YYYY-MM-DD hh:mm:ss a');
            /*alert(hora_escogida);
            alert(hora_estimada);
            alert(hora_sumada);*/
            document.getElementById("end").value= hora_sumada;
          }

          function limpiarModadlAdd(){
          	$('#ModalAdd #busqueda_id').val("");
          	$('#ModalAdd #busqueda').val("");
          	$('#ModalAdd #color').val("");
          	$('#ModalAdd #coment').val("");
          	//alert("limpiado");
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
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list'],
      //themeSystem: 'bootstrap',
      height: 'parent',
      header: {
        left: 'title',
        center: 'prev,next',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,today'
      },
      defaultView: 'dayGridMonth',
      windowResize: 'true',
      //timeZone: 'UTC',
      slotEventOverlap: false, 
      titleFormat: { year: 'numeric', month: 'short', week:'short'},
      //defaultDate: '2019-08-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventResizableFromStart: true, 
      eventLimit: false, // allow "more" link when too many events
      selectable: true,
      timeFormat: 'h:mm',
      selectHelper: true,
      /*businessHours: {
  		// days of week. an array of zero-based day of week integers (0=Sunday)
  		daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday

  		startTime: '08:00', // a start time (10am in this example)
  		endTime: '17:00', // an end time (6pm in this example)
		},*/
      dateClick: function(info) {
      //alert('clicked ' + info.dateStr);
        }, 
      select: function(info) {
      //alert('selected ' + info.startStr + ' to ' + info.endStr);
        $('#ModalAdd #start').val(moment(info.start).format('YYYY-MM-DD hh:mm:ss a'));
        $('#ModalAdd #end').val(moment(info.start).format('YYYY-MM-DD hh:mm:ss a'));
       // $('#ModalAdd').modal('show');
       pagina =  "index.php?p=Jlab_detalleActividad";
       pagina = pagina+"&i="+moment(info.start).format('YYYY-MM-DD HH:mm');
       pagina = pagina+"&f="+moment(info.end).format('YYYY-MM-DD HH:mm');
       location.href=pagina;
        //location.href="index.php?p=registrar";
        },
      eventDrop: function(info) {
          /*var str = calendar.formatDate(info.event.start, {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
          });*/
          //var inicio =  info.event.start.toISOString().substring(0, 10);
          //var fin =  info.event.start.toISOString().substring(0, 10);

          /*var resp=confirm('¿Desea finalizar este evento y crear uno nuevo a partir de este? (Si cancela solo se modificará la fecha de este evento)');
          if (resp){
          	posponer(info.event);
          }else{
          	edit(info.event);
      	  }*/
		edit(info.event);

        },
          eventClick: function(info) {
          $('#ModalEdit #id').val(info.event.id);
          $('#ModalEdit #title').val(info.event.title);
          $('#ModalEdit #color').val(info.event.extendedProps.tipoEvento);
          $('#ModalEdit #coment2').val(info.event.extendedProps.description);
          $('#ModalEdit').modal('show');
          //info.el.style.borderColor = 'red';
        },
        eventResize: function(info) { // si changement de longueur

        edit(info.event);

        },
      events: [
           <?php
          $sql= "select a.id, fecha, nombrecli as cliente,d.nombre as Tienda, a.observacion, color, a.final, a.tipoEvento codEvento 
          from agenda a inner join tipoEvento b 
          on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente 
          inner join SucurCliente d on d.cod_suc = a.JA_IDSucursalCli where isnull(a.finalizado,0) = 0";

         // $sql= "select a.id, fecha, nombrecli as cliente, a.observacion, color, a.final, b.descripcion as estado, a.tipoEvento as codEvento from agenda a inner join tipoEvento b 
         //        on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente where isnull(a.finalizado,0) = 0";
          require_once("conexion.php");
          $resultado = odbc_exec($conexion, $sql); 
          while ($field = odbc_fetch_object($resultado)){
            echo '{ id: "'.$field->id .'", ';
            echo 'title: "'.($field->Tienda.'\t'.$field->cliente).'\t'.$field->codEvento.'",';
            //echo 'title: "'.utf8_encode($field->cliente) .'", ';
            echo 'start: "'.$field->fecha .'",';
            echo 'end: "'.$field->final .'",';
            echo 'color: "'.$field->color .'",';
            echo "extendedProps: {
              tipoEvento: '".$field->codEvento."'            
              },";
            $field->observacion = str_replace('"','\"',$field->observacion);
            echo 'description: "'.$field->observacion.'" },';
            //echo 'color: "'.$field->color .'" },';
          }
      ?>

      ],
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
	if (isNaN(descrip)){
      $("#busqueda").val(descrip);
	}
      $("#resultados").fadeOut();
    });


    function edit(event){
         start = moment(event.start).format('YYYY-MM-DD HH:MM:SS');
      if(event.end){
        end = moment(event.end).format('YYYY-MM-DD HH:MM:SS');
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

    function posponer(event){
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
       url: 'editEventDate2.php',
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
 <div><h4>Actividades Pendientes </h4></div>	
    <div id='calendar'></div>
  </div>
  </br>
</div>

</br>
</br>


 

