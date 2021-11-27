<style type="text/css">
    #result{
        font-size: 14px;
    }
</style>
</br>
<div class="card card-block responsive nowrap">
	<h4 align='Center'>Buscar Cuentas</h4>

<div class="row">   
	<div class="container">
   	<br />
   	<h2 align="center"></h2><br />
   	<div class="form-group">
    <div class="row">

    <div class="col-md-2">  
    <i class="fa fa-calendar prefix grey-text"></i>
    Fecha Desde 
    <input type="date" name="fDesde" id="fDesde" class="form-control" step="1" min="1990-01-01" max="3000-12-31" value="<?php echo date("Y-m-01"); ?>" />
    </div>
  
    <div class="col-md-2">
    <i class="fa fa-calendar prefix grey-text"></i>
    Fecha Hasta
    <input type="date" name="fHasta" id="fHasta" class="form-control" step="1" min="1990-01-01" max="3000-12-31" value="<?php echo date("Y-m-d"); ?>"/>
    </div>

    <div class="col-md-2">
    <i class="fa fa-folder-o prefix grey-text"></i>
    Tipo Evento
    <select name="tipoEvento" class="form-control" id="tipoEvento" required="true">
      <option value="">Todos</option>
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

    <div class="col-md-2">
    <i class="fa fa-folder-o prefix grey-text"></i>
    Supervisor
    <select name="supervisor" class="form-control" id="supervisor" required="true">
      <option value="">Todos</option>
      <?php
        $sql= " select nombre from Clientes_contactos";
        require_once("conexion.php");
        $resultado = odbc_exec($conexion, $sql); 
        while ($field = odbc_fetch_object($resultado)){
          if($field->nombre != null){
            echo '<option value="'.$field->nombre.'">'.$field->nombre.'</option>';
          }
        
        }
      ?>  
       

    </select>
    </div>

    <div class="col-md-2">
    <i class="fa fa-folder-o prefix grey-text"></i>
    Cuentas
    <select name="cuenta" class="form-control" id="cuenta" required="true">
      <option value="">Todos</option>
      <?php
        $sql= "select JA_CodCuentaPago, JA_NombreCuenta from JA_CuentasDePago ";
        require_once("conexion.php");
        $resultado = odbc_exec($conexion, $sql); 
        while ($field = odbc_fetch_object($resultado)){
        echo '<option value="'.$field->JA_NombreCuenta.'">'.$field->JA_NombreCuenta.'</option>';
        }
      ?>
              
    </select>
    </div>

     <div class="col-md-2">
    <i class="fa fa-folder-o prefix grey-text"></i>
    Tienda
    <select name="sucur" class="form-control" id="sucur" required="true">
      <option value="">Todos</option>
      <?php
        $sql= "select nombre from sucurCliente ";
        require_once("conexion.php");
        $resultado = odbc_exec($conexion, $sql); 
        while ($field = odbc_fetch_object($resultado)){
        echo '<option value="'.$field->nombre.'">'.$field->nombre.'</option>';
        }
      ?>
              
    </select>
    </div>

    <div class="col-md-2">
    <i class="fa fa-calendar-check-o prefix grey-text"></i>
    Estatus
    <select name="Estatus" class="form-control" id="Estatus">
      <option value="">Todos</option>
      <option value="0">Pendientes</option>
      <option value="1">Finalizados</option>

    </select>
    </div>

    </div>
    <div class="input-group">
    <a class="btn btn-blue-grey" id="search_btn" href="#result"><i class="fa fa-search prefix"></i></a>
    <input type="text" name="search_text" id="search_text" placeholder="Buscar cliente (Código o nombre)..." class="form-control" autofocus="on" />
    </div>
   	</div>
   	<br />
   	

</div>    

</div>
<div id="result"></div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script>
//script de busqueda
 load_data();

 function load_data(query){
  $.ajax({
   url:"procesaConsultaCuentas.php",
   method:"POST",
   data:{query:query},
   beforeSend: function(){
                  //imagen de carga
                  $("#result").html("<p align='center'><img src='loader.gif' /></p>");
              },
   success:function(data)
   {
    $('#result').html(data);
    $(document).ready(function() {
     creaDataTable('#reporte');
     });
     function creaDataTable(idtable){
          $(idtable).DataTable({
            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 8 ).footer() ).html(
                //'$'+pageTotal +' ( $'+ total +' total)'
                '$'+ total 
            );
        },
            responsive: "true",
            dom: 'Bfrtip',
      buttons: [
        {
          extend:   'copyHtml5',
          text:     '<i class="fa fa-copy" style="font-size:20px;color:black"></i> ',
          titleAttr: 'Copiar',
          footer: true
        },
          {
            extend:   'excelHtml5',
            text:     '<i class="fa fa-file-excel-o" style="font-size:20px;color:green"></i> ',
            titleAttr: 'Exportar a Excel',
            footer: true
          },
          {
            extend:   'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i> ',
            titleAttr: 'Exportar a PDF',
            messageTop: 'Del ' +$('#fDesde').val().replace(/-/g,"/")+ ' al '+ $('#fHasta').val().replace(/-/g,"/"),
            orientation: 'landscape',
            title: 'Reporte de Cuentas',
            footer: true
          },
          {
            extend:   'colvis',
            text:     '<i class="fa fa-columns" style="font-size:20px;color:blue"></i> ',
            titleAttr: 'Visualizar Columnas que quiere en el reporte',
            footer: true
          }
        ],
      "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            } 
          }
          
    });
    }
   }
  });
 }


 $('#search_btn').click(function(){
  //var search = $('#search_text').val();
  var search = "SELECT IdRecep,[cliente],[nombrecli],[fecha],[observacion],[JA_Supervisor],[sucursal],[final],[tipoEvento],[Status],[color],[finalizado],[JA_NombreCuenta],[Precio]  FROM [reporteEventos]";
  var desde = $('#fDesde').val().replace(/-/g,"");
  var hasta = $('#fHasta').val().replace(/-/g,"");
  var tipoEvento = $('#tipoEvento').val();
  var Estatus = $('#Estatus').val();
  var cliente = $('#search_text').val().replace(/ /g," near ");
  var cuenta = $('#cuenta').val();
  var supervisor = $('#supervisor').val();
  var Tienda = $('#sucur').val();

  search = search+ " where fecha between '"+desde+"' and '"+hasta+"'";

  if (tipoEvento != ""){
    search = search+ " and tipoEvento = '"+tipoEvento+"'";    
  }

  if (Estatus != ""){
    search = search+ " and ISNULL(finalizado,0) = "+Estatus+"";    
  }

   if (cliente != ""){
    search = search+ " and nombrecli like '%"+cliente+"%' ";    
  }
  if (cuenta != ""){
    search = search+ " and JA_NombreCuenta = '"+cuenta+"'";    
  }
  if (supervisor != ""){
    search = search+ " and JA_Supervisor = '"+supervisor+"'";    
  }
  if (Tienda != ""){
      search = search+ "and sucursal = '"+Tienda+"'";    
  }

  //$('#result').html(search);

  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });





  $('#search_text').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        //alert('You pressed a "enter" key in textbox'); 
        var search = "SELECT IdRecep ,[cliente],[nombrecli],[fecha],[observacion],[JA_Supervisor],[sucursal],[final],[tipoEvento],[Status],[color],[finalizado],[JA_NombreCuenta],[Precio]  FROM [reporteEventos]";
        var desde = $('#fDesde').val().replace(/-/g,"");
        var hasta = $('#fHasta').val().replace(/-/g,"");
        var tipoEvento = $('#tipoEvento').val();
        var Estatus = $('#Estatus').val();
        var cliente = $('#search_text').val().replace(/ /g," near ");
        var cuenta = $('#cuenta').val();
        var supervisor = $('#supervisor').val();
        var Tienda = $('#sucur').val();

        search = search+ " where fecha between '"+desde+"' and '"+hasta+"'";

        if (tipoEvento != ""){
          search = search+ " and tipoEvento = '"+tipoEvento+"'";    
        }

        if (Estatus != ""){
          search = search+ " and ISNULL(finalizado,0) = "+Estatus+"";    
        }

         if (cliente != ""){
          search = search+ " and nombrecli like '%"+cliente+"%' ";    
        }
        if (cuenta != ""){
          search = search+ " and JA_NombreCuenta like '%"+cuenta+"%'";    
        }
        if (supervisor != ""){
            search = search+ " and JA_Supervisor = '"+supervisor+"'";    
        }
        if (Tienda != ""){
            search = search+ "and sucursal = '"+Tienda+"'";    
        }

        //$('#result').html(search);

        if(search != '')
        {
         load_data(search);
        }
        else
        {
         load_data();
        }
    }
});

</script>
