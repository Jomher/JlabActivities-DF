<?php
        $cod = $_POST["cod"];
        $informe = $_POST["informe"];
        
        
            include('conexion.php');
        
            //Validando que el codigo ya existe
            if(busquedarepetida($cod,$conexion)==1){
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
           
            }else{
            
                $sql = "insert into JER_Informes (CodigoInforme,Informe) values ('$cod','$informe')";    
                $resultado = odbc_exec($conexion, utf8_decode($sql));
              
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
                $sql= "select * from JER_Informes where CodigoInforme = '$cod'";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
            
       header( "refresh:0.05;url=index.php?p=JER_FormInforme" ); 