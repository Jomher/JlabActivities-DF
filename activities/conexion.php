<?php

//header("Content-Type: text/html;charset=utf-8");
//session_start();

 $_TEMP = array(); 
 $_TEMP["server"] = '192.168.0.200,1533'; //server de base de datos 
 $_TEMP["database"] = 'PHData_DF'; //$_SESSION["data"]; //nombre de la base de datos 
 $_TEMP["username"] = 'sa'; 
 $_TEMP["password"] = 'Milo0612'; 

$connection_string = 'DRIVER={SQL SERVER};SERVER='. $_TEMP["server"] . ';DATABASE=' . $_TEMP["database"]; 
$conexion = odbc_connect($connection_string, $_TEMP["username"], $_TEMP["password"]); 


 unset( $connection_string ); //libera variables 
 unset( $_TEMP ); 

// $serverName = "DESKTOP-C4899LQ"; //serverName\instanceName
// $connectionInfo = array( "Database"=>"phpruebas", "UID"=>"sa", "PWD"=>"123456");
// $conexion = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conexion ) {
//      echo "Conexión establecida.<br />";
// }else{
//      echo "Conexión no se pudo establecer.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }
?>



