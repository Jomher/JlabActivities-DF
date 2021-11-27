
<style type="text/css">
    #example{
        font-size: 12px;
    }
    #example2{
        font-size: 12px;
    }

</style>

<?php
$nlinea = $_GET['id'];
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
//if(!empty($nlinea)){
echo"</br>";
    include('conexion.php');
    
    $sql = <<<FIN
    select a.id, a.JA_IDACT , fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion as estado,
a.fecha as inicial, a.final, a.JA_IDSucursalCli as codsuc, d.nombre as nombresuc, a.JA_Supervisor as supervisor,
a.JA_PrecioCiva as precioiva, a.JA_Recibe as recibe, a.JA_idctapago, e.JA_NombreCuenta as cuenta 
from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento 
inner join clientes c on c.cliente = a.cliente 
left outer join sucurCliente as d on a.cliente = d.cliente and a.JA_IDSucursalCli = d.cod_suc 
inner join JA_CuentasDePago AS e on a.JA_idctapago = e.JA_idctapago 
where a.id = '$nlinea'
FIN;

    //$sql = utf8_encode("select a.id, fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion, a.fecha, a.final from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente where a.id = '$nlinea'");
    //echo $sql;
    require_once("conexion.php");
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
?>


<!--?php
    include('conexion.php');
    $sql=<<<FIN
    select max(id) + 1 as codigo from agenda
FIN;
    $resultado = odbc_exec($conexion, $sql);
    $field = odbc_fetch_object($resultado); 
    if(!odbc_exec($conexion, $sql)){
        die('No se pudo agregar el registro');  }
?-->

  </br>

  <form action="Jlab_U_detalleActividad.php?id=".$nlinea method='post'>
  <div class="row">
  <div class="col-lg-6 col-sm-12">
  <div class="card card-block responsive" id="card">
 		<div class="cabecera"><h4 align="center" >Detalle de la Actividad </h4></div>    <!--?php echo $field->id ?-->
 <div class="contenido">

<!--ID ACTIVIDAD -->
        
            <div class="md-form mt-3">
            <label for="id">Actividad numero </label>	
            <input type="text" class="form-control" id="id" name="id"
            placeholder="ID Actividad" value="<?php echo utf8_encode($field->id);?>"  required="true" readonly="true">   
            </div>            

<!-- Identificador de Waltmart-->
            <div class="md-form mt-3">
            <label for="ja_idact">ID / Numero de recepcion </label>	
            <input type="text" id="ja_idact" name="ja_idact" autocomplete="off" class= "col-sm-10" 
            value="<?php echo utf8_encode($field->JA_IDACT);?>">  
        	</div>


<!-- CLIENTE / Codigo y nombre de cliente-->
<div class="container">
  <div class="row">
      <div class="form-group two-fields">
        <label for="i3">Cliente</label>
        <div class="input-group">
            <input type="text" class="form-control col-sm-3" id="busqueda_id" name="busqueda_id" 
            placeholder="Codigo" required="true" readonly="true" value="<?php echo utf8_encode($field->cliente);?>">
            &nbsp; &nbsp; 
            <input type="text" name="busqueda" class="form-control col-sm-9" id="busqueda" 
            placeholder="Buscar Cliente" autocomplete="off" value="<?php echo utf8_encode($field->nombrecliente);?>">
            
        </div> 
    </div>
    <br>
    <div id="resultados" ></div>
  </div>
</div>

<!-- Sucursal -->
<div class="container">
  <div class="row">
      <div class="form-group two-fields">
        <div class="input-group">
            <input type="text" class="form-control col-sm-3" id="sucursal_id" name="sucursal_id" 
            placeholder="Codigo" required="true" readonly="true" value="<?php echo utf8_encode($field->codsuc);?>">
            &nbsp; &nbsp; 
            <input type="text" name="sucursal" class="form-control col-sm-9" id="sucursal"
            placeholder="Tienda o Sucursal" autocomplete="off" value="<?php echo utf8_encode($field->nombresuc);?>">
        </div> 
    </div>
    <br>
    <div id="resultados2" ></div>
  </div>
</div>

<!-- FECHAS (INICIAL Y FINAL)--> 
<br>
          <div class="form-group">
          <label for="start" class="col-sm-10 control-label">Fecha Inicial</label>
          <div class="col-sm-10">
          <input type="datetime-local" name="start" class="form-control" id="start" required 
          value="<?php echo str_replace(" ","T",$field->inicial) ;?>" >
          </div>
      	  </div>
          <div class="form-group">
          <label for="end" class="col-sm-10 control-label">Fecha Final</label>
          <div class="col-sm-10">
            <input type="datetime-local" name="end" class="form-control" id="end" required
            value="<?php echo str_replace(" ","T",$field->final) ;?>" > 
          </div>
          </div>
         <br>

<?php
$sql = <<<FIN
    select a.id, fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion as estado,b.tipoEvento, a.fecha as inicial, a.final, a.JA_IDSucursalCli as codsuc, d.nombre as nombresuc, a.JA_Supervisor, a.JA_PrecioCiva as precioiva, a.JA_Recibe as recibe, a.JA_idctapago, e.JA_NombreCuenta as cuenta from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente left outer join sucurCliente as d on a.cliente = d.cliente and a.JA_IDSucursalCli = d.cod_suc inner join JA_CuentasDePago AS e on a.JA_idctapago = e.JA_idctapago where a.id = '$nlinea'
FIN;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
?>
        
<!-- ESTADO DE LA ACTIVIDAD-->    
      <div class="form-group">
        <label for="color" class="col-sm-10 control-label">Estado</label>
          <div class="col-sm-10">
            <select name="estado" class="form-control" id="estado" >
            <option style="color: <?php echo utf8_encode($field->color);?>" value="<?php echo utf8_encode($field->tipoEvento);?>" selected>&#9724;<?php echo utf8_encode($field->estado);?></option>;
              <?php
                  $sql= "select tipoEvento, color, descripcion from tipoEvento ORDER BY tipoEvento";
                  //require_once("conexion.php");
                  $resultado = odbc_exec($conexion, $sql); 
                  while ($field = odbc_fetch_object($resultado)){
                    echo '<option style="color:'.$field->color.'" value="'.$field->tipoEvento.'">&#9724; '.$field->descripcion.'</option>';
                  }
              ?>
            </select>
          </div>
      </div>   
            
      <?php
$sql = <<<FIN
    select a.id, fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion as estado,b.tipoEvento, a.fecha as inicial, a.final, a.JA_IDSucursalCli as codsuc, d.nombre as nombresuc, a.JA_Supervisor, a.JA_PrecioCiva as precioiva, a.JA_Recibe as recibe, a.JA_idctapago, e.JA_NombreCuenta as cuenta from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente left outer join sucurCliente as d on a.cliente = d.cliente and a.JA_IDSucursalCli = d.cod_suc inner join JA_CuentasDePago AS e on a.JA_idctapago = e.JA_idctapago where a.id = '$nlinea'
FIN;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
?>
    
<!-- SUPERVISOR-->

      <div class="form-group">
        <label for="color" class="col-sm-10 control-label">Supervisor</label>
          <div class="col-sm-10">
            <select name="supervisor" class="form-control" id="supervisor" >
              <!--option value="">Seleccione</option-->
              <option value="<?php echo utf8_encode($field->JA_Supervisor);?>"><?php echo utf8_encode($field->JA_Supervisor);?> </option>
              <?php
                  $sql= "select nombre from Clientes_contactos";
                  //require_once("conexion.php");
                  $resultado = odbc_exec($conexion, $sql); 
                  while ($field = odbc_fetch_object($resultado)){               
                  echo '<option value="'.$field->nombre.'"> '.$field->nombre.'</option>';
                  }
              ?>
            </select>
          </div>
      </div>

      <?php
$sql = <<<FIN
    select a.id, fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion as estado,b.tipoEvento, a.fecha as inicial, a.final, a.JA_IDSucursalCli as codsuc, d.nombre as nombresuc, a.JA_Supervisor, a.JA_PrecioCiva as precioiva, a.JA_Recibe as recibe, a.JA_idctapago, e.JA_NombreCuenta as cuenta from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente left outer join sucurCliente as d on a.cliente = d.cliente and a.JA_IDSucursalCli = d.cod_suc inner join JA_CuentasDePago AS e on a.JA_idctapago = e.JA_idctapago where a.id = '$nlinea'
FIN;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
?>
    

 <!-- CUENTA DE PAGO-->

 <div class="form-group">
        <label for="color" class="col-sm-10 control-label">Cuenta de Pago</label>
          <div class="col-sm-10">
            <select name="idcuenta" class="form-control" id="idcuenta">
              <!--option value="">Seleccione</option-->
              <option value="<?php echo utf8_encode($field->JA_idctapago);?>" selected><?php echo utf8_encode($field->cuenta);?></option>;
              <?php
                  $sql= "select JA_idctapago, JA_NombreCuenta from JA_CuentasDePago";
                 // require_once("conexion.php");
                  $resultado = odbc_exec($conexion, $sql); 
                  while ($field = odbc_fetch_object($resultado)){  
                  echo '<option  value="'.$field->JA_idctapago.'" > '.$field->JA_NombreCuenta.'</option>';
                  }
              ?>
            </select>
          </div>
      </div>

<?php
$sql = <<<FIN
    select a.id, a.JA_IDACT, fecha, a.cliente, nombrecli as nombrecliente, a.observacion, color, b.descripcion as estado,b.tipoEvento, a.fecha as inicial, a.final, a.JA_IDSucursalCli as codsuc, d.nombre as nombresuc, a.JA_Supervisor, a.JA_PrecioCiva as precioiva, a.JA_Recibe as recibe, a.JA_idctapago, e.JA_NombreCuenta as cuenta from agenda a inner join tipoEvento b on a.tipoEvento =  b.tipoEvento inner join clientes c on c.cliente = a.cliente left outer join sucurCliente as d on a.cliente = d.cliente and a.JA_IDSucursalCli = d.cod_suc inner join JA_CuentasDePago AS e on a.JA_idctapago = e.JA_idctapago where a.id = '$nlinea'
FIN;
	$resultado = odbc_exec($conexion, $sql);
	$field = odbc_fetch_object($resultado);
?>
<!-- OBSERVACIONES O DETALLE DE LA ACTIVIDAD -->      

            <div class="md-form mt-3">
            <label for="observa">Detalle de la Actividad</label>
            <input type="text" id="observa" name="observa" autocomplete="off" value="<?php echo utf8_encode($field->observacion);?>">
        	</div>
            

<!-- PRECIO (con iva)-->            
            <div class="md-form mt-3">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" autocomplete="off" step="any" required="true" value="<?php echo utf8_encode($field->precioiva);?>">
            </div>

<!-- Quien recibe--> 
            <div class="md-form mt-3">
            <label for="recibe">Recibe</label>
            <input type="text" id="recibe" name="recibe" autocomplete="off" value="<?php echo utf8_encode($field->recibe);?>">
            </div>

  </br>

    
  </div>
  </div>
  </div>


 <!--trabajadores-->
 <div class="col-lg-6 col-sm-12">
  <div class="card card-block responsive">
  	<div class="cabecera"><h5 align="center" >Selecciona equipo de trabajo</h5></div>
    <?php
    
    $sql = "select *, (select 1 from JA_Trabajadores_Actividad where JA_CodTrabajador = a.JA_CodTrabajador and JA_idAgenda = $nlinea  ) AS EnAct
            from JA_Trabajadores as a ";

    //$sql = "select * from JA_trabajadores where JA_EstadoLab = 1 ";
    //echo $sql;
  $resultado = odbc_exec($conexion, $sql);
  //$field = odbc_fetch_object($resultado);

  $tabla ='<table id="example" class="display responsive wrap" cellspacing="0" width="100%">
  <thead>
      <tr>
          <th>Codigo</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Seleccionar</th>
      </tr>
  </thead>
  <tbody>';
  
  $i=1;
  while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    $tabla.="<td><input type='hidden' value='".utf8_encode($field->JA_CodTrabajador)."' id='codtrabajador_$i' name='codtrabajador_$i'>
            <a href='#'>".utf8_encode($field->JA_CodTrabajador)."</a></td>";
    $tabla.="<td>".utf8_encode($field->JA_Nombres)."</td>";
    $tabla.="<td>".utf8_encode($field->JA_Apellidos)."</td>";  
    
    
    $EnAct="";
    if (utf8_encode($field->EnAct) == 1){$EnAct="checked";}
    else {$EnAct="unchecked";}
   
    $tabla.="<td> <input type='Checkbox' id='check_$i' name='check_$i' $EnAct ></td>";
    $tabla.='</tr>';
    $i=$i+1;
  }
  $tabla.='</tbody></table>';
  echo $tabla;
  $i=$i-1;
  echo"<input type='hidden' id='filas' name='filas' value='$i'>";
     ?>
    
  </div>
  <br>

  <div class="card card-block responsive">
  	<div class="cabecera"><h5 align="center" >Selecciona vehiculos</h5></div>
    <?php
    
    $sql = "
    SELECT *, (select 1 from JA_Vehiculos_Actividad where JA_CodVehi = a.JA_CodVehi and JA_act = $nlinea ) AS EnAct2
    FROM JA_Vehiculos as a";
    //$sql = "SELECT id, JA_CodVehi, JA_Marca, JA_Modelo, JA_Placa FROM JA_Vehiculos ";
    //echo $sql;
  $resultado = odbc_exec($conexion, $sql);
  //$field = odbc_fetch_object($resultado);

  $tabla ='<table id="example2" class="display responsive wrap" cellspacing="0" width="100%">
  <thead>
      <tr>
          <th>Codigo</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Placa</th>
          <th>Seleccionar</th>
      </tr>
  </thead>
  <tbody>';

  $i=1;
  while($field = odbc_fetch_object($resultado)){
    $tabla.='<tr>';
    $tabla.="<td><input type='hidden' value='".utf8_encode($field->JA_CodVehi)."' id='codvehiculo_$i' name='codvehiculo_$i'>
            <a href='#'>".utf8_encode($field->JA_CodVehi)."</a></td>";
    $tabla.="<td>".utf8_encode($field->JA_Marca)."</td>";
    $tabla.="<td>".utf8_encode($field->JA_Modelo)."</td>";
    $tabla.="<td>".utf8_encode($field->JA_Placa)."</td>";
    
    $EnAct2="";
    if (utf8_encode($field->EnAct2) == 1){$EnAct2="checked";}
    else {$EnAct2="unchecked";}

    $tabla.="<td> <input type='Checkbox' id='checkVehiculo_$i' name='checkVehiculo_$i' $EnAct2> </td>";
    $tabla.='</tr>';
    $i=$i+1;
  }
  $tabla.='</tbody></table>';
  echo $tabla;
  $i=$i-1;
  echo"<input type='hidden' id='filas2' name='filas2' value='$i'>";
     ?>

  <!-- Boton Submit-->
  <br>
		  <button type="submit" class="btn purple-gradient btn-block btn-md"  >guardar</button>        
    
  </div>
  </div>


  <script>

// FUNCION DE BUSQUEDA DE CLIENTE ----------------------------------------------------------------

  $("#busqueda").keyup(function(){
      var query = "select top(8) cliente as idbusqueda, nombrecli as descripbusqueda from clientes where nombrecli like'%"+$(this).val()+"%'";
      var funcion = "agregar";
      if(query !='' && query.length >=3){
        //alert("esta es la consulta es: "+query);
        $.ajax({
          url: "buscar.php",
          method: "POST",
          data:{query:query,
                funcion:funcion},
          success: function(data){
            $("#resultados").fadeIn();
            $("#resultados").html(data);

          }
        });
      }
      else{
      } 
    });



    $(document).on('click','a', function(){
      /*var descrip = $(this).text().replace($(this).attr('id')+' ','');*/
      //$("#busqueda").val($(this).text());
/* 	if (isNaN(descrip)){
     $("#busqueda").val(descrip);
	}*/

      $("#resultados").fadeOut();
    });


    function agregar(id, texto){
        $("#busqueda_id").val(id);
        var descrip = document.getElementById(id).value;
        var descrip2 = texto.replace(id+' ','')
        $("#busqueda").val(descrip2);

        //alert("el id es: "+id +" el texto es: "+texto)
        }


// FUNCION DE BUSQUEDA DE SUCURSAL ----------------------------------------------------------------    

$("#sucursal").keyup(function(){
     
      var query = "select cod_suc as idbusqueda,  nombre as descripbusqueda from sucurCliente where nombre like '%"+$(this).val()+"%' and cliente = '"+$("#busqueda_id").val()+"'";
      var funcion = "agregar_suc";
      if(query !='' && query.length >=3){
        //alert("esta es la consulta es: "+query);
        $.ajax({
          url: "buscar.php",
          method: "POST",
          data:{query:query, funcion:funcion},
          success: function(data){
            $("#resultados2").fadeIn();
            $("#resultados2").html(data);

          }
        });
      }
      else{
      } 
    });

    $(document).on('click','a', function(){
    $("#resultados2").fadeOut();
    });

    function agregar_suc(id, texto){
        $("#sucursal_id").val(id);
        var descrip = document.getElementById(id).value;
        var descrip2 = texto.replace(id+' ','')
        $("#sucursal").val(descrip2);

        //alert("el id es: "+id +" el texto es: "+texto)
        }



    </script>

  </form>

</br>
</br>
</br>