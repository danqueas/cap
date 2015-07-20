  $(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-horario');
        $('.cuerpo-principal').on('click','.modal-horario',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

              $.post('Negocio/BL_horario.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idhorario   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR');

              $.post('Negocio/BL_horario.php',{evento:evento,idhorario:idhorario},function(result){
                $('.modal-body').html(result);
              });

              //alert(idhorario);

            };

            $('#horario-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var dia          =     $('#form-horario').find('input[name=txtdia]').val();
            var hentrada     =     $('#form-horario').find('input[name=txtentrada]').val();
            var hsalida      =     $('#form-horario').find('input[name=txtsalida]').val();
            var idhorario    =     $('#form-horario').find('input[name=txtidhorario]').val();
            var evento       =     $('#form-horario').find('input[name=txtevento]').val();


            $.post('Negocio/BL_horario.php',{dia:dia, hentrada:hentrada, evento:evento,
                                                        hsalida:hsalida,idhorario:idhorario}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_horario.php',{evento:evento,nombre:nombre},function(resultado){
                      $('.cuerpo-principal').html(resultado);
                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(idarea+' '+evento+' '+descripcion+' '+nombre);
        });


        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.horario-estado');
        $('.cuerpo-principal').on('click','.horario-estado',function(event){
            var evento    =     $(this).attr('data-event');
            var idhorario =     $(this).attr('id');
            var estado    =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_horario.php',{evento:evento,idhorario:idhorario,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_horario.php',{evento:evento,nombre:nombre},function(resultado){
                            $('.cuerpo-principal').html(resultado);
                          });
                      }
                      else{
                        bootbox.alert("Ocurrio un Error");
                      }
                  });
              }
            });

            //alert(evento+' '+idhorario+' '+estado);
        });


        //BUSQUEDA
        $('.cuerpo-principal').off('click','#btn-busqueda');
        $('.cuerpo-principal').on('click','#btn-busqueda',function(event){
            var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var evento    =     'buscar';
            $.post('Negocio/BL_horario.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

    });


  });
