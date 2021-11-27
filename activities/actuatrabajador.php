<?php

$cod = $_POST["cod"];
$nom = $_POST['nom'];
$ape = $_POST['apel']; 
$tel =$_POST['tel']; 
$estado = $_POST['estados'];
$nlinea =  !empty($_POST['nlinea']) ? $_POST['nlinea'] : '';

    include('conexion.php');
    if ($estado){
        // $sql=<<<FIN
        // UPDATE JA_Trabajadores set JA_Nombres='$nom',JA_Telef='$tel',JA_EstadoLab='$estado'
        // WHERE JA_CodTrabajador ='$nlinea'";

        $sql = "UPDATE JA_Trabajadores set JA_Nombres='$nom',JA_Apellidos='$ape',JA_Telef='$tel',JA_EstadoLab='$estado' WHERE JA_CodTrabajador ='$nlinea'";
	    //echo $sql;
	    //$resultado = odbc_exec($conexion, utf8_decode($sql));
        //echo "<script>
        //alert('Se ha agregado correctamente');
        //</script>";
      
    }else {
        $sql = "UPDATE JA_Trabajadores set JA_Nombres='$nom',JA_Apellidos='$ape',JA_Telef='$tel',JA_EstadoLab='$estado' WHERE JA_CodTrabajador ='$nlinea'";  
        //echo $sql;
        //$resultado = odbc_exec($conexion, utf8_decode($sql));
        //echo "<script>
        //       alert('Se ha agregado correctamente');
         //      </script>";
    }
    $resultado = odbc_exec($conexion, utf8_decode($sql));
    if($resultado){
        echo "<script>
               alert('Se ha agregado correctamente');
               </script>";
    }else{
        echo "<script>
        alert('No se ha agregado correctamente');
        </script>";
    }
	


header( "refresh:0.05;url=index.php?p=listadotrabajador" );  
//echo $sql;