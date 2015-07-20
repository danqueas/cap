$(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-tpermiso');
        $('.cuerpo-principal').on('click','.modal-tpermiso',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

              $.post('Negocio/BL_tpermiso.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idtpermiso   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR');

              $.post('Negocio/BL_tpermiso.php',{evento:evento,idtpermiso:idtpermiso},function(result){
                $('.modal-body').html(result);
              });

              //alert(idfaltado);

            };

            $('#tpermiso-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var descripcion     =     $('#form-tpermiso').find('input[name=txtdescripcion]').val();
            var ndias           =     $('#form-tpermiso').find('input[name=txtndias]').val();
            var evento          =     $('#form-tpermiso').find('input[name=txtevento]').val();
            var idtpermiso      =     $('#form-tpermiso').find('input[name=txtidtpermiso]').val();
            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_tpermiso.php',{descripcion:descripcion, ndias:ndias,
                                              evento:evento,idtpermiso:idtpermiso}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_tpermiso.php',{evento:evento,nombre:nombre},function(resultado){
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
        $('.cuerpo-principal').off('click','.tpermiso-estado');
        $('.cuerpo-principal').on('click','.tpermiso-estado',function(event){
            var evento      =     $(this).attr('data-event');
            var idtpermiso   =     $(this).attr('id');
            var estado      =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_tpermiso.php',{evento:evento,idtpermiso:idtpermiso,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_tpermiso.php',{evento:evento,nombre:nombre},function(resultado){
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
            $.post('Negocio/BL_tpermiso.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

    });


  });
