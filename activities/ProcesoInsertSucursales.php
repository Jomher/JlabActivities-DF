<?php
        $cod = $_POST["codsuc"];
        $nombresuc = $_POST['nombresuc'];
        $cliente = $_POST['busqueda_id'];
        $direccion = $_POST['direc'];
        $telefono = $_POST['tel'];
        $contacto = $_POST['percont'];
        
            include('conexion.php');
        
            //Validando que el codigo ya existe
            if(busquedarepetida($cod,$conexion)==1){
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
           
            }else{
                $sql=
                "insert into [sucurCliente]
                ([cod_suc] ,[nombre] ,[cliente],[direccion],[num_telefono],[cuentacontable])
                values
                ('$cod','$nombresuc','$cliente','$direccion','$telefono','$contacto')";
                
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
                $sql= "select * from sucurCliente where cod_suc = '$cod'";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
               
            
        header( "refresh:0.05;url=index.php?p=JLAB_FrmSucursales" ); 