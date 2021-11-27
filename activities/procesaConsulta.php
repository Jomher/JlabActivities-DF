<style type="text/css">
    #example{
        font-size: 13px;
    }
</style>
<?php
//fetch.php
if (isset($_POST["query"])){
 session_start();
 include("conexion.php");
 $cliente = '';
 if (isset($_POST["cliente"])){
  $cliente = $_POST["cliente"];
 }
 $consulta = $_POST["query"];
 //$consulta = str_replace(" ","%",$consulta);
 $output = ''; 
 

 $sql ="SELECT        cliente, nombrecli, fecha, observacion,JA_Supervisor, final, tipoEvento, Status , color, finalizado, Precio, [JA_NombreCuenta]
FROM            reporteEventos
WHERE nombrecli like '%".$consulta."%'
ORDER BY fecha, cliente, nombrecli ";
 $resultado = odbc_exec($conexion, $consulta); 
 
 /*if($field = odbc_fetch_object($resultado))  
 { */ 

                 $output = '<br><br> <table id="reporte" class="display responsive wrap" cellspacing="0" width="100%">
                <thead>  
                <tr>
                  <th WIDTH="50" HEIGHT="50">Codigo</th>  
                  <th>Cliente</th>
                  <th>Ingreso</th>
                  <th>Observacion</th>
                  <th>Supervisor</th>
                  <th>Status</th>
                  <th>Cuenta</th>
                  <th>Precio</th>
                </tr>
                </thead><tbody>'; 

      //$resultado = odbc_exec($conexion, $sql);           
      while($field = odbc_fetch_object($resultado))  
      {  

        $output.='<tr>';
         $output.="<td> <a href='index.php?p=detalleCliente&id=".utf8_encode($field->cliente)."'>".utf8_encode($field->cliente)."</a></td>";
        $output.="<td>".utf8_encode($field->nombrecli)."</td>";
        $output.="<td>".utf8_encode($field->fecha)."</td>";
        $output.="<td>".utf8_encode($field->observacion)."</td>";
        $output.="<td>".utf8_encode($field->JA_Supervisor)."</td>";
        $output.="<td style='background-color:".utf8_encode($field->color)."'>".utf8_encode($field->Status)."</td>";
        //$output.="<td>".(utf8_encode($field->finalizado)==1?"<i class='fa fa-check'></i>":"<i class='fa fa-close'></i>")."</td>";
        $output.="<td>".utf8_encode($field->JA_NombreCuenta)."</td>";
        $output.="<td>".utf8_encode($field->Precio)."</td>";
    
    }  
 /*}  
 else  
 {  
      $output .= 'Sin resultados';
 }  */
 $output .= ' </tbody>
 <tfoot>
     <tr>
     <td colspan="6"></td>
     <th  style="text-align:right">Total: </td>
         <th> </th>
     </th>
 </tfoot>
</table>';  
 echo $output;  
}
?>

    <!-- <script>
   $(document).ready(function() {
    $('#reporte').DataTable( {
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
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 7 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        }
    } );
} );
    </script> -->