<?php
 $_TEMP = array(); 
 $_TEMP["server"] = '192.168.0.200,1533'; //server de base de datos 
 $_TEMP["database"] = 'PHData_DF'; //$_SESSION["data"]; //nombre de la base de datos 
 $_TEMP["username"] = 'sa'; 
 $_TEMP["password"] = 'Milo0612'; 

$connection_string = 'DRIVER={SQL SERVER};SERVER='. $_TEMP["server"] . ';DATABASE=' . $_TEMP["database"]; 
$conexion = odbc_connect($connection_string, $_TEMP["username"], $_TEMP["password"]); 

unset( $connection_string ); //libera variables 
unset( $_TEMP ); 

//$pass= trim (md5($_REQUEST["pass"]));
?>