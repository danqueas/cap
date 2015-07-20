  $(function(){
      $(document).ready(function(){

        // FORMULARIO
        $('.cuerpo-principal').off('click','.modal-permiso');
        $('.cuerpo-principal').on('click','.modal-permiso',function(){
            var evento        =     $(this).attr('data-event');
            var idtrabajador  =    $(this).attr('id');
              
            $('.modal-title').html('FORMULARIO REGISTRAR NUEVO');

           $.post('Negocio/BL_permisos.php',{evento:evento,idtrabajador:idtrabajador},function(result){
            $('.modal-body').html(result);
              });
            $('#permiso-modal').modal('show');

        });


        $('.cuerpo-principal').off('click','.btn-guardar');
        $('.cuerpo-principal').on('click','.btn-guardar',function(){
            
            var fecha         =     $('#form-permiso').find('input[name=txtfecha]').val();
            var observacion   =     $('#form-permiso').find('input[name=txtobservacion]').val();
            var permisos      =     $('#form-permiso').find('select[name=permisos]').val();
            var evento        =     $('#form-permiso').find('input[name=txtevento]').val();
            var idtrabajador  =     $('#form-permiso').find('input[name=txtidtrabajador]').val();
              
            //alert(fecha+' '+observacion+' '+evento+' '+idtrabajador+' '+permisos );

            $.post('Negocio/BL_permisos.php',{fecha:fecha,observacion:observacion,permisos:permisos,
                                               evento:evento,idtrabajador:idtrabajador},function(result){

                if (result==1) {

                  bootbox.alert("SE REGISTRO CORRECTAMENTE");

                }
                else{
                  bootbox.alert("Ocurrio un Error");
                }


            });

        });


        $('.cuerpo-principal').off('click','#btn-busqueda');
        $('.cuerpo-principal').on('click','#btn-busqueda',function(){

            var nombre    =     $('.cuerpo-principal').find('input[name=txtbusqueda]').val();
            var evento    =     'buscar';

            $.post('Negocio/BL_permisos.php',{evento:evento,nombre:nombre}, function(resultado){
                $('.cuerpo-principal').html(resultado);
            })

            //alert(nombre+' '+evento);
        });



    })

});
