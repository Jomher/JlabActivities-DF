<!DOCTYPE html5>
<html lang="es">
<head>
  <title>JLab</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="JLAB.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php  
  session_start();
  if (!isset($_SESSION["user"])){
  header("Location: index.html");
  } ?>

      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

     <!-- Datatable CSS -->
     <link href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
     <link href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />


    <!-- FullCalendar -->
  	<link href='css/fullcalendar.css' rel='stylesheet'/>
  	<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.1/fullcalendar.css' rel='stylesheet'/>

     <!-- BOOTSTRAP CSS -->
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
</head>
<body>

<div class="">
<!--  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> -->
<?php
    require_once 'navbar.php'; ?>
  
</div>
</br>
</br>
<main>
 <div class="container">
  <div class="row">
    <?php
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'cal';
    $id = isset($_GET['id']) ? '?id='.strtolower($_GET['id']) : '';
    require_once 'navbar.php'; ?>
    
    <div class="col-sm-12">
    
      <?php 
      require_once '' . $pagina . '.php';
      ?>
    
    </div>
    <!-- <div class="col-sm-12"> -->

     <!-- <footer class="well well-sm text-center">
            Desarrollado por <a href="#">Jlab Bussines Software</a>
     </footer> -->
      
    <!-- </div> -->
  </div>
</div>
</main> 
       <!-- JS Libraries -->
    <!-- JS Libraries DATATABLE-->
    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
   <!-- <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>-->

       <!-- FullCalendar -->
	  <script src='js/moment.min.js'></script>
	  <script src='js/fullcalendar.min.js'></script>
	  <!--script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.1/fullcalendar.js'></script-->
	  

    <!-- JS Libraries DATATABLE con botones-->
    <script src="jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    

  <script> 
    
    $(document).ready(function() {
     creaDataTable('#example');
     creaDataTable('#example2');
     });

    function creaDataTable(idtable){
          $(idtable).DataTable({
            responsive: "true",
            dom: 'Bfrtip',
      buttons: [
        {
          extend:   'copyHtml5',
          text:     '<i class="fa fa-copy" style="font-size:20px;color:black"></i> ',
          titleAttr: 'Copiar'
        },
          {
            extend:   'excelHtml5',
            text:     '<i class="fa fa-file-excel-o" style="font-size:20px;color:green"></i> ',
            titleAttr: 'Exportar a Excel'
          },
          {
            extend:   'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i> ',
            titleAttr: 'Exportar a PDF'
          },
          {
            extend:   'colvis',
            text:     '<i class="fa fa-columns" style="font-size:20px;color:blue"></i> ',
            titleAttr: 'Visualizar columnas que quiere en el reporte'
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

  </script>


<?php 

if (isset($_GET["o"])){
      echo'
     <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>';
    }
?>

  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script-->
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
   <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>


<div class='container'>
<!-- Footer -->
<footer class="well well-sm text-center">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    Desarrollado por <a href="#">Jlab Bussines Software</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</div>




</body>
