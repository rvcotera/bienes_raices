//llamado de la funcion para llenar los combobox de ciudades y tipos
cargarListado($('select#selectedCiudad').get(0), 'obtenerListado.php?getlist=ciudad','ciudad');
cargarListado($('select#selectedTipo').get(0), 'obtenerListado.php?getlist=tipo','tipo');


//********** variables y funcion para obtener los valors que se adquieren del slider
var from = 0,
    to = 0;

var saveResult = function (data) {
    from = data.from;
    to = data.to;
};
//******

/*
  Función que inicializa el elemento Slider
*/
function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,    
    onStart: function (data) {//se actualizan las variables from y to
        saveResult(data);
    },
    //en cada cambio al soltar le boton se actualizan las variable from y to
    onChange: saveResult,
    onFinish: saveResult
    
  });
}

//funcion para cargar los combobox parametros el objeto combo, la url donde realizara la busqueda y el atributo del objeto
function cargarListado(selobj,url,nameattr)
{
    //se hace el llamado a la url  y se obtienen los valores de acuerdo al selected
    $.getJSON(url,{},function(data)
    {		
    	//se llena el objeto combo con la informacion obtenida
        $.each(data, function(i,obj)
        {
            $(selobj).append($('<option>'+obj+'</option>').val(obj[nameattr]).html(obj[nameattr]));
        });
    });
}

inicializarSlider();

$().ready(function () {
	$('select').material_select(); //se activan los combobox 
	 
	 //muestra todos los registros que existen 
	$("#mostrarTodos").click(function (e) {
		var id="todos";	
		e.preventDefault(); 	
		$.get("mostrarListado.php", {		
			parametro:id	//envio de variable para saber a que boton se refiere				
			}, function(data){
					$("#resultado").html(data);	//impresion de resultados obtenidos						
			});
		});
	
	//muestra los registro de acuerdo a los parametros seleccionados
	$("#submitButton").click(function (e) {
		var id="rango",
			ciudad = $('#selectedCiudad option:selected').text(),
			tipo = $('#selectedTipo option:selected').text();
    	$.get("mostrarListado.php", {		
			parametro:id, from:from, to:to, ciudad:ciudad, tipo:tipo				
			}, function(data){
					$("#resultado").html(data);								
			});
		});
});