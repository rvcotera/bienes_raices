
<?php
//funcion para convertir el formato  del precio a un valor numerico
function convertirFormato($valor){
  return str_replace(array("$", ","), "", $valor);
}


	if(!empty($_GET['parametro'])){ //controla el envio de parametros entre paginas si esta vacio no muestra algo
		$parametro = $_GET['parametro'];
		if($parametro == "rango"){
			$from = $_GET['from'];
			$to = $_GET['to'];
			$ciudad = $_GET['ciudad'];
			$tipo = $_GET['tipo'];
			$ciudad == "Elige una ciudad" ? $vciudad = 0: $vciudad = 1; //controla si elegieron algun estado
			$tipo == "Elige un tipo" ? $vtipo = 0: $vtipo = 1;	//controla si eligieron algun tipo
			
		}
		
		$url = 'data-1.json'; // archivo que tiene la informacion
		$data = file_get_contents($url); // poner el contenido del archivo en una variable
		$characters = json_decode($data); // decodifica el JSON
		
		switch($parametro){
        	case 'todos'://si el boton es mostrar todos
        	{
	           	//se obtienen todos los valores del archivo
				foreach ($characters as $character) {
			
?>
			        <div class="card-panel grey lighten-5 z-depth-1 card">
			          	<div class="row valign-wrapper" >
				            <div class="col s15">
				            	<img src="img/home.jpg" height="200" />             
				            </div>
				            <div class="col s20 m10" >
				                <strong>Direcci&oacute;n: &nbsp; </strong> <?php echo  $character->Direccion; ?><br />
				                <strong>Ciudad: &nbsp; </strong> <?php echo  $character->Ciudad; ?><br />
				                <strong>Telefono: &nbsp; </strong> <?php echo  $character->Telefono; ?>	<br />				
								<strong>Codigo Postal: &nbsp; </strong> <?php echo  $character->Codigo_Postal; ?><br />						
								<strong>Tipo: &nbsp; </strong> <?php echo  $character->Tipo; ?>	<br />							
								<strong>Precio: &nbsp; </strong><span class="precioTexto"> <?php echo $character->Precio; ?></span>					
								<div class="card-action">
			          				<a href="#">Ver mas</a>          
			       				 </div>
				            </div>	 	           
			          	</div> 
			      	</div>
			            
					<div class="divider"></div>
					
<?php 
		
				}
				break;
			}
			case 'rango'://si el boton es por algun parametro
			{
								
				foreach ($characters as $character) {
					$valor = convertirFormato($character->Precio);//llama a funcion para convertir el formato de moneda a numero
					//cuando no se tiene seleccionado una ciudad y un tipo
					if ($valor >= $from && $valor <= $to && $vciudad ==0 && $vtipo ==0){
						
?>
						<div class="card-panel grey lighten-5 z-depth-1 card">
				          	<div class="row valign-wrapper" >
					            <div class="col s15">
					            	<img src="img/home.jpg" height="200" />             
					            </div>
					            <div class="col s20 m10" >
					                <strong>Direcci&oacute;n: &nbsp; </strong> <?php echo  $character->Direccion; ?><br />
					                <strong>Ciudad: &nbsp; </strong> <?php echo  $character->Ciudad; ?><br />
					                <strong>Telefono: &nbsp; </strong> <?php echo  $character->Telefono; ?>	<br />				
									<strong>Codigo Postal: &nbsp; </strong> <?php echo  $character->Codigo_Postal; ?><br />						
									<strong>Tipo: &nbsp; </strong> <?php echo  $character->Tipo; ?>	<br />							
									<strong>Precio: &nbsp; </strong><span class="precioTexto"> <?php echo $character->Precio; ?></span>					
									<div class="card-action">
				          				<a href="#">Ver mas</a>          
				       				 </div>
					            </div>	 	           
				          	</div> 
				      	</div>
			            
						<div class="divider"></div>
<?php
						//cuando se tiene seleccionado una ciudad y pero no un tipo
					}elseif ($valor >= $from && $valor <= $to && $vciudad != 0 && $vtipo == 0){
							//obtiene la información de acuerdo a la ciudad elegida
						if($ciudad == $character->Ciudad){ 
?>
							<div class="card-panel grey lighten-5 z-depth-1 card">
					          	<div class="row valign-wrapper" >
						            <div class="col s15">
						            	<img src="img/home.jpg" height="200" />             
						            </div>
						            <div class="col s20 m10" >
						                <strong>Direcci&oacute;n: &nbsp; </strong> <?php echo  $character->Direccion; ?><br />
						                <strong>Ciudad: &nbsp; </strong> <?php echo  $character->Ciudad; ?><br />
						                <strong>Telefono: &nbsp; </strong> <?php echo  $character->Telefono; ?>	<br />				
										<strong>Codigo Postal: &nbsp; </strong> <?php echo  $character->Codigo_Postal; ?><br />						
										<strong>Tipo: &nbsp; </strong> <?php echo  $character->Tipo; ?>	<br />							
										<strong>Precio: &nbsp; </strong><span class="precioTexto"> <?php echo $character->Precio; ?></span>					
										<div class="card-action">
					          				<a href="#">Ver mas</a>          
					       				 </div>
						            </div>	 	           
					          	</div> 
					      	</div>				            
							<div class="divider"></div>
<?php							
						}
					//cuando se tiene seleccionado un tipo y pero no una ciudad
					}elseif ($valor >= $from && $valor <= $to && $vciudad == 0 && $vtipo != 0){
						if($tipo == $character->Tipo){//obtiene la información de acuerdo al tipo elegido
?>
							<div class="card-panel grey lighten-5 z-depth-1 card">
					          	<div class="row valign-wrapper" >
						            <div class="col s15">
						            	<img src="img/home.jpg" height="200" />             
						            </div>
						            <div class="col s20 m10" >
						                <strong>Direcci&oacute;n: &nbsp; </strong> <?php echo  $character->Direccion; ?><br />
						                <strong>Ciudad: &nbsp; </strong> <?php echo  $character->Ciudad; ?><br />
						                <strong>Telefono: &nbsp; </strong> <?php echo  $character->Telefono; ?>	<br />				
										<strong>Codigo Postal: &nbsp; </strong> <?php echo  $character->Codigo_Postal; ?><br />						
										<strong>Tipo: &nbsp; </strong> <?php echo  $character->Tipo; ?>	<br />							
										<strong>Precio: &nbsp; </strong><span class="precioTexto"> <?php echo $character->Precio; ?></span>					
										<div class="card-action">
					          				<a href="#">Ver mas</a>          
					       				 </div>
						            </div>	 	           
					          	</div> 
					      	</div>
				            
							<div class="divider"></div>
<?php									
							
						}
				//cuando se tiene seleccionado un tipo y una ciudad
					}elseif ($valor >= $from && $valor <= $to && $vciudad != 0 && $vtipo != 0){
						//obtiene la información de acuerdo al tipo y ciudad elegida
						if($tipo == $character->Tipo && $ciudad == $character->Ciudad){
							
?>
							<div class="card-panel grey lighten-5 z-depth-1 card">
					          	<div class="row valign-wrapper" >
						            <div class="col s15">
						            	<img src="img/home.jpg" height="200" />             
						            </div>
						            <div class="col s20 m10" >
						                <strong>Direcci&oacute;n: &nbsp; </strong> <?php echo  $character->Direccion; ?><br />
						                <strong>Ciudad: &nbsp; </strong> <?php echo  $character->Ciudad; ?><br />
						                <strong>Telefono: &nbsp; </strong> <?php echo  $character->Telefono; ?>	<br />				
										<strong>Codigo Postal: &nbsp; </strong> <?php echo  $character->Codigo_Postal; ?><br />						
										<strong>Tipo: &nbsp; </strong> <?php echo  $character->Tipo; ?>	<br />							
										<strong>Precio: &nbsp; </strong><span class="precioTexto"> <?php echo $character->Precio; ?></span>					
										<div class="card-action">
					          				<a href="#">Ver mas</a>          
					       				 </div>
						            </div>	 	           
					          	</div> 
					      	</div>
				            
							<div class="divider"></div>
<?php																
						}
					}
				}
				break;	
			}
		}
	}
?>