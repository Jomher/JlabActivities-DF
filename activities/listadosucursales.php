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
$sql = 'SELECT [cod_suc] ,[nombre] ,a.[cliente] as codcli, b.nombrecli as nombrecli ,[direccion] ,[cod_depto] ,[cod_muni],[num_telefono],a.[cuentacontable] as contacto
 FROM [sucurCliente] a left outer join Clientes b on a.cliente = b.Cliente';

$resultado = odbc_exec($conexion, $sql);
$tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>Código Sucursal</th>
        <th>Sucursal o Tienda</th>
        <th>Código Cliente</th>
        <th>Cliente</th>
        <th>Direccion</th>
        <th>Teléfono</th>
        <th>Contacto</th>
        <th>Accion</th>
    </tr>
</thead>
<tbody>';

while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    //$tabla.="<td> <a href='index.php?p=detalleCliente&id=".utf8_encode($field->cliente)."'>".utf8_encode($field->cliente)."</a></td>";
    $tabla.="<td>".utf8_encode($field->cod_suc)."</td>";
    $tabla.="<td>".utf8_encode($field->nombre)."</td>";
    $tabla.="<td>".utf8_encode($field->codcli)."</td>";
    $tabla.="<td>".utf8_encode($field->nombrecli)."</td>";
    $tabla.="<td>".utf8_encode($field->direccion)."</td>";
    $tabla.="<td>".utf8_encode($field->num_telefono)."</td>";
    $tabla.="<td>".utf8_encode($field->contacto)."</td>";
    $tabla.="<td><a href='#' title='eliminar' onclick='confirmaDel(this.id)' id ='$field->cod_suc' ><i class='fa fa-trash'></i></a>    ";
    $tabla.="<a href=index.php?p=JLAB_FrmEditarSucursales&id=".utf8_encode($field->cod_suc)." title='editar'><i class='fa fa-edit'></i></a></td>";
    $tabla.='</tr>';
}
$tabla.='</tbody></table>';


?>  
    <script>
        function confirmaDel(id){
            var cliente = id;
            r = confirm ("Desea Eliminar esta sucursal?");
            if (r){
                //alert(cliente);
                window.location.href = "ProcesoDeleteSucursales.php?id="+cod_suc;
            }
        }
    </script>
    <div class="card card-block responsive nowrap">
    <div class="col-lg-12">
    <h4 align='Center'>Sucursales o Tiendas</h4>
    <div class="row">   
    <a class="btn btn-info" href="index.php?p=JLAB_FrmSucursales" title="Agregar Sucursales"><i class='fa fa-user-plus'></i></a>

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