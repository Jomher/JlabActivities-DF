<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prueba </title>

<script src='https://code.jquery.com/jquery-1.12.4.js'></script>

</head>

<body>
	Ejemplo  <input id="lan">
	codigo
	<input id="lan_id">
	<div id="resultados">
		<ul>
			<li>ashdkjsdks</li>
			<li>dllddldlldld</li>
			<li>smmmm</li>
			<li>assssss</li>
		</ul>	
	</div> 
<script>
	$(document).ready(function(){
		$("#lan").keyup(function(){
			var query = $(this).val();
			if(query !=''){
				//alert("esta es la consulta es: "+query);
				$.ajax({
					url: "buscar.php",
					method: "POST",
					data:{query:query},
					success: function(data){
						$("#resultados").fadeIn();
						$("#resultados").html(data);

					}
				});
			}
			else{

			}	
		})
	})
</script>
</body>
</html>