$(function(){

		$(document).ready(function(){


			$('.container').off('click', '.enlace');

			$('.container').on('click','.enlace', function(event){
				$('li').removeClass('active');

				$(this).parents('li').addClass("active");

				var ruta 	= 	$(this).attr('ruta');
				var evento 	= 	'buscar';
				var nombre 	= 	'';
				$.post('Negocio/BL_'+ruta+'.php',{evento:evento,nombre:nombre},function(resultado){
					$('.cuerpo-principal').html(resultado);
				});


			});


		});

});
