<?php
$query = $_POST['query'];
$funcion = $_POST['funcion'];

require_once("conexion.php");
//$sql="select top(8) cliente as cliente, nombrecli as nombrecli from clientes where nombrecli like'%".$query."%'";
$sql = $query;
$resultado = odbc_exec($conexion, $sql);

$output = '<ul class="list-group">';	
	//if ($field=odbc_fetch_object($resultado))
	//$output .= '<a type="button"> algo </a>'; 
	while ($field = odbc_fetch_object($resultado))
	{		
		//$resultado[] = $field->nombrecta;
 
    /*$output .='<a type="button" class="list-group-item list-group-item-action" id="'.$field->cliente.'" onclick="agregar(this.id)">'
	.utf8_encode($field->cliente).' '.utf8_encode($field->nombrecli).'</a>';*/
    
	$output .='<a type="button" class="list-group-item list-group-item-action" id="'.$field->idbusqueda.'" onclick="'.$funcion.'(this.id, this.text)">'
	.utf8_encode($field->idbusqueda).' '.utf8_encode($field->descripbusqueda).'</a>';

	}
	$output .="</ul>";
	echo $output;
	//echo json_encode("Prueba");	
?>