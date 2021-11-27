<style type="text/css">
    #example{
        font-size: 13px;
    }
</style>

<!-- Librerias para reporte excel -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="js/tableToExcel.js"></script> -->

<!-- código JS propìo-->    
     <!-- <script type="text/javascript" src="main.js"></script>    -->
 

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
<link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">


<?php
echo"</br>";
include('conexion.php');
$sql = 'select cliente, nombrecli, direcli, email, telecli, departamento, b.nombre_depto as nomdep, a.contacto from Clientes a left outer join cat_deptosg b
on a.departamento =  b.codigo_depto';
$resultado = odbc_exec($conexion, $sql);
$tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Departamento</th>
        <th>Contacto</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Accion</th>
    </tr>
</thead>
<tbody>';

while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    //$tabla.="<td> <a href='index.php?p=detalleCliente&id=".utf8_encode($field->cliente)."'>".utf8_encode($field->cliente)."</a></td>";
    $tabla.="<td>".utf8_encode($field->cliente)."</td>";
    $tabla.="<td>".utf8_encode($field->nombrecli)."</td>";
    $tabla.="<td>".utf8_encode($field->direcli)."</td>";
    $tabla.="<td>".utf8_encode($field->departamento)."</td>";
    $tabla.="<td>".utf8_encode($field->contacto)."</td>";
    $tabla.="<td>".utf8_encode($field->telecli)."</td>";
    $tabla.="<td>".utf8_encode($field->email)."</td>";
    $tabla.="<td><a href='#' title='eliminar' onclick='confirmaDel(this.id)' id ='$field->cliente' ><i class='fa fa-trash'></i></a>    ";
    $tabla.="<a href=index.php?p=JLAB_FrmEditarClientes&id=".utf8_encode($field->cliente)." title='editar'><i class='fa fa-edit'></i></a></td>";
    $tabla.='</tr>';
}
$tabla.='</tbody></table>';


?>  
    <script>
        function confirmaDel(id){
            var cliente = id;
            r = confirm ("Desea Eliminar este cliente?");
            if (r){
                //alert(cliente);
                window.location.href = "ProcesoDeleteClientes.php?id="+cliente;
            }
        }
    </script>
    <div class="card card-block responsive nowrap">
    <div class="col-lg-12">
    <h4 align='Center'>Clientes</h4>
    <div class="row">   
    <a class="btn btn-info" href="index.php?p=JLAB_FrmClientes" title="Agregar Clientes"><i class='fa fa-user-plus'></i></a>

    <!-- <div class="row">   
    <a class="btn btn-info" href="index.php?p=registrar" title="Agregar Cliente"><i class='fa fa-user-plus'></i></a>
        
        
    </div> -->

    <!--div class="btn-group btn-group-sm" role="group">
      <a class="btn btn-info btn-sm check-label '.$todos.'" href="index.php?p=main&f=1">Todos</a>
      <a class="btn btn-info btn-sm check-label '.$autorizados.' " href="index.php?p=main&f=2">Autorizados</a>
      <a class="btn btn-info btn-sm check-label '.$noautorizados.' " href="index.php?p=main&f=3">No Autorizados</a>
    </div-->
  
    </div>
     
     
    <?php echo $tabla ?>

    
    </div> 
    </div>  
</br>
</br>