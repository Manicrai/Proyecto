$(document).ready(function(){
  $(document).on('click', '.his', function(){
    var id=$(this).val();
      $.ajax({
        url: "funcion_historialMedico.php",
        method: "POST",
        async: false,
        data: {dbid : id },
        //dataType: "json", 
          success: function(respuesta){
              var idpaciente = (respuesta.split("#")[0]);
              var alergias = (respuesta.split("#")[1]);
              var cronicas = (respuesta.split("#")[2]);
              var quirurgicos = (respuesta.split("#")[3]);
              var familiar = (respuesta.split("#")[4]);
              var ginecologicos = (respuesta.split("#")[5]);
              var otros = (respuesta.split("#")[6]);
              
              $('#histori').modal('show');
              $('#alergias').val(alergias);
              $('#cronicas').val(cronicas);
              $('#quirurgicos').val(quirurgicos);
              $('#familiar').val(familiar);
              $('#ginecologicos').val(ginecologicos);
              $('#otros').val(otros);
              $('#idpa').val(idpaciente); 


          }
      });
  
    });
    $(document).on('click', '.pago', function(){
      var id=$(this).val();
        $.ajax({
          url: "funcion_pago.php",
          method: "POST",
          async: false,
          data: {dbid : id },
          //dataType: "json", 
            success: function(respuesta){
                var idpago = (respuesta.split("#")[0]);
                var referencia = (respuesta.split("#")[1]);
                var metodo_pago = (respuesta.split("#")[2]);
                var monto = (respuesta.split("#")[3]);
                var consulta = (respuesta.split("#")[5]);
                
                $('#pago').modal('show');
                $('#mpago').val(metodo_pago);
                $('#referencia').val(referencia);
                $('#monto').val(monto);
                $('#idpago').val(idpago);
                $('#idconsu').val(id);  
  
  
            }
        });
    
      });
    $(document).on('click', '.edit', function(){
      var id=$(this).val();
      var cedulaa = $('#cedula'+id).text();
      var nombree = $('#nombre'+id).text();
      var apellidoo = $('#apellido'+id).text();
      var telefonoo = $('#telefono'+id).text();
      var sexoo = $('#sexo'+id).text();
      var edad = $('#edad'+id).text();
      var periodoo = $('#periodo'+id).text();

      $('#edit').modal('show');
      $('#nombre').val(nombree);
      $('#apellido').val(apellidoo);
      $('#telefono').val(telefonoo);
      $('#cedula').val(cedulaa);
      $('#edad').val(edad);
      $('#sexo').val(sexoo);
      $('#periodo').val(periodoo);
      $('#id').val(id);  
    });
    $(document).on('click', '.fill', function(){     
      var id=$(this).val();
          $.ajax({
                      url: "idsession.php",
                      method: "POST",
                      async: false,
                      data: {bdid : id },
                     //dataType: "json", 
                      success: function(respuesta) {                                
                          window.location.href = "nueva_consulta.php";
                          }  
              })
     })
     $(document).on('click', '.dash', function(){     
      var id=$(this).val();
          $.ajax({
                      url: "idsession.php",
                      method: "POST",
                      async: false,
                      data: {bdid : id },
                     //dataType: "json", 
                      success: function(respuesta) {                                
                          window.location.href = "historial-consulta.php";
                          }  
              })
     })
         var t = $('#example').DataTable();

         $('#addRow').on('click', function () {
          var medicamento = document.getElementById ('medicamento').value;
          var concentracion = document.getElementById ('concetracion').value;
          var tomar = document.getElementById ('tomar').value;
          var frecuencia = document.getElementById ('frecuencia').value;
          var durante = document.getElementById ('durante').value;
                 t.row.add([medicamento, concentracion, tomar, frecuencia , durante ]).draw(false);
                 $.ajax({
                  url:"insertar_receta.php",
                  method:"POST",
                  data:{medicamento:medicamento, concentracion:concentracion, tomar:tomar, frecuencia:frecuencia, durante:durante },
                  success:function(data)
                  {
                  }
                 });

         });
         $(document).on('click', '.cont', function(){     
          var idconsulta=$(this).val();
          
              $.ajax({
                          url: "idconsulta.php",
                          method: "POST",
                          async: false,
                          data: {bdidconsulta : idconsulta },
                         //dataType: "json", 
                          success: function(respuesta) {                                
                              window.location.href = "vista_consulta.php";
                              
                              }  
                  })
         })


    });
      
    