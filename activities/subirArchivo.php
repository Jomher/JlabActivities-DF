<?php
require_once("conexion.php");
if (isset($_POST['submit'])) {   
    //if(is_uploaded_file($_FILES['fichero']['name'])) { 
     
      //Funcion para remover numerales o caracteres  
      function remove_sp_chr($str)
      {
        $result = str_replace(array("#", "'"), '', $str);
        return $result;
      }

      // creamos las variables para subir a la db
        $ruta = "upload/"; 
        
        //$nombrefinal= ereg_replace (" ", "", $nombrefinal);//Sustituye una expresión regular
        
        $description  = $_POST["description"];
        $idAgenda = $_POST["idAgenda"];

        echo $_POST["description"];
        $i=0;
        
        while ( $i< count($_FILES['fichero']['name'])) {
        	
        	$nombrefinal= trim ('('.$_POST["idAgenda"].')'.$_FILES['fichero']['name'][$i]); //Eliminamos los espacios en blanco  
          $upload= $ruta . $nombrefinal;
          
          //Le pasamos la funcion de remover caracteres para quitarles numerales u otros caracteres no deseados al archivo que será guardado en la carpeta upload
          $uploadfinal = remove_sp_chr($upload);

        if(move_uploaded_file($_FILES['fichero']['tmp_name'][$i], $uploadfinal)) { //movemos el archivo a su ubicacion 
                    
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
                    echo "Nombre: <i><a href=\"".$ruta . $nombrefinal."\">".$_FILES['fichero']['name'][$i]."</a></i><br>";  
                    echo "Tipo MIME: <i>".$_FILES['fichero']['type'][$i]."</i><br>";  
                    echo "Peso: <i>".$_FILES['fichero']['size'][$i]." bytes</i><br>";  
                    echo "<br><hr><br>";  
                         

                   $nombre  = $_POST["nombre"].'('.$i.')'; 
                   $tipo = $_FILES['fichero']['type'][$i];
                   $tamaño = $_FILES['fichero']['size'][$i];
                    

                  
                   //Llamando funcion de remover caracteres para eliminar numeral u otro caracter a la ruta que será subida a la base de datos
                   $rutafinal = remove_sp_chr($nombrefinal);
                  
                   $sql = utf8_decode(" insert into archivos (nombre,descripcion,ruta,tipo, size, idAgenda) values ('$nombre','$description','$rutafinal','$tipo',$tamaño, $idAgenda)"); 
        echo $sql;

        if (odbc_exec($conexion, $sql)){
          echo "Archivo cargado correctamente";
          $i++; 
        }
        } 
      // } 
    }
    header("Location: index.php?p=archivos&id=$idAgenda");  
 } 


/*$sql = "insert into archivos (nombre) values ('prueba')"; 
    echo $sql;
require_once("conexion.php");
$resultado = odbc_exec($conexion, $sql); */    
        
?> 