<style type="text/css">
    #example{
        font-size: 13px;
    }
</style>

<!-- Librerias para reporte excel -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="js/tableToExcel.js"></script> -->


 

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
<link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  

<?php
echo"</br>";
include('conexion.php');
$sql = 'SELECT [JA_idtrabajadores]
        ,[JA_CodTrabajador] ,[JA_Nombres] ,[JA_Apellidos],[JA_EstadoLab],[JA_Telef]
        FROM [JA_Trabajadores]';
        $resultado = odbc_exec($conexion, $sql);
$tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>Código</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Teléfono</th>
        <th>Estado</th>
        <th>Accion</th>
    </tr>
</thead>
<tbody>';

while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    // $tabla.="<td> <a href='index.php?p=detalleCliente&id=".utf8_encode($field->JA_CodTrabajador)."'>".utf8_encode($field->JA_CodTrabajador)."</a></td>";
    $tabla.="<td>".utf8_encode($field->JA_CodTrabajador)."</td>";
    $tabla.="<td>".utf8_encode($field->JA_Nombres)."</td>";
    $tabla.="<td>".utf8_encode($field->JA_Apellidos)."</td>";
    $tabla.="<td>".utf8_encode($field->JA_Telef)."</td>";

    if($field->JA_EstadoLab == 1){
        $tabla.="<td>".'Activo'."</td>";
    }
    if($field->JA_EstadoLab == 0){
        $tabla.="<td>".'Inactivo'."</td>";
    }
    $tabla.="<td><a href='#' title='eliminar' onclick='confirmaDel(this.id)' id ='$field->JA_CodTrabajador' ><i class='fa fa-trash'></i></a>    ";
    $tabla.="<a href=index.php?p=editartrabajador&id=".utf8_encode($field->JA_CodTrabajador)." title='editar'><i class='fa fa-edit'></i></a></td>";
    $tabla.='</tr>';
}
$tabla.='</tbody></table>';


?>  
    <script>
        function confirmaDel(id){
            var JA_CodTrabajador = id;
            r = confirm ("Desea Eliminar este trabajador?");
            if (r){
                //alert(cliente);
                window.location.href = "borrartrabajador.php?id="+JA_CodTrabajador;
            }
        }
    </script>
    <div class="card card-block responsive nowrap">
    <div class="col-lg-12">
    <h4 align='Center'>Trabajadores</h4>
    <div class="row">   
    <a class="btn btn-info" href="index.php?p=trabajador" title="Agregar Trabajador"><i class='fa fa-user-plus'></i></a>

    <!-- <form action="crearPdf.php" method="post"> -->
     <!-- <a class="btn btn-info" onclick="tableToExcel('example', 'Trabajadores')" type="Submit" name="genereporte" title="Imprimir" >EXCEL<i class='fa fa-download'></i></a> -->
     <!-- <input type="submit" onclick="tableToExcel('example', 'Clientes')" name="genereporte" class="btn btn-info" >  -->
    <!-- </form> -->
    <!-- <form action="reportepdf.php" method="post"> -->
        <!-- <input type="submit" name="create_pdf" value="PDF" class="btn btn-info" > -->
    <!-- <a class="btn btn-info" href="index.php?p=reportepdf" type="Submit" name="genereporte" title="Imprimir" >PDF<i class='fa fa-download'></i></a> -->
    <!-- </form>     -->
        
        
    </div>
         
        <?php echo $tabla ?>

    
    </div> 
    </div>  
</br>
</br>