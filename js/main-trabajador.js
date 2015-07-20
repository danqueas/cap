$(function(){
    $(document).ready(function(){

      	var evento 	= "inicio";
      	var ruta 	= "Negocio/BL_reporte_trabajador.php";

      	$.post(ruta,{evento:evento},function(result){
      		$('.reportes').html(result);
      	});


      	$('.cuerpo-principal').off('click','.ver-detalle');
      	$('.cuerpo-principal').on('click','.ver-detalle',function(event){

      		var idcontrol 	= 	$(this).attr('data-control');
      		var mes 		    = 	$(this).attr('data-mes');
          var nummes      =   $(this).attr('data-nummes');
      		var evento 		  = 	"ver-detalle";

      		$.post(ruta,{evento:evento,idcontrol:idcontrol,mes:mes,nummes:nummes},function(result){

      			$('.reportes').html(result);


      		});
      	});

      	$('.cuerpo-principal').off('click','.regresar');
      	$('.cuerpo-principal').on('click','.regresar',function(event){

	      	var evento 	= "inicio";
	      	var ruta 	= "Negocio/BL_reporte_trabajador.php";

	      	$.post(ruta,{evento:evento},function(result){
	      		$('.reportes').html(result);
	      	});
      	});


    });
});