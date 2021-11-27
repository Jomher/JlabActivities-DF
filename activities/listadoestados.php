<style type="text/css">
    #example{
        font-size: 13px;
    }
</style>

<!-- Librerias para reporte excel -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="js/tableToExcel.js"></script> -->

<?php
echo"</br>";
include('conexion.php');
$sql = 'SELECT
        [tipoEvento] ,[descripcion],[color]
        FROM [tipoEvento]';
        $resultado = odbc_exec($conexion, $sql);
$tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>Código</th>
        <th>Nombre del estado</th>
        <th>Accion</th>
    </tr>
</thead>
<tbody>';

while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    // $tabla.="<td> <a href='index.php?p=detalleCliente&id=".utf8_encode($field->JA_CodTrabajador)."'>".utf8_encode($field->JA_CodTrabajador)."</a></td>";
    $tabla.="<td>".utf8_encode($field->tipoEvento)."</td>";
    $tabla.="<td style='background-color:".utf8_encode($field->color)."'>".utf8_encode($field->descripcion)."</td>";
    $tabla.="<td><a href='#' title='eliminar' onclick='confirmaDel(this.id)' id ='$field->tipoEvento' ><i class='fa fa-trash'></i></a>    ";
    $tabla.="<a href=index.php?p=editarestados&id=".utf8_encode($field->tipoEvento)." title='editar'><i class='fa fa-edit'></i></a></td>";
    $tabla.='</tr>';
}
$tabla.='</tbody></table>';


?>  
    <script>
        function confirmaDel(id){
            var tipoEvento = id;
            r = confirm ("Desea Eliminar este estado?");
            if (r){
                //alert(cliente);
                window.location.href = "borrarestado.php?id="+tipoEvento;
            }
        }
    </script>
    <div class="card card-block responsive nowrap">
    <div class="col-lg-12">
    <h4 align='Center'>Estados</h4>
    <div class="row">   
    <a class="btn btn-info" href="index.php?p=mantenimientoestado" title="Agregar Estado"><i class='fa fa-user-plus'></i></a>

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