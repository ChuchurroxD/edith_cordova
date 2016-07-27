window.onload = function(){
    mostrarDatos();
    $('#example').DataTable();
}

function mostrarDatos(){
    $.ajax({
        type: 'POST',
        data:{param_opcion: 'listarFomacionInicial'},
        url: '../../Controller/control_alumnos.php',
        success: function(respuesta){
            $('#example').DataTable().destroy();
            $('#cuerpoTabla').html(respuesta);
            $('#example').DataTable();
        },
        error: function(respuesta){
            $('#cuerpoTabla').html(respuesta);
        }
    }); 
}

function gestionar(id){
    var param_opcion = 'gestionarInicial';
   //alert(id);
   $.ajax({
        type: 'POST',
        data:'param_opcion='+param_opcion+'&id='+id,
        url: '../../Controller/control_alumnos.php',
        success: function(respuesta){
            mostrarDatos();
        },
        error: function(respuesta){
            $('#cuerpoTabla').html(respuesta);
        }
    });
}

function eliminar(id, persona){
    bootbox.confirm("Desea eliminar este registro?", function(result) {
      if (result == true) {
        var param_opcion = 'eliminarAlumnoInicial';
        $.ajax({
            type: 'POST',
            data:'param_opcion='+param_opcion+'&id='+id+'&persona='+persona,
            url: '../../Controller/control_alumnos.php',
            success: function(data){
                if (data == 1) {
                    mostrarDatos();
                } else {
                    if (data == 0) {
                        bootbox.dialog({
                      message: "El registro no se puede eliminar, porque ya ha sido gestionado",
                      title: "ERROR",
                      buttons: {
                        success: {
                          label: "Aceptar",
                          className: "btn-success",
                          callback: function() {
                            mostrarDatos();
                          }
                        }   
                      }
                    }); 
                    }
                    
                }
                
            },
            error: function(data){
                $('#cuerpoTabla').html(respuesta);
            }
        });
      } else {
        mostrarDatos();
      }
    }); 
}