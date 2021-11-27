<?php

require_once("conexion.php");
if (isset($_POST['delete']) && isset($_POST['id'])){
	echo "primer if";
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM agenda WHERE id = $id";
	$resultado = odbc_exec($conexion, $sql);
	
	if ($resultado == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}
}

elseif (isset($_POST['finalizar']) && isset($_POST['id'])) {
	$id = $_POST['id'];
	$meses = $_POST['meses'];
	$color = $_POST['color'];
	echo "</br>".$meses;
	echo "segundo if";
	if ($meses != ""){	
	/*$sql = "insert into agenda (cliente, fecha, direccion, final, tipoEvento)
			select cliente, DATEADD(month,$meses,convert(date,fecha)), direccion, DATEADD(day,1,DATEADD(month,$meses, convert (date,fecha))), tipoEvento from agenda where id = $id";*/
	$sql = "insert into agenda (cliente, fecha, direccion, final, tipoEvento)
	select cliente, DATEADD(month,$meses,convert(date,fecha)), direccion, DATEADD(month,$meses,convert(date,fecha)), '$color' from agenda where id = $id";
			
	echo $sql;		
	$resultado = odbc_exec($conexion, $sql);
	}
	$observacion = $_POST['coment2'];
	$sql = "UPDATE agenda set finalizado = 1, tipoEvento='07', observacion= '$observacion' WHERE id = $id";
	echo "</br>".$sql;
	$resultado = odbc_exec($conexion, $sql);
	if ($resultado == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}
}			

elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$observacion = $_POST['coment2'];

	echo "tercer if";
	
	$sql = "UPDATE agenda SET  tipoEvento = '$color', observacion= '$observacion' WHERE id = $id ";

	
	$resultado = odbc_exec($conexion, utf8_decode($sql));
	if ($resultado == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}
}

if (isset($_POST['finalizar'])){
	$id = $_POST['id'];
	$pagina = 'index.php?p=detalleEvento&id='.$id;
	header('Location: '.$pagina);
}else{
header('Location: index.php');
}
//header('Location: index.php');

	
?>
