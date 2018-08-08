
<?php

	if(!empty($_GET['getlist'])){ //controla el envio de parametros entre paginas si esta vacio no muestra algo
		
		$list = $_GET['getlist'];

		$url = 'data-1.json'; // archivo que tiene la informacion
		$data = file_get_contents($url); // poner el contenido del archivo en una variable
		$characters = json_decode($data); // decodifica el JSON
		
		$rows = array(); //arreglo para controlar los elementos a obtener
		
		switch($list){
        	case 'ciudad': 
        	{
	           	foreach ($characters as $character) {
					$rows[] =  $character->Ciudad;	//se llena arreglos con las ciudades
				}
	            break;
        	}
			case 'tipo':
        	{
	            foreach ($characters as $character) {
					$rows[] =  $character->Tipo;	//se llena arreglos con los tipos
				}
	            break;
        	}
    	}
		
		$sin_duplicados=array_unique($rows); // se eliminan duplicados
		unset($rows);//se vacia arreglo
		
		foreach($sin_duplicados as $value){ //se cargan denuevo a un array los elementos 
	 		$rows[] =  $value;	//se cargan al arreglos los nuevos valores
	 	}
		 echo json_encode($rows);//se regresa la informacion de acuerdo al criterio de busqueda
	}
?>