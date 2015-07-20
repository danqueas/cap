  $(function(){
      $(document).ready(function(){


        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-trabajador');
        $('.cuerpo-principal').on('click','.modal-trabajador',function(event){
            var evento    =     $(this).attr('data-event');

            if (evento=='nuevo') {
              
              $('.modal-title').html('FORMULARIO REGISTRAR TRABAJADOR');

              $.post('Negocio/BL_trabajador.php',{evento:evento},function(result){
                $('.modal-body').html(result);
              });
            }
            else if (evento=='editar'){

              var idtrabajador   =    $(this).attr('id');

              $('.modal-title').html('FORMULARIO EDITAR TRABAJADOR');

              $.post('Negocio/BL_trabajador.php',{evento:evento,idtrabajador:idtrabajador},function(result){
                $('.modal-body').html(result);
              });
              //alert(idtrabajador);

            };

            $('#trabajador-modal').modal('show');

        });


        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-guardar');
        $('.cuerpo-principal').on('click', '.btn-guardar', function(event){

            var idtrabajador    =     $('#form-trabajador').find('input[name=txtidtrabajador]').val();
            var nombre          =     $('#form-trabajador').find('input[name=txtnombre]').val();
            var apellido        =     $('#form-trabajador').find('input[name=txtapellido]').val();
            var dni             =     $('#form-trabajador').find('input[name=txtdni]').val();
            var sexo            =     $('#form-trabajador').find('input[name=txtsexo]').val();
            var direccion       =     $('#form-trabajador').find('input[name=txtdireccion]').val();
            var idttrabajador   =     $('#form-trabajador').find('select[name=ttrabajador]').val();
            var evento          =     $('#form-trabajador').find('input[name=txtevento]').val();

            //bootbox.alert(nombre+' '+descripcion);

            $.post('Negocio/BL_trabajador.php',{nombre:nombre, apellido:apellido,dni:dni,sexo:sexo,direccion:direccion,
                                                       idttrabajador:idttrabajador,evento:evento,idtrabajador:idtrabajador}, function(resultado){

                  if (resultado == 1) {
                  
                    bootbox.alert("La Operación se efectuo Correctamente");
                    $('#myModal').modal('hide');
                    var evento  =   'buscar';
                    var nombre  =   '';
                    $.post('Negocio/BL_trabajador.php',{evento:evento,nombre:nombre},function(resultado){
                      $('.cuerpo-principal').html(resultado);
                    });
                  }
                  else{

                    bootbox.alert("Ocurrio un Error");

                  }


            });
            //alert(idtrabajador+' '+nombre+' '+direccion+' '+evento);
        });


        //CAMBIAR DE ESTADO
        $('.cuerpo-principal').off('click','.trabajador-estado');
        $('.cuerpo-principal').on('click','.trabajador-estado',function(event){
            var evento          =     $(this).attr('data-event');
            var idtrabajador    =     $(this).attr('id');
            var estado          =     $(this).attr('data-estado');


            bootbox.confirm("Desea Cambiar de Estado?", function(result) {
              if (result == 1) {
                $.post('Negocio/BL_trabajador.php',{evento:evento,idtrabajador:idtrabajador,estado:estado},function(result){
                      if (result == 1) {
                          var evento  =   'buscar';
                          var nombre  =   '';
                          $.post('Negocio/BL_trabajador.php',{evento:evento,nombre:nombre},function(resultado){
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
            $.post('Negocio/BL_trabajador.php',{evento:evento,nombre:nombre}, function(resultado){
                     $('.cuerpo-principal').html(resultado);
            });      


        });


    });


  });
