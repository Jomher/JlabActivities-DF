<?php
$codigocli = $_POST['busqueda_id'];//!empty($_POST['c1']) ? $_POST['c1'] : '';
$estado = $_POST['estado'];
$fini = str_replace("-","",$_POST['start']);
$ffin = str_replace("-","",$_POST['end']);
$observa = $_POST['observa'];
$Sucursal = $_POST['sucursal_id'];
$supervisor = $_POST['supervisor'];
$cuenta = $_POST['cuenta'];
$precio = $_POST['precio'];
$recibe = $_POST['recibe'];
$filas = $_POST['filas'];
$ja_idact = $_POST['ja_idact'];

//if($codigo&&$nombre&&$direccion&&$departamento&&$telefono&&$correo){
    include('conexion.php');
    $sql=
    "
    BEGIN TRANSACTION

	UPDATE LlavesMultiusuario 
	SET llaveFactura=1
	WHERE tipoFA = 'JA_ACT'


    insert into agenda 
    (cliente, tipoEvento, fecha, final, observacion, JA_IDSucursalCli, JA_Supervisor, JA_idctapago, JA_PrecioCiva, JA_Recibe)
    values
    ('$codigocli','$estado','$fini','$ffin','$observa', '$Sucursal','$supervisor','$cuenta','$precio', '$recibe' )


    declare @idActividad int = (SELECT SCOPE_IDENTITY())";
	//$resultado = odbc_exec($conexion, $sql); 


echo $sql;

$i=1;
while($i<= $filas){
	$ncodtrabajador="codtrabajador_".$i;
	$codtrabajador=$_REQUEST[$ncodtrabajador];
	$ncheck ="check_".$i;
	//$check = $_REQUEST[$ncheck];

	//echo "<br> cheque: ".$check;

	if (isset($_POST[$ncheck])){

	$sql= $sql." insert into JA_Trabajadores_Actividad (JA_idAgenda,JA_IDAct, JA_Codtrabajador)
	values(@idActividad,'$ja_idact','$codtrabajador')";
	
	echo "</br>".$sql;
	}
	//echo "</br>".$sql;

	$i=$i+1;
  	//header("Location: index.php?o=1");
}
	$sql = $sql. " UPDATE LlavesMultiusuario SET llaveFactura=0 WHERE tipoFA = 'JA_ACT' COMMIT";
	echo "</br>".$sql;


   if(!odbc_exec($conexion, utf8_decode($sql))){
        die('No se pudo agregar el registro');
//    }
}
header('Location: index.php');