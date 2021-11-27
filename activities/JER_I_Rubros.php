<?php

        $codinforme = $_POST["busqueda_id"];
        $rubro = $_POST["rubro"];
        $nivel = $_POST["nivel"];
        $orden = $_POST["orden"];
        $oper = $_POST["oper"];      
        
            include('conexion.php');
        
            //Validando que el codigo ya existe
            if(busquedarepetida($codinforme,$nivel,$orden,$conexion)==1){
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
           
            }else{
            
                $sql = "insert into JER_Rubros (JER_IdInf, NombreRubro, Nivel, OperacionR, OrdenR) values
                ($codinforme,'$rubro', $nivel, $oper , $orden)";
                
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
            function busquedarepetida($codinforme,$nivel,$orden,$conexion){
                $sql= "select * from JER_Rubros where JER_IdInf = $$codinforme and Nivel = $nivel and OrdenR = $orden";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
               
            
       header( "refresh:0.05;url=index.php?p=JER_FormRubros" ); 