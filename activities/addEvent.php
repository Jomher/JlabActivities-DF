<?php

// Connexion a basse de datos
require_once("conexion.php");
//echo $_POST['title'];
if (isset($_POST['busqueda_id']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$cliente = $_POST['busqueda_id'];
	$start =  str_replace("-","",$_POST['start']);
	$end =  str_replace("-","",$_POST['end']) ;
	$color = $_POST['color'];
	$coment = $_POST['coment'];

	$sql = "INSERT INTO agenda(cliente, fecha, final, tipoEvento, observacion) values ('$cliente', '$start', '$end', '$color', '$coment')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$resultado = odbc_exec($conexion, $sql);
	if ($resultado == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
