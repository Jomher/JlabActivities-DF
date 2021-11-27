<?php
//$nlinea = !empty($_GET['id']) ? $_GET['id'] : '';
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
    include('conexion.php');
	$sql = "SELECT [JA_CodVehi] ,[JA_Marca],[JA_Modelo],[JA_Placa] 
    FROM [JA_Vehiculos] WHERE JA_CodVehi = '$nlinea'";
    //echo $sql;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
//}
?>  </br>
    <div class="card card-block responsive nowrap">
    <div class="cabecera"><h4 align="center" >Actualización de datos de Vehiculos</h4></div>
    <div class="contenido">
    <form class="contact" action="actuavehi.php" method='post'>
            <input type="hidden" name="nlinea" value="<?php echo $nlinea;?>">
            <label for="i1">Código</label>
            <input readonly="true" type="text" id="cod" name="cod" value="<?php echo utf8_encode($field->JA_CodVehi);?>">
            <br>
            <label for="i2">Marca del Vehiculo</label>
            <input type="text" id="marca" name="marca" autocomplete="off" value="<?php echo utf8_encode($field->JA_Marca);?>">
            <br>
            <label for="i3">Modelo del Vehiculo</label>
            <input type="text" id="modelo" name="modelo" value="<?php echo utf8_encode($field->JA_Modelo);?>">
            <br>
            <label for="i4">Placa del Vehiculo</label>
            <input type="text" id="placa" name="placa" value="<?php echo utf8_encode($field->JA_Placa);?>">
            <br><br>
            <input class="btn btn-info btn-md" type="submit" value="ACTUALIZAR">
    </form>
    </div>
    </div>