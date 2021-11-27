
 <?php
 
        $cod = $_POST["cod"];
        $nom = $_POST['nom'];
        $color = $_POST['color']; 
       
        
            include('conexion.php');

            //Validando que el codigo ya existe
            if(busquedarepetida($cod,$conexion)==1){
           
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
            }else{
                
                    $sql=<<<FIN
                    insert into [tipoEvento]
                    ([tipoEvento]
                    ,[descripcion]
                    ,[color])
                    values
                    ('$cod','$nom','$color');
                    FIN;
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
                $sql= "select * from [tipoEvento] where [tipoEvento] = '$cod'";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
            
        //header('Location: index.php?p=mantenimientoestado');     
        header( "refresh:0.05;url=index.php?p=mantenimientoestado" );  
            

        
    
