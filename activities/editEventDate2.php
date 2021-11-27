<?php

// Conexion a la base de datos
require_once("conexion.php");

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = str_replace("-","",$_POST['Event'][1]);
	$end = str_replace("-","",$_POST['Event'][2]);


	$sql = "insert into agenda (cliente, fecha, direccion, final, tipoEvento) select cliente, '$start', direccion, '$end', tipoEvento from agenda where id = $id";
	echo $sql;		
	$resultado = odbc_exec($conexion, $sql);


	$sql = "UPDATE agenda set finalizado = 1, tipoEvento='05' WHERE id = $id";
	//echo "<br>".$sql;
	//odbc_exec($conexion, $sql)
	//$sql = "UPDATE agenda SET  fecha = '$start' WHERE id = $id ";

	
	//$resultado = odbc_exec($conexion, $sql);
	if (odbc_exec($conexion, $sql)) {
	 die ('OK');
	}
	else{
	 die ('Error de base de datos '.$sql);
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
