<?php
        $cod = $_POST["cod"];
        $nombrecl = $_POST['nombrecl'];
        $direccion = $_POST['direc'];
        $departamento = $_POST['dep'];
        $contacto = $_POST['percont'];
        $telefono = $_POST['tel'];
        $correo = $_POST['correo'];
        
$nlinea =  !empty($_POST['nlinea']) ? $_POST['nlinea'] : '';

    include('conexion.php');

    $sql = "UPDATE clientes set cliente='$cod',nombrecli='$nombrecl',direcli='$direccion',email='$correo', departamento='$departamento', telecli ='$telefono', contacto = '$contacto' 
	WHERE cliente='$nlinea'";
	         
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
	


header( "refresh:0.05;url=index.php?p=listadoclientes" ); 