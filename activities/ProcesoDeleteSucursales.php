<?php
//$id = !empty($_GET['id']) ? $_GET['id'] : "";
$id = $_GET['id'];
//if($id){
    include('conexion.php');
    //Validando que el codigo ya existe
    if(busquedarepetida($id,$conexion)==1){
        echo "<script>
        alert('No se puede eliminar, el cliente seleccionado se encuentra en una actividad');
        </script>";
   
    }else{
        $sql=
        "delete from [sucurCliente] where cod_suc='$id' and [JA_IDSucursalCli] not in (select [JA_IDSucursalCli] from [Agenda])";
        
        $resultado = odbc_exec($conexion, $sql);
        if($resultado){ 

            echo "<script>
            alert('Se ha eliminado correctamente');
            </script>";
            }
            else{

           echo "<script>
           alert('No se ha elimado correctamente');
           </script>";

            }
        
    }
    
    //Funcion para verificar si hay un codigo existente
    function busquedarepetida($id,$conexion){
        $sql= "select [JA_IDSucursalCli] from [Agenda] where JA_IDSucursalCli = '$id'";
        $resultado = odbc_exec($conexion, $sql);
        if(odbc_num_rows($resultado)>0){
            return 1;
        }else{
            return 0;
        }
    }

//}
header("refresh:0.05;url=index.php?p=listadosucursales");
?>