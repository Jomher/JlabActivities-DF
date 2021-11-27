<?php
//$nlinea = !empty($_GET['id']) ? $_GET['id'] : '';
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
    include('conexion.php');
	$sql = "SELECT [tipoEvento] ,[descripcion],[color]
    FROM [tipoEvento] WHERE tipoEvento = '$nlinea'";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
//}
?>  </br>
    <div class="card card-block responsive nowrap">
    <div class="cabecera"><h4 align="center" >Actualización de datos de Estados</h4></div>
    <div class="contenido">
    <form class="contact" action="actuaestados.php" method='post'>
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="cod" name="cod" value="<?php echo utf8_encode($field->tipoEvento);?>">
            <br>
            <label for="i2">Nombre de estado</label>
            <input type="text" id="name" name="name" autocomplete="off" value="<?php echo utf8_encode($field->descripcion);?>">
            <br><br>
            <label for="i3">Color</label>
            <input type="color" id="color" name="color" value="<?php echo utf8_encode($field->color);?>">
            <br><br>
            <input class="btn btn-info btn-md" type="submit" value="ACTUALIZAR">
    </form>
    </div>
    </div>