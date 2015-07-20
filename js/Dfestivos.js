$(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-dfestivos');
        $('.cuerpo-principal').on('click','.modal-dfestivos',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

              $.post('Negocio/BL_dfestivo.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idfestivo   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR');

              $.post('Negocio/BL_dfestivo.php',{evento:evento,idfestivo:idfestivo},function(result){
                $('.modal-body').html(result);
              });

              //alert(idfestivo);

            };

            $('#dfestivos-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var fecha        =     $('#form-dfestivos').find('input[name=txtfecha]').val();
            var nombre       =     $('#form-dfestivos').find('input[name=txtnombre]').val();
            var tipot        =     $('#form-dfestivos').find('select[name=ttrabajador]').val();
            var evento       =     $('#form-dfestivos').find('input[name=txtevento]').val();
            var idfestivo    =     $('#form-dfestivos').find('input[name=txtidfestivo]').val();
            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_dfestivo.php',{fecha:fecha, tipot:tipot,
                                              nombre:nombre,evento:evento,idfestivo:idfestivo}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_dfestivo.php',{evento:evento,nombre:nombre},function(resultado){
                      $('.cuerpo-principal').html(resultado);
                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(fecha+' '+nombre+' '+tipot+' '+idfestivo);
        });


        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.dfestivo-estado');
        $('.cuerpo-principal').on('click','.dfestivo-estado',function(event){
            var evento       =     $(this).attr('data-event');
            var idfestivo    =     $(this).attr('id');
            var estado       =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_dfestivo.php',{evento:evento,idfestivo:idfestivo,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_dfestivo.php',{evento:evento,nombre:nombre},function(resultado){
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
            $.post('Negocio/BL_dfestivo.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

    });


  });
