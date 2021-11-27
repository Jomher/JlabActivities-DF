<style type="text/css">
    #result{
        font-size: 14px;
    }
</style>
</br>
<div class="card card-block responsive nowrap">
	<h4 align='Center'>Buscar actividades</h4>

<div class="row">   
	<div class="container">
   	<br />
   	<h2 align="center"></h2><br />
   	<div class="form-group">
    <div class="row">

    <div class="col-md-2">  
    <i class="fa fa-calendar prefix grey-text"></i>
    Fecha de Ingreso 
    <input type="date" name="fechaingreso" id="fechaingreso" class="form-control" step="1" min="1990-01-01" max="3000-12-31" value="<?php echo date("Y-m-01"); ?>" />
    </div>
  
    <!-- <div class="col-md-2">
    <i class="fa fa-calendar prefix grey-text"></i>
    Fecha Hasta
    <input type="date" name="fHasta" id="fHasta" class="form-control" step="1" min="1990-01-01" max="3000-12-31" value="<?php echo date("Y-m-d"); ?>"/>
    </div> -->

    <div class="col-md-2">
    <i class="fa fa-folder-o prefix grey-text"></i>
    Trabajadores
    <select name="trabajador" class="form-control" id="trabajador" required="true">
      <option value="">Todos</option>
      <?php
        $sql= "select JA_Nombres from JA_Trabajadores";
        require_once("conexion.php");
        $resultado = odbc_exec($conexion, $sql); 
        while ($field = odbc_fetch_object($resultado)){
        echo '<option value="'.$field->JA_Nombres.'">'.$field->JA_Nombres.'</option>';
        }
      ?>

     </select>
    </div>

    <div class="col-md-2">
    <i class="fa fa-folder-o prefix grey-text"></i>
    Vehiculo
    <select name="vehiculo" class="form-control" id="vehiculo" required="true">
      <option value="">Todos</option>
      <?php
        $sql= " select JA_Marca, [JA_Placa] from JA_Vehiculos";
        require_once("conexion.php");
        $resultado = odbc_exec($conexion, $sql); 
        while ($field = odbc_fetch_object($resultado)){
            echo '<option value="'.$field->JA_Marca.'">'.$field->JA_Marca + $field->JA_Placa.'</option>';
        
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
   url:"procesaConsultaAct.php",
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
     creaDataTable('#reporteAct');
     });
     function creaDataTable(idtable){
          $(idtable).DataTable({
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
  var search = "SELECT [fecha],[codcliente],[Cliente],[Tienda],[Actividad],[Trabajadores],[Vehiculo],[Placa],[final] FROM [PHData_DF].[dbo].[ReporteActividades]";
  var feingre = $('#fechaingreso').val().replace(/-/g,"");
  //var hasta = $('#fHasta').val().replace(/-/g,"");
  var trabajador = $('#trabajador').val();
  var Tienda = $('#sucur').val();
  var Vehiculo = $('#vehiculo').val();
  var cliente = $('#search_text').val().replace(/ /g," near ");

  search = search+ " where fecha = '"+feingre+"' ";

  if (trabajador != ""){
    search = search+ " and Trabajadores = '"+trabajador+"'";    
  }

  if (Tienda != ""){
    search = search+ "and Tienda = '"+Tienda+"'";     
  }

   if (cliente != ""){
    search = search+ " and Cliente like '%"+cliente+"%' ";    
  }
  if (Vehiculo != ""){
    search = search+ " and Vehiculo = '"+Vehiculo+"'";    
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
        var search = "SELECT [fecha],[codcliente],[Cliente],[Tienda],[Actividad],[Trabajadores],[Vehiculo],[Placa],[final] FROM [PHData_DF].[dbo].[ReporteActividades]";
        var feingre = $('#fechaingreso').val().replace(/-/g,"");
        //var hasta = $('#fHasta').val().replace(/-/g,"");
        var trabajador = $('#trabajador').val();
        var Tienda = $('#sucur').val();
        var Vehiculo = $('#vehiculo').val();
        var cliente = $('#search_text').val().replace(/ /g," near ");

        search = search+ " where fecha = '"+feingre+"' ";

        if (trabajador != ""){
            search = search+ " and Trabajadores = '"+trabajador+"'";    
        }

        if (Tienda != ""){
            search = search+ "and Tienda = '"+Tienda+"'";    
        }

        if (cliente != ""){
            search = search+ " and Cliente like '%"+cliente+"%' ";    
        }
        if (Vehiculo != ""){
            search = search+ " and Vehiculo = '"+Vehiculo+"'";    
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
