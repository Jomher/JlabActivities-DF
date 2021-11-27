<?php
$id  = $_GET["id"];
echo "elimina archivo ".$id;

include("conexion.php");

$sql= "select * from archivos where id = $id";

$resultado = odbc_exec($conexion, $sql);
while($field = odbc_fetch_object($resultado)){
	$fichero =  $field->ruta;
	$fichero = 'upload/'.$fichero;
	$idAgenda = $field->idAgenda;
	echo "<br>".$fichero;

	if (file_exists($fichero)){
		echo "<br> archivo existe";
		unlink($fichero);
		
	}
}
$query = "delete from archivos where id = $id";
 odbc_exec($conexion, $query);
header("Location: index.php?p=archivos&id=$idAgenda"); 

?>
