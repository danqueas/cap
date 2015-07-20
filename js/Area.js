  $(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-area');
        $('.cuerpo-principal').on('click','.modal-area',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO NUEVA AREA');

              $.post('Negocio/BL_area.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idarea   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR AREA');

              $.post('Negocio/BL_area.php',{evento:evento,idarea:idarea},function(result){
                $('.modal-body').html(result);
              });

            };

            $('#area-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var nombre          =     $('#form-area').find('input[name=txtnomarea]').val();
            var descripcion     =     $('#form-area').find('input[name=txtdescripcion]').val();
            var evento          =     $('#form-area').find('input[name=txtevento]').val();
            var idarea          =     $('#form-area').find('input[name=txtidarea]').val();
            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_area.php',{nombre:nombre, descripcion:descripcion,
                                                        evento:evento,idarea:idarea}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_area.php',{evento:evento,nombre:nombre},function(resultado){
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
        $('.cuerpo-principal').off('click','.area-estado');
        $('.cuerpo-principal').on('click','.area-estado',function(event){
            var evento    =     $(this).attr('data-event');
            var idarea    =     $(this).attr('id');
            var estado    =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_area.php',{evento:evento,idarea:idarea,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_area.php',{evento:evento,nombre:nombre},function(resultado){
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
            $.post('Negocio/BL_area.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

    });


  });
