<?php
        $cod = $_POST["codsuc"];
        $nombresuc = $_POST['nombresuc'];
        $cliente = $_POST['busqueda_id'];
        $direccion = $_POST['direc'];
        $telefono = $_POST['tel'];
        $contacto = $_POST['percont'];
        
        
$nlinea =  !empty($_POST['nlinea']) ? $_POST['nlinea'] : '';

    include('conexion.php');

    $sql = "UPDATE sucurCliente set cod_suc='$cod',nombre='$nombresuc',cliente='$cliente',direccion='$direccion', num_telefono ='$telefono', cuentacontable = '$contacto' 
	WHERE cod_suc='$nlinea'";
	         
    $resultado = odbc_exec($conexion, utf8_decode($sql));
    if($resultado){
        echo "<script>
               alert('Se ha actualizado correctamente');
               </script>";
    }else{
        echo "<script>
        alert('No se ha actualizado correctamente');
        </script>";
    }
	


header( "refresh:0.05;url=index.php?p=listadosucursales" ); 