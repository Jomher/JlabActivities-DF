<?php

$cliente = !empty($_POST['c1']) ? $_POST['c1'] : '';
$nombre = !empty($_POST['c2']) ? $_POST['c2'] : '';
$direccion = !empty($_POST['c3']) ? $_POST['c3'] : '';
$departamento = !empty($_POST['c4']) ? $_POST['c4'] : '';
$contacto = !empty($_POST['c5']) ? $_POST['c5'] : '';
$telefono = !empty($_POST['c6']) ? $_POST['c6'] : '';
$correo = !empty($_POST['c7']) ? $_POST['c7'] : '';
$nlinea =  !empty($_POST['nlinea']) ? $_POST['nlinea'] : '';
//if($cliente&&$nombre&&$direccion&&$departamento){
	include('conexion.php');
	$sql = "UPDATE clientes set cliente='$cliente',nombrecli='$nombre',direcli='$direccion',email='$correo', departamento='$departamento', telecli ='$telefono', contacto = '$contacto' 
	WHERE cliente='$nlinea'";
	echo $sql;
	$resultado = odbc_exec($conexion, utf8_decode($sql));

//}
header('Location: index.php?p=clientes');
//echo $sql;