$(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-dlaborales');
        $('.cuerpo-principal').on('click','.modal-dlaborales',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

              $.post('Negocio/BL_dlaborales.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var iddlaboral   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR');

              $.post('Negocio/BL_dlaborales.php',{evento:evento,iddlaboral:iddlaboral},function(result){
                $('.modal-body').html(result);
              });

              //alert(idfestivo);

            };

            $('#dlaborales-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var Periodo           =     $('#form-dlaborales').find('select[name=periodo]').val();
            var Nom_mes           =     $('#form-dlaborales').find('select[name=mes]').val();
            var Dias_laborales    =     $('#form-dlaborales').find('input[name=txtdlaborales]').val();
            var Dias_festivos     =     $('#form-dlaborales').find('input[name=txtdfestivos]').val();
            var evento            =     $('#form-dlaborales').find('input[name=txtevento]').val();
            var Iddialaboral      =     $('#form-dlaborales').find('input[name=txtiddiaslaborales]').val();

            $.post('Negocio/BL_dlaborales.php',{Periodo:Periodo, Nom_mes:Nom_mes,
                                              Dias_laborales:Dias_laborales,Dias_festivos:Dias_festivos,
                                              evento:evento,Iddialaboral:Iddialaboral}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_dlaborales.php',{evento:evento,nombre:nombre},function(resultado){
                      $('.cuerpo-principal').html(resultado);
                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(Periodo+' '+Nom_mes+' '+Dias_laborales+' '+Dias_festivos+' '+evento+' '+Iddialaboral);
        });


        //BUSQUEDA
        $('.cuerpo-principal').off('click','#btn-busqueda');
        $('.cuerpo-principal').on('click','#btn-busqueda',function(event){
            var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var evento    =     'buscar';
            $.post('Negocio/BL_dlaborales.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });

    });


  });
