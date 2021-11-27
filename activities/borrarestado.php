<?php
//$id = !empty($_GET['id']) ? $_GET['id'] : "";
$id = $_GET['id'];
if($id){
    include('conexion.php');
    $sql = "delete from tipoEvento where tipoEvento='$id'";
    //echo $sql;
    if(odbc_exec($conexion, $sql)){
            echo "<script>
            alert('Se ha eliminado correctamente');
            </script>";      
    }else{
        echo "<script>
        alert('No se ha eliminado correctamente');
        </script>";
    }
}
header("refresh:0.05;url=index.php?p=listadoestados");
?>