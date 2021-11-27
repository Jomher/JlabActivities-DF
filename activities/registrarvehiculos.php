<?php
        $cod = $_POST["cod"];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        
            include('conexion.php');
        
            //Validando que el codigo ya existe
            if(busquedarepetida($cod,$conexion)==1){
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
           
            }else{
                $sql=
                "insert into JA_Vehiculos
                (JA_CodVehi,JA_Marca,JA_Modelo,JA_Placa)
                values
                ('$cod','$marca','$modelo','$placa')";
                
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
                $sql= "select * from JA_Vehiculos where JA_CodVehi = '$cod'";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
               
            
        header( "refresh:0.05;url=index.php?p=Vehiculos" ); 