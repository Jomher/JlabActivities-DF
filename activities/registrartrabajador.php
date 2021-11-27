
 <?php
        $cod = $_POST["cod"];
        $nom = $_POST['nom'];
        $ape = $_POST['apel']; 
        $tel =$_POST['tel']; 
        $estado = $_POST['estados'];
        //$inactivo = $_POST['desac'];
        
            include('conexion.php');
        
            //Validando que el codigo ya existe
            if(busquedarepetida($cod,$conexion)==1){
                echo "<script>
                alert('Código existente, Ingrese otro código por favor');
                </script>";
           
            }else{
                if ($estado){
                    $sql=
                    "insert into JA_Trabajadores
                    (JA_CodTrabajador,JA_Nombres,JA_Apellidos,JA_Telef,JA_EstadoLab)
                    values
                    ('$cod','$nom','$ape','$tel', $estado)";
                    
                }else {
                    $sql="insert into JA_Trabajadores
                    (JA_CodTrabajador,JA_Nombres,JA_Apellidos,JA_Telef,JA_EstadoLab)
                    values
                    ('$cod','$nom','$ape','$tel', $estado)";                  
                }
                
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
                $sql= "select * from JA_Trabajadores where JA_CodTrabajador = '$cod'";
                $resultado = odbc_exec($conexion, $sql);
                if(odbc_num_rows($resultado)>0){
                    return 1;
                }else{
                    return 0;
                }
            }
               
            
        header( "refresh:0.05;url=index.php?p=trabajador" ); 
        //header('Location: index.php?p=trabajador');
    
