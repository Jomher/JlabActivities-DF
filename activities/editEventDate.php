<?php

// Conexion a la base de datos
require_once("conexion.php");

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = str_replace("-","",$_POST['Event'][1]);
	$end = str_replace("-","",$_POST['Event'][2]);

	$sql = "UPDATE agenda SET  fecha = '$start', final ='$end' WHERE id = $id ";

	
	$resultado = odbc_exec($conexion, $sql);
	if ($resultado) {
	 die ('OK');
	}
	else{
	 die ('Error de base de datos');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
