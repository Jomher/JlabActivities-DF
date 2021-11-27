<style type="text/css">
    #example{
        font-size: 13px;
    }

</style>

<div class="modal fade" id="ModalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
      <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Subir Archivo</h4>
        </div>
      <div class="modal-body">	
      <form action="subirArchivo.php" method="post" enctype="multipart/form-data">  
      <input name="fichero[]" type="file" size="300" maxlength="300" class="btn btn-sm btn-info" multiple="on">  
      <br><br> Nombre: <input name="nombre" type="text" size="300" maxlength="300" > 
      <br><br> Descripcion: <input name="description" type="text" >
      <?php echo '<br><br><input name="idAgenda" type="text" hidden="true" size="100" maxlength="250" value='. $_GET['id'].' >'; ?>	
      <br><br> 
      <input name="submit" type="submit" value="SUBIR ARCHIVO" class="btn purple-gradient btn-md">   
      </form>
  </div>    
  </div>
  </div>
  </div>



<?php

$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
echo"</br>";
    include('conexion.php');
	$sql = utf8_encode("select a.id, fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion, a.fecha, a.final from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente where a.id = '$nlinea'");
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);

?>

</br>
  <div class="row">
  <div class="col-lg-6 col-sm-12">
  <div class="card card-block responsive" id="card">
 		<div class="cabecera"><h4 align="center" >Detalle de Evento</h4></div>
    <div class="contenido">
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="i1" name="c1" value="<?php echo utf8_encode($field->cliente);?>">
            <br>
            <label for="i2">Nombre</label>
            <input readonly="true" type="text" id="i2" name="c2" value="<?php echo utf8_encode($field->nombrecliente);?>">
            <br>
            <label for="i3">Observacion</label>
            <input readonly="true" type="text" id="i3" name="c3" value="<?php echo utf8_encode($field->observacion);?>">
            <br>
            <label for="i3">Tipo de Evento</label>
            <input readonly="true" type="text" id="i4" name="c4" value="<?php echo utf8_encode($field->descripcion);?>">
            <br>
            <label for="i3">Fecha Inicial</label>
            <input readonly="true" type="text" id="i5" name="c5" value="<?php echo date("d/m/Y", strtotime($field->fecha));?>">
            <br>
            <!--label for="i4">Fecha Final </label-->
            <input hidden="true" readonly="true" type="text" id="i6"  name="c6" value="<?php echo date("d/m/Y", strtotime($field->final));?>">
            <br>
            <div class="row"> 
            <a onClick="agregarArchivo()" href="#" class="btn purple-gradient btn-md">Agregar Archivo</a>
            </div>
  </br>
    <script>
      function agregarArchivo(){
        $('#ModalUpload').modal('show');
      }
    </script>
        </div>
  </div>
  </div>
  <div class="col-lg-6 col-sm-12">
  <div class="card card-block responsive">
  	<?php
  	$sql = "select * from archivos where idAgenda = $nlinea ";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	//$field = odbc_fetch_object($resultado);

	$tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Archivo</th>
	        <th>Descripcion</th>
	        <th>Tipo</th>
	        <th>Tamaño</th>
	    </tr>
	</thead>
	<tbody>';

	while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    $tabla.="<td><a href='upload/".utf8_encode($field->ruta)."' >".utf8_encode($field->nombre)."</a></td>";
    $tabla.="<td>".utf8_encode($field->descripcion)."</td>";
    $tabla.="<td>".utf8_encode($field->tipo)."</td>";
    $tabla.="<td>".utf8_encode($field->size)."</td>";
    $tabla.='</tr>';
	}
	$tabla.='</tbody></table>';
	echo $tabla;
  	 ?>
  	
  </div>
  </div> 	

</br>
</br>
</br>