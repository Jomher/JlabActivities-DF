<style type="text/css">
    #example{
        font-size: 13px;
    }

</style>


<?php

$nlinea = $_GET['id'];
$linea='';


?>

</br>
</br>
  <div class="row">
  <div class="col-lg-6 col-sm-12">
  <div class="card card-block responsive" id="card">
 		<div class="cabecera"><h4 align="center" >Archivos Actividad #<?php echo $_GET["id"]; ?> </h4></div>
    <div class="contenido">
          <form action="subirArchivo.php" method="post" enctype="multipart/form-data">  
          <input name="fichero[]" type="file" size="300" maxlength="300" class="btn btn-sm btn-info" multiple="on">  
          <br><br> Nombre: <input name="nombre" type="text" size="300" maxlength="300" > 
          <br><br> Descripcion: <input name="description" type="text" >
          <?php echo '<br><br><input name="idAgenda" type="text" hidden="true" size="100" maxlength="250" value='. $_GET['id'].' >'; ?> 
          <br><br> 
          <button name="submit" type="submit"  class="btn purple-gradient btn-md">SUBIR ARCHIVO</button>   
          </form>
  <br>
  
    </div>
  </div>
  </div>
  <div class="col-lg-6 col-sm-12">
  <div class="card card-block responsive">
  	<?php
  	$sql = "select * from archivos where idAgenda = $nlinea ";
    //echo $sql;
   include("conexion.php"); 
	$resultado = odbc_exec($conexion, $sql);
	//$field = odbc_fetch_object($resultado);

	$tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Archivo</th>
	        <th>Descripcion</th>
	        <th>Tipo</th>
          <th>Tamaño</th>
          <th>Eliminar</th>
	    </tr>
	</thead>
	<tbody>';

	while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    $tabla.="<td><a href='upload/".utf8_encode($field->ruta)."' >".utf8_encode($field->nombre)."</a></td>";
    $tabla.="<td>".utf8_encode($field->descripcion)."</td>";
    $tabla.="<td>".utf8_encode($field->tipo)."</td>";
    $tabla.="<td>".utf8_encode($field->size)."</td>";
    $tabla.="<td><a href='#' title='eliminar' onclick='confirmaDel(this.id)' id =$field->id ><i class='fa fa-trash'></i></a>";
    $tabla.='</tr>';
	}
	$tabla.='</tbody></table>';
	echo $tabla;
  	 ?>
  	
  </div>
  </div> 	

  <script>
        function confirmaDel(id){
            var cliente = id;
            r = confirm ("Desea Eliminar este archivo?");
            if (r){
                //alert(cliente);
                window.location.href = "eliminaArchivos.php?id="+cliente;
            }
        }
    </script>

</br>
</br>
</br>