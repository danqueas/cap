  $(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-contrato');
        $('.cuerpo-principal').on('click','.modal-contrato',function(event){
            var evento          =     $(this).attr('data-event');

            if (evento=='nuevo') {
              var idtrabajador    =     $(this).attr('data-trabajador');
              $('.cont-modal-title').html('FORMULARIO NUEVO CONTRATO');

              $.post('Negocio/BL_contrato.php',{evento:evento,idtrabajador:idtrabajador},function(result){
                $('.cont-modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idcontrato   =    $(this).attr('id');

              $('.cont-modal-title').html('FORMULARIO EDITAR CONTRATO');

              $.post('Negocio/BL_contrato.php',{evento:evento,idcontrato:idcontrato},function(result){
                $('.cont-modal-body').html(result);
              });

            };

            $('#contrato-modal').modal('show');
           //alert(idtrabajador);

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar-contrato');
        $('.cuerpo-principal').on('click', '.btn-guardar-contrato', function(event){

            var idtrabajador    =     $('#form-contrato').find('input[name=txttrabajador]').val();
            var idarea          =     $('#form-contrato').find('select[name=area]').val();
            var idgrupo         =     $('#form-contrato').find('select[name=grupo]').val();
            var finicio         =     $('#form-contrato').find('input[name=txtfinicio]').val();
            var ffin            =     $('#form-contrato').find('input[name=txtffin]').val();
            var descripcion     =     $('#form-contrato').find('input[name=txtdescripcion]').val();
            var evento          =     $('#form-contrato').find('input[name=txtevento]').val();
            var idcontrato      =     $('#form-contrato').find('input[name=txtcontrato]').val();
            //bootbox.alert(nombre+' '+descripcion);
            if (evento == "modificar") {

              $.post('Negocio/BL_contrato.php',{idtrabajador:idtrabajador, idarea:idarea,idgrupo:idgrupo,finicio:finicio,
                                                         ffin:ffin,descripcion:descripcion,evento:evento,idcontrato:idcontrato}, function(resultado){

                    if (resultado == 1) {

                      bootbox.alert("La Operación se efectuo Correctamente");
                      $('#contrato-modal').modal('hide');
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_contrato.php',{evento:evento,nombre:nombre},function(resultado){
                            $('.cuerpo-principal').html(resultado);
                          });
                    }
                    else{
                      bootbox.alert(resultado);
                    }
              });

            }

            else{

              $.post('Negocio/BL_contrato.php',{idtrabajador:idtrabajador, idarea:idarea,idgrupo:idgrupo,finicio:finicio,
                                                         ffin:ffin,descripcion:descripcion,evento:evento,idcontrato:idcontrato}, function(resultado){
                    if (resultado == 1) {

                      bootbox.alert("La Operación se efectuo Correctamente");
                      $('#contrato-modal').modal('hide');
 
                    }
                    else{
                      bootbox.alert(resultado);
                    }
              });

            };

            //alert(idtrabajador+' '+idarea+' '+idgrupo+' '+finicio+' '+ffin+' '+evento);
            //alert(evento);

        });



        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.contrato-estado');
        $('.cuerpo-principal').on('click','.contrato-estado',function(event){
            var evento        =     $(this).attr('data-event');
            var idcontrato    =     $(this).attr('id');
            var estado        =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_contrato.php',{evento:evento,idcontrato:idcontrato,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_contrato.php',{evento:evento,nombre:nombre},function(resultado){
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


        $('.cuerpo-principal').off('click','#btn-busqueda-contrato');
        $('.cuerpo-principal').on('click','#btn-busqueda-contrato',function(event){
            var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var evento    =     'buscar';
            $.post('Negocio/BL_contrato.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

   
    });


  });
