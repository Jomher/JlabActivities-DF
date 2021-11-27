<?php
//$id = !empty($_GET['id']) ? $_GET['id'] : "";
$id = $_GET['id'];
//if($id){
    include('conexion.php');
    //$sql = "delete from JA_Vehiculos where JA_CodVehi='$id' and JA_CodVehi not in 
    //(select JA_CodVehi from [JA_Vehiculos_Actividad])";
    //echo $sql;
    //$sql = "select JA_CodVehi from [JA_Vehiculos_Actividad]";
    //if(odbc_exec($conexion, $sql)){
        //$sql2 = "select JA_CodVehi from JA_Vehiculos where JA_CodVehi='$id'";
        //if(odbc_exec($conexion, $sql2) != null){
         //   echo "<script>
            //alert('El usuario esta seleccionado en una actividad');
           //</script>";
    //}else {
      //  $sql2 = "delete from JA_Vehiculos where JA_CodVehi='$id' and JA_CodVehi not in (select JA_CodVehi from [JA_Vehiculos_Actividad])";
        //if(odbc_exec($conexion, $sql2)){
          //  echo "<script>
            //alert('Se ha eliminado correctamente');
            //</script>";
        //}else {
          //  echo "<script>
           // alert('No Se ha eliminado correctamente');
            //</script>";
        //}
            
    //}

    //Validando que el codigo ya existe
    if(busquedarepetida($id,$conexion)==1){
        echo "<script>
        alert('No se puede eliminar, el vehiculo seleccionado se encuentra en una actividad');
        </script>";
   
    }else{
        $sql=
        "delete from JA_Vehiculos where JA_CodVehi='$id' and JA_CodVehi not in (select JA_CodVehi from [JA_Vehiculos_Actividad])";
        
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
        $sql= "select * from JA_Vehiculos_Actividad where JA_CodVehi = '$id'";
        $resultado = odbc_exec($conexion, $sql);
        if(odbc_num_rows($resultado)>0){
            return 1;
        }else{
            return 0;
        }
    }


header("refresh:0.05;url=index.php?p=listadovehiculos");
?>