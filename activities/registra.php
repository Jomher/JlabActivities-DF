<?php
$codigo = $_POST['c1'];//!empty($_POST['c1']) ? $_POST['c1'] : '';
$nombre = $_POST['c2'];//!empty($_POST['c2']) ? $_POST['c2'] : '';
$direccion = $_POST['c3']; //!empty($_POST['c3']) ? $_POST['c3'] : '';
$departamento = $_POST['c4'];
$contacto = $_POST['c5']; //!empty($_POST['c4']) ? $_POST['c4'] : '';
$telefono =$_POST['c6']; //!empty($_POST['c5']) ? $_POST['c5'] : '';
$correo = $_POST['c7'];//!empty($_POST['c6']) ? $_POST['c6'] : '';

//if($codigo&&$nombre&&$direccion&&$departamento&&$telefono&&$correo){
    include('conexion.php');
    $sql=<<<FIN
    insert into clientes
    (cliente,nombrecli,direcli,departamento,telecli,email,contacto)
    values
    ('$codigo','$nombre','$direccion','$departamento','$telefono','$correo','$contacto')
FIN;
	//$resultado = odbc_exec($conexion, $sql); 
echo $sql;
    if(!odbc_exec($conexion, utf8_decode($sql))){
        die('No se pudo agregar el registro');
//    }
}
header('Location: index.php?p=clientes');