  $(function(){
      $(document).ready(function(){


        $('.cuerpo-principal').on('submit','#loginbox',function(event){
          event.preventDefault();
        });

        // INSERTAR - EDITAR
        $('.cuerpo-principal').off('click', '.btn-ingreso');
        $('.cuerpo-principal').on('click', '.btn-ingreso', function(){

            var usuario         =     $('#loginbox').find('input[name=txtusuario]').val();
            var evento          =     'ingresar-asistencia';

            //bootbox.alert(usuario+' '+evento);

           $.post('Negocio/BL_control.php',{usuario:usuario, evento:evento}, function(resultado){
 
                obj = JSON.parse(resultado);
           
                var nombres   = obj.nombres;
                var fechas    = obj.fecha;
                var hingreso  = obj.ingreso;
                var hsalida   = obj.salida;
                var mensaje   = obj.mensaje;

                document.getElementById("trabajador").value = nombres;
                document.getElementById("fecha").value = fechas;
                document.getElementById("hingreso").value = hingreso;
                document.getElementById("hsalida").value = hsalida;
                document.getElementById("mensaje").value = mensaje;

                //alert(nombres+' '+fechas+' '+hingreso+' '+hsalida+' '+mensaje);
                //alert(resultado);

           });

        });

        $('.cuerpo-principal').off('click', '.btn-salida');
        $('.cuerpo-principal').on('click', '.btn-salida', function(){

            var usuario         =     $('#loginbox').find('input[name=txtusuario]').val();
            var evento          =     'salida-asistencia';

            //bootbox.alert(usuario+' '+evento);

           $.post('Negocio/BL_control.php',{usuario:usuario, evento:evento}, function(resultado){
 
                obj = JSON.parse(resultado);
           
                var nombres   = obj.nombres;
                var fechas    = obj.fecha;
                var hingreso  = obj.ingreso;
                var hsalida   = obj.salida;
                var mensaje   = obj.mensaje;

                document.getElementById("trabajador").value = nombres;
                document.getElementById("fecha").value = fechas;
                document.getElementById("hingreso").value = hingreso;
                document.getElementById("hsalida").value = hsalida;
                document.getElementById("mensaje").value = mensaje;

                //alert(nombres+' '+fechas+' '+hingreso+' '+hsalida+' '+mensaje);
                //alert(resultado);

           });

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
