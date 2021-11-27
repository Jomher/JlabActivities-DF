<?php
        $cod = $_POST["cod"];
        $name = $_POST['name'];
        $color = $_POST['color'];
        
$nlinea =  !empty($_POST['nlinea']) ? $_POST['nlinea'] : '';

    include('conexion.php');

    $sql = "UPDATE tipoEvento set descripcion='$name',color='$color' WHERE tipoEvento ='$nlinea'";
	         
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
	


header( "refresh:0.05;url=index.php?p=listadoestados" ); 