<?php
require_once("conexion.php");
if (isset($_POST['submit'])) {   
    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
     
     
      // creamos las variables para subir a la db
        $ruta = "upload/"; 
        $nombrefinal= trim ('('.$_POST["idAgenda"].')'.$_FILES['fichero']['name']); //Eliminamos los espacios en blanco
        //$nombrefinal= ereg_replace (" ", "", $nombrefinal);//Sustituye una expresión regular
        $upload= $ruta . $nombrefinal;  
        $description  = $_POST["description"];
        $idAgenda = $_POST["idAgenda"];

        echo $_POST["description"];


        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 
                    
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
                    echo "Nombre: <i><a href=\"".$ruta . $nombrefinal."\">".$_FILES['fichero']['name']."</a></i><br>";  
                    echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                    echo "<br><hr><br>";  
                         

                   $nombre  = $_POST["nombre"]; 
                   
                   $tipo = $_FILES['fichero']['type'];
                   $tamaño = $_FILES['fichero']['size'];
                    


                   $sql = utf8_decode("insert into archivos (nombre,descripcion,ruta,tipo, size, idAgenda) values ('$nombre','$description','$nombrefinal','$tipo',$tamaño, $idAgenda)"); 
        echo $sql;

        if (odbc_exec($conexion, $sql)){
          echo "Archivo cargado correctamente";
          header("Location: index.php?p=detalleEvento&id=$idAgenda");
        }

        }  
    }  
 } 


/*$sql = "insert into archivos (nombre) values ('prueba')"; 
    echo $sql;
require_once("conexion.php");
$resultado = odbc_exec($conexion, $sql); */    
        
?> 