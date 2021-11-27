<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 

$pass= trim (md5($_REQUEST["pass"]));


require_once("conexion_config.php");
$sql="select usuarios.* from usuarios where usuario = '".$_REQUEST["user"]."' and claveweb ='".$pass."'"; 

//echo "<script> alert ($pass)";
$usuario = "";
echo $_REQUEST["user"]." ".$_REQUEST["pass"];
$resultado = odbc_exec($conexion, $sql); 
if ($field = odbc_fetch_object($resultado)){
	echo "<td>". utf8_encode ($field->usuario). "</td>";
	session_start();
	$_SESSION["user"]= utf8_encode ($field->usuario);
	$usuario = utf8_encode ($field->usuario);
	$_SESSION["pass"]= utf8_encode ($field->claveweb);	
	header("Location: index.php");	
}
else {
header("Location: index.html");
}
?>

</body>
</html>