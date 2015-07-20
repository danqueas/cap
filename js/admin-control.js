$(function(){
    $(document).ready(function(){

        $('.cuerpo-principal').off('submit','#form-busqueda');
        $('.cuerpo-principal').on('submit','#form-busqueda',function(event){
            event.preventDefault();
            var nombre    =     $(this).find('input[name=txtbusqueda]').val();
            var evento    =     'inicio';
            var ruta  = "Negocio/BL_admin-control.php";

            $.post(ruta,{evento:evento,nombre:nombre}, function(resultado){
                     $('.reportes').html(resultado);
            });   
            //alert(nombre)   ;


        });


      	$('.cuerpo-principal').off('click','.ver-detalle');
      	$('.cuerpo-principal').on('click','.ver-detalle',function(event){

      		var idcontrol 	= 	$(this).attr('data-control');
          var mes         =   $(this).attr('data-mes');
      		var nummes 		  = 	$(this).attr('data-nummes');
      		var evento 		  = 	"ver-detalle";
          var ruta        =   "Negocio/BL_admin-control.php";

      		$.post(ruta,{evento:evento,idcontrol:idcontrol,mes:mes,nummes:nummes},function(result){

      			$('.reportes').html(result);


      		});
      	});

      	$('.cuerpo-principal').off('click','.regresar');
      	$('.cuerpo-principal').on('click','.regresar',function(event){

	      	var evento 	= "inicio";
          var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var ruta  = "Negocio/BL_admin-control.php";

            $.post(ruta,{evento:evento,nombre:nombre}, function(resultado){
                     $('.reportes').html(resultado);
            });   
      	});


    });
});