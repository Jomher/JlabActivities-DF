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
 

 $sql ="SELECT fecha,[codcliente],[Cliente],[Tienda],[Actividad],[Trabajadores],[Vehiculo],[Placa],[final]
FROM [ReporteActividades]
WHERE Cliente like '%".$consulta."%'
ORDER BY  fecha, codcliente, Cliente ";
 $resultado = odbc_exec($conexion, $consulta); 
 
 /*if($field = odbc_fetch_object($resultado))  
 { */ 

                 $output = '<br><br> <table id="reporteAct" class="display responsive wrap" cellspacing="0" width="100%">
                <thead>  
                <tr> 
                  <th>Fecha</th>
                  <th>Cliente</th>
                  <th>Tienda</th>
                  <th>Actividad</th>
                  <th>Trabajadores</th>
                  <th>Vehiculo</th>
                  <th>Placa</th>
                </tr>
                </thead><tbody>'; 

      //$resultado = odbc_exec($conexion, $sql);           
      while($field = odbc_fetch_object($resultado))  
      {  
        $output.='<tr>';
        //$output.="<td> <a href='index.php?p=detalleCliente&id=".utf8_encode($field->cliente)."'>".utf8_encode($field->cliente)."</a></td>";
        $output.="<td>".utf8_encode($field->fecha)."</td>";
        $output.="<td>".utf8_encode($field->Cliente)."</td>";
        $output.="<td>".utf8_encode($field->Tienda)."</td>";
        $output.="<td>".utf8_encode($field->Actividad)."</td>";
        $output.="<td>".utf8_encode($field->Trabajadores)."</td>";
        $output.="<td>".utf8_encode($field->Vehiculo)."</td>";
        $output.="<td>".utf8_encode($field->Placa)."</td>";
        $output.='</tr>';
    }  
 /*}  
 else  
 {  
      $output .= 'Sin resultados';
 }  */
 $output .= ' </tbody>
</table>';  
 echo $output;  
}
?>