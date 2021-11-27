<?php
//$id = !empty($_GET['id']) ? $_GET['id'] : "";
$id = $_GET['id'];
// if($id){
    include('conexion.php');
//     $sql = "delete from JA_Trabajadores where JA_CodTrabajador='$id' and JA_CodTrabajador not in 
//     (select JA_Codtrabajador from JA_Trabajadores_Actividad)";
//     //echo $sql;
//     if(odbc_exec($conexion, $sql)){
//         $sql2 = "select JA_CodTrabajador from JA_Trabajadores where JA_CodTrabajador='$id'";
//         if(odbc_exec($conexion, $sql2) != null){
//             echo "<script>
//             alert('No se ha eliminado porque ya esta asignado en una actividad');
//             </script>";
//         } else {
//             echo "<script>
//             alert('Se ha eliminado correctamente');
//             </script>";
//         }
            
//     }else{
//         echo "<script>
//         alert('No se ha eliminado correctamente');
//         </script>";
//     }
// }

//Validando que el codigo ya existe
if(busquedarepetida($id,$conexion)==1){
    echo "<script>
    alert('No se puede eliminar, el trabajador seleccionado se encuentra en una actividad');
    </script>";

}else{
    $sql=
    "delete from JA_Trabajadores where JA_CodTrabajador='$id' and JA_CodTrabajador not in (select JA_Codtrabajador from JA_Trabajadores_Actividad)";
    
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
    $sql= "select * from JA_Trabajadores_Actividad where JA_Codtrabajador = '$id'";
    $resultado = odbc_exec($conexion, $sql);
    if(odbc_num_rows($resultado)>0){
        return 1;
    }else{
        return 0;
    }
}

header("refresh:0.05;url=index.php?p=listadotrabajador");
?>