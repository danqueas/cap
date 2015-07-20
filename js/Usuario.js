  $(function(){
      $(document).ready(function(){

        // MODAL TABLA CON USUARIOS
        $('.cuerpo-principal').off('click','.modal-usuarios');
        $('.cuerpo-principal').on('click','.modal-usuarios',function(event){
            var evento         =    $(this).attr('data-event');
            var idtrabajador   =    $(this).attr('id');
            if (evento=='ver-usuarios') {
              
              $('.usu-modal-title').html('USUARIOS REGISTRADOS');
              $.post('Negocio/BL_usuario.php',{evento:evento,idtrabajador:idtrabajador},function(result){
                $('.usu-modal-body').html(result);
                $('.btn-guardar-usuarios').hide();
              });
            }
            else if (evento=='agregar-usuarios'){
              $('.usu-modal-title').html('NUEVO USUARIO');
              $.post('Negocio/BL_usuario.php',{evento:evento,idtrabajador:idtrabajador},function(result){
                $('.usu-modal-body').html(result);
              });
                $('.btn-guardar-usuarios').show();

            };
            $('#usuarios-modal').modal('show');
        });


        $('.cuerpo-principal').off('click','.btn-guardar-usuarios');
        $('.cuerpo-principal').on('click','.btn-guardar-usuarios',function(event){

            var idtrabajador    =     $('#form-usuario').find('input[name=txtidtrabajador]').val();
            var nombre          =     $('#form-usuario').find('input[name=txtnombre]').val();
            var password        =     $('#form-usuario').find('input[name=txtpassword]').val();
            var idusuario       =     $('#form-usuario').find('input[name=txtidusuario]').val();
            var evento          =     $('#form-usuario').find('input[name=txtevento]').val();

            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_usuario.php',{nombre:nombre, password:password, idusuario:idusuario,
                              evento:evento, idtrabajador:idtrabajador}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");

                    var evento        =   'ver-usuarios';
                    $.post('Negocio/BL_usuario.php',{evento:evento,idtrabajador:idtrabajador},function(resultado){

                      $('.usu-modal-title').html('USUARIOS REGISTRADOS');
                      $.post('Negocio/BL_usuario.php',{evento:evento,idtrabajador:idtrabajador},function(result){
                        $('.usu-modal-body').html(result);
                        $('.btn-guardar-usuarios').hide();
                      });

                      $('#usuarios-modal').modal('show');

                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(idtrabajador+' '+nombre+' '+password+' '+idusuario+' '+evento);

        });



        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.usuario-estado');
        $('.cuerpo-principal').on('click','.usuario-estado',function(event){
            var evento          =     $(this).attr('data-event');
            var idusuario       =     $(this).attr('id');
            var estado          =     $(this).attr('data-estado');
            var idtrabajador    =     $(this).attr('data-trabajador');

           bootbox.confirm("Desea Cambiar de Estado?", function(result) {

                  if (result == 1) {

                    $.post('Negocio/BL_usuario.php',{evento:evento,idusuario:idusuario,estado:estado,idtrabajador:idtrabajador},function(result){

                      if (result == 1 ) {

                        var evento        =   'ver-usuarios';

                        $('.usu-modal-title').html('USUARIOS REGISTRADOS');

                        $.post('Negocio/BL_usuario.php',{evento:evento,idtrabajador:idtrabajador},function(result){
                            $('.usu-modal-body').html(result);
                            $('.btn-guardar-usuarios').hide();
                        });

                        $('#usuarios-modal').modal('show');


                      }
                      else{

                        bootbox.alert("Ocurrio un Error");

                      };
                    });
                  }


            });

            //alert(evento+' '+idusuario+' '+estado);

        });

        $('.cuerpo-principal').off('click','.modal-usuario');
        $('.cuerpo-principal').on('click','.modal-usuario',function(event){
            var evento            =    $(this).attr('data-event');
            var idusuario         =    $(this).attr('id');
            var idtrabajador      =    $(this).attr('data-trabajador');

            $('.usu-modal-title').html('EDITAR USUARIO');

            $.post('Negocio/BL_usuario.php',{evento:evento,idusuario:idusuario,idtrabajador:idtrabajador},function(result){
              $('.usu-modal-body').html(result);
            });

            $('.btn-guardar-usuarios').show();

            $('#usuarios-modal').modal('show');
            //alert(evento+' '+idusuario);
        });


    });


  });


