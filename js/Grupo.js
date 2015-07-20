$(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-grupo');
        $('.cuerpo-principal').on('click','.modal-grupo',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

              $.post('Negocio/BL_grupo.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idgrupo   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR');

              $.post('Negocio/BL_grupo.php',{evento:evento,idgrupo:idgrupo},function(result){
                $('.modal-body').html(result);
              });

            };

            $('#grupo-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var ngrupo     =     $('#form-grupo').find('input[name=txtngrupo]').val();
            var evento     =     $('#form-grupo').find('input[name=txtevento]').val();
            var idgrupo    =     $('#form-grupo').find('input[name=txtidgrupo]').val();
            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_grupo.php',{ngrupo:ngrupo,evento:evento,
                                            idgrupo:idgrupo}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_grupo.php',{evento:evento,nombre:nombre},function(resultado){
                      $('.cuerpo-principal').html(resultado);
                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(ngrupo+' '+evento+' '+idgrupo);
        });


        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.grupo-estado');
        $('.cuerpo-principal').on('click','.grupo-estado',function(event){
            var evento       =     $(this).attr('data-event');
            var idgrupo      =     $(this).attr('id');
            var estado       =     $(this).attr('data-estado');

            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_grupo.php',{evento:evento,idgrupo:idgrupo,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_grupo.php',{evento:evento,nombre:nombre},function(resultado){
                            $('.cuerpo-principal').html(resultado);
                          });
                      }
                      else{
                        bootbox.alert("Ocurrio un Error");
                      }
                  });
              }
            });
          //alert(evento+' '+idfestivo+' '+estado);
        });


        //BUSQUEDA
        $('.cuerpo-principal').off('click','#btn-busqueda');
        $('.cuerpo-principal').on('click','#btn-busqueda',function(event){
            var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var evento    =     'buscar';
            $.post('Negocio/BL_grupo.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });


        // MODAL TABLA CON HORARIOS
        $('.cuerpo-principal').off('click','.modal-horarios');
        $('.cuerpo-principal').on('click','.modal-horarios',function(event){
            var evento    =    $(this).attr('data-event');
            var idgrupo   =    $(this).attr('id');
            if (evento=='ver') {
              
              $('.h-modal-title').html('LISTA DE HORARIOS REGISTRADOS');
              $.post('Negocio/BL_grupo.php',{evento:evento,idgrupo:idgrupo},function(result){
                $('.h-modal-body').html(result);
              });
            }
            else if (evento=='agregar'){
              $('.h-modal-title').html('LISTA DE HORARIOS RESTANTES');
              $.post('Negocio/BL_grupo.php',{evento:evento,idgrupo:idgrupo},function(result){
                $('.h-modal-body').html(result);
              });
            };
            $('#horario-modal').modal('show');

        });

        // REGISTRO / CAMBIO DE ESTADO HORARIOS
        $('.cuerpo-principal').off('click','.horario-evento');
        $('.cuerpo-principal').on('click','.horario-evento',function(event){
            var evento      =    $(this).attr('data-event');
            var idhortur    =    $(this).attr('id');
            var estado      =    $(this).attr('data-estado');
            var idgrupo     =    $(this).attr('data-grupo');
            var objeto      =    $(this).parents().get(1);

            $.post('Negocio/BL_grupo.php',{evento:evento,idhortur:idhortur,
                                            estado:estado,idgrupo:idgrupo},function(result){
              if (evento == 'horario-estado') {
                  evento  =  "ver";
                  bootbox.alert('El Proceso se llevo Correctamente');
                  $('.h-modal-title').html('LISTA DE HORARIOS REGISTRADOS');
                  $.post('Negocio/BL_grupo.php',{evento:evento,idgrupo:idgrupo},function(result){
                    $('.h-modal-body').html(result);
                  });
                  $('#horario-modal').modal('show');

              } else if(evento = 'horario-registrar'){
                if (result == 1) {
                  bootbox.alert('El Proceso se llevo Correctamente');
                  $(objeto).fadeOut(350);
                }
                else{bootbox.alert('Ocurrio un Error');};
              };


            });

            //alert(evento+' '+idhortur+' '+estado+' '+idgrupo);

        });

    });


  });
