<?php
        $cod = $_POST["cod"];
        $nombrecl = $_POST['nombrecl'];
        $direccion = $_POST['direc'];
        $departamento = $_POST['dep'];
        $contacto = $_POST['percont'];
        $telefono = $_POST['tel'];
        $correo = $_POST['correo'];
        
            include('conexion.php');
        
            //Validando que el codigo ya existe
            if(busquedarepetida($cod,$conexion)==1){
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
           
            }else{
                $sql=
                "insert into clientes
                (cliente,nombrecli,direcli,departamento,telecli,email,contacto)
                values
                ('$cod','$nombrecl','$direccion','$departamento','$telefono','$correo','$contacto')";
                
                $resultado = odbc_exec($conexion, $sql);
                if($resultado){ 
    
                    echo "<script>
                    alert('Se ha agregado correctamente');
                    </script>";
                    }
                    else{
        
                   echo "<script>
                   alert('No se pudo agregar');
                   </script>";
    
                    }
                
            }
            
            //Funcion para verificar si hay un codigo existente
            function busquedarepetida($cod,$conexion){
                $sql= "select * from clientes where cliente = '$cod'";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
               
            
        header( "refresh:0.05;url=index.php?p=JLAB_FrmClientes" ); 