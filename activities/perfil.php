<script language="JavaScript" type="text/javascript">

function validar(){
	var pass2 = document.getElementById("pass2").value;
	var pass3 = document.getElementById("pass3").value;
	
	
	if (pass2!=pass3){
    //alert("son diferentes "+pass2+" "+pass3);
	document.getElementById("label").style.display = "block";
	}
	else if (pass2==pass3){
	//alert("son iguales "+pass2+" "+pass3);
	document.getElementById("label").style.display = "none";
	}
	}
</script>
            
  <div class="card responsive nowrap container-fluid" width="50%">
	<div class="card-header responsive nowrap">
    <br />

<form method="post" action="<?php echo "index.php?p=perfil"; //$_SERVER['PHP_SELF']; ?>">
	 
    
     <!--div class="form-group">
    <input type="password" name="pass1" class="form-control" placeholder="Contraseña Anterior"><br>
    </div-->
    
    <div class="form-group">
    <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Nueva Contraseña" required="required"><br>
	
     <div class="form-group has-danger" style="display:none" id="label">
	 <div class="form-control-feedback"><label for="pass1" >Contraseñas no coincide </label></div>
    </div> 
    
    <div class="form-group">
    <input type="password" name="pass3" id ="pass3"class="form-control" placeholder="Repetir Contraseña" onkeyup="validar()" required="required"><br>
    </div>
    <input type="submit" name="submit" value="Guardar Cambios" class="btn btn-primary" align="right" />
   
    <br>

</form>

<?php

$user=$_SESSION["user"];

if(isset($_POST['submit']))
{
	
$pass= md5($_POST["pass2"]); 	
require_once("conexion_config.php");

$sql="update usuarios set claveweb= '$pass'  where usuario = '$user'";	

$resultado = odbc_exec($conexion, $sql); 
if ($resultado){
echo '<div class="form-group has-success">
	 <div class="form-control-feedback"><label for="pass1" >Cambios realizados </label></div>
    </div> ';
}
else{
	echo "Error al aplicar los cambios";
	
	}
}

?>

 </div>
