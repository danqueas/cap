$(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-ttrabajador');
        $('.cuerpo-principal').on('click','.modal-ttrabajador',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

              $.post('Negocio/BL_ttrabajador.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idttrabajador   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR');

              $.post('Negocio/BL_ttrabajador.php',{evento:evento,idttrabajador:idttrabajador},function(result){
                $('.modal-body').html(result);
              });

              //alert(idfaltado);

            };

            $('#ttrabajador-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var nttrabajador      =     $('#form-ttrabajador').find('input[name=txtnomttrabajador]').val();
            var descripcion       =     $('#form-ttrabajador').find('input[name=txtdescripcion]').val();
            var evento            =     $('#form-ttrabajador').find('input[name=txtevento]').val();
            var idttrabajador     =     $('#form-ttrabajador').find('input[name=txtidttrabajador]').val();
            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_ttrabajador.php',{nttrabajador:nttrabajador, descripcion:descripcion,
                                              evento:evento,idttrabajador:idttrabajador}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_ttrabajador.php',{evento:evento,nombre:nombre},function(resultado){
                      $('.cuerpo-principal').html(resultado);
                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(descripcion+' '+ndias+' '+evento+' '+idtpermiso);
        });


        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.ttrabajador-estado');
        $('.cuerpo-principal').on('click','.ttrabajador-estado',function(event){
            var evento          =     $(this).attr('data-event');
            var idttrabajador   =     $(this).attr('id');
            var estado          =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_ttrabajador.php',{evento:evento,idttrabajador:idttrabajador,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_ttrabajador.php',{evento:evento,nombre:nombre},function(resultado){
                            $('.cuerpo-principal').html(resultado);
                          });
                      }
                      else{
                        bootbox.alert("Ocurrio un Error");
                      }
                  });
              }
            }); 
        });


        //BUSQUEDA
        $('.cuerpo-principal').off('click','#btn-busqueda');
        $('.cuerpo-principal').on('click','#btn-busqueda',function(event){
            var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var evento    =     'buscar';
            $.post('Negocio/BL_ttrabajador.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

    });


  });
