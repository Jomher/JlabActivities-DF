<?php
echo"</br><h3 align='center'>Listado de Pedidos</h3>";
//echo $_SESSION["decimalprecio"]." ".$_SESSION["decimalcantidad"];
$filtro = "";
$todos ="active";
$autorizados="";
$noautorizados="";

if (isset ($_GET['f'])){
	$f =$_GET['f'];
	switch ($f) {
	 	case 1:
	 		$filtro = "";
	 		$todos ="active";
	 		$autorizados="";
			$noautorizados="";
	 		break;
	 	case 2:
	 		$filtro = "AND  a.autorizadoCXC = 'true' ";
	 		$todos ="";
	 		$autorizados="active";
			$noautorizados="";
	 		break;
	 	case 3:
	 		$filtro = "AND isnull(a.autorizadoCXC,'false') = 'false' ";
	 		$todos ="";
	 		$autorizados="";
			$noautorizados="active";
	 		break;
	 	default:
	 		$filtro = "";
	 		$todos ="active";
	 		$autorizados="";
			$noautorizados="";
	 		break;
	 } 
	//echo $filtro;
}
 

$vendedor= $_SESSION["vendedor"];
$sql="";
if ($vendedor == ""){
	$sql="select a.idpedido,
(case when isnull (e.idliquidacion,0) > 0 then 'ENTREGADO' else 
	case when isnull(d.IdDespacho,0)>0 then 'EN RUTA' else
		case when a.facturado = 'true' then 'FACTURADO' else
			case when a.autorizadoCXC = 'true' then 'APROBADO' else
				'INGRESADO'
			end
		end 
	end
end)as estado,
a.cliente,b.nombrecli,c.nombre_vend,cast (a.fecha as date) as fecha, cast (a.fechaentrega as date) as fechaentrega, a.observacion,a.Total from rep_pedidos as a 
inner join clientes as b on a.cliente = b.cliente inner join vendedores as c
on a.idvendedor = c.idvendedor left outer join facturas as d on a.tipofact = d.tipofact and a.numero = d.numero
left outer join Des_Despacho as e on d.IdDespacho = e.IDDespacho
where (case when isnull (e.idliquidacion,0) > 0 then 'ENTREGADO' else 
	case when isnull(d.IdDespacho,0)>0 then 'EN RUTA' else
		case when a.facturado = 'true' then 'FACTURADO' else
			case when a.autorizadoCXC = 'true' then 'APROBADO' else
				'INGRESADO'
			end
		end 
	end
end) <> 'ENTREGADO' $filtro order by a.fecha desc 
";
} else{
	$sql="select a.idpedido,
(case when isnull (e.idliquidacion,0) > 0 then 'ENTREGADO' else 
	case when isnull(d.IdDespacho,0)>0 then 'EN RUTA' else
		case when a.facturado = 'true' then 'FACTURADO' else
			case when a.autorizadoCXC = 'true' then 'APROBADO' else
				'INGRESADO'
			end
		end 
	end
end)as estado,
a.cliente,b.nombrecli,c.nombre_vend,cast (a.fecha as date) as fecha, cast (a.fechaentrega as date) as fechaentrega, a.observacion,a.Total from rep_pedidos as a 
inner join clientes as b on a.cliente = b.cliente inner join vendedores as c
on a.idvendedor = c.idvendedor left outer join facturas as d on a.tipofact = d.tipofact and a.numero = d.numero
left outer join Des_Despacho as e on d.IdDespacho = e.IDDespacho
where (case when isnull (e.idliquidacion,0) > 0 then 'ENTREGADO' else 
	case when isnull(d.IdDespacho,0)>0 then 'EN RUTA' else
		case when a.facturado = 'true' then 'FACTURADO' else
			case when a.autorizadoCXC = 'true' then 'APROBADO' else
				'INGRESADO'
			end
		end 
	end
end) <> 'ENTREGADO' and c.idvendedor = '".$vendedor."' $filtro order by a.fecha desc 
";
}

require_once("conexion.php");

$resultado = odbc_exec($conexion, $sql); 
if ($field = odbc_fetch_object($resultado)) {

echo'
<div class="card-block responsive nowrap">
<div class="row">	
<a class="btn btn-success" href="index.php?p=clientes">Agregar Pedido</a>
</div>
</br>

<div class="btn-group btn-group-sm" role="group">
  <a class="btn btn-info btn-sm check-label '.$todos.'" href="index.php?p=main&f=1">Todos</a>
  <a class="btn btn-info btn-sm check-label '.$autorizados.' " href="index.php?p=main&f=2">Autorizados</a>
  <a class="btn btn-info btn-sm check-label '.$noautorizados.' " href="index.php?p=main&f=3">No Autorizados</a>
</div>

</br>
</br>
<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Estado</th>
                <th>Nombre Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Fecha Entrega</th>
                <th>Vendedor</th>
				<th>Observacion</th>
            </tr>
        </thead>
 
        <tbody>
            <tr>';

$resultado = odbc_exec($conexion, $sql); 
while ($field = odbc_fetch_object($resultado))
{
switch ($field->estado) {
	case 'INGRESADO':
		echo "<td><a title='".$field->estado."' class='btn btn-outline-info' href='index.php?p=consultapedido&id=".$field->idpedido."'>
		<i class='fa fa-hourglass-2' aria-hidden='true'></i></a></td>";
		break;
	case 'APROBADO':
		echo "<td><a title='".$field->estado."' class='btn btn-outline-info' href='index.php?p=consultapedido&id=".$field->idpedido."'>
		<i class='fa fa-check-square-o' aria-hidden='true'></i></a></td>";
		break;
	case 'FACTURADO':
		echo "<td><a title='".$field->estado."' class='btn btn-outline-info' href='index.php?p=consultapedido&id=".$field->idpedido."'>
		<i class='fa fa-clipboard' aria-hidden='true'></i></a></td>";
		break;
	case 'EN RUTA':
		echo "<td><a title='".$field->estado."' class='btn btn-outline-info' href='index.php?p=consultapedido&id=".$field->idpedido."'>
		<i class='fa fa-truck' aria-hidden='true'></i></a></td>";
		break;
	case 'ENTREGADO':
		echo "<td><a title='".$field->estado."' class='btn btn-outline-info' href='index.php?p=consultapedido&id=".$field->idpedido."'>
		<i class='fa fa-cubes' aria-hidden='true'></i></a></td>";
		break;
	
	default:
		# code...
		break;
}
//echo "<td>". utf8_encode ($field->cliente). "</td>";
echo "<td>". utf8_encode ($field->nombrecli)." (".utf8_encode($field->cliente).") </td>";
echo "<td>".  date("d/m/Y", strtotime($field->fecha))." </td>";
echo "<td>". round ($field->Total,2)." </td>";
echo "<td>". date("d/m/Y", strtotime($field->fechaentrega))." </td>";
echo "<td>". utf8_encode ($field->nombre_vend)." </td>";
echo "<td>". utf8_encode ($field->observacion)." </td>";
echo "</tr>";

}

?>
</tbody>
    </table>
    </br>
<?php } ?>
<div class="row">
<a class="btn btn-success" href="index.php?p=clientes">Agregar Pedido</a>
</div>



   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h5>Pedido Agregado Exitosamente</h5>
           </div>
           <div class="modal-body">
              <h6>Presione continuar</h6>
              para volver a la pagina principal.    
       </div>
           <div class="modal-footer">
          <a href="index.php" data-dismiss="modal" class="btn btn-success btn-sm" onclick="principal()">Continuar</a>
           </div>
      </div>
   </div>
</div>


