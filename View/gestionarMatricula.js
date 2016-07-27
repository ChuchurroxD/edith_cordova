
window.numeroDetalleMatricula = [];
window.cursoID = [];

window.matriculaDuracion = [];
window.matriculaDescuentoPorc = [];


window.matriculaMontoTotal = [];



window.onload = function(){
    mostrarLinea();
    $('#alumnos').DataTable();
    $('#matriculas').DataTable();
    agregarDetalleProductos();
    mostrarMatriculas();
    montoProductos = 0;
    //montoServicios = 0;
    //pago = 0;
    montoTotal = 0;
}




function mostrarLinea(){ 
    var param_opcion = 'comboLinea'; 
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion,
        url: '../../Controller/controlMatricula/control_matricula.php',
        success: function(data){
            $('#linea').html(data);

        },
        error: function(data){
                   
        }
    });    
}

function mostrarMatriculas(){ 
    var param_opcion = 'mostrarMatriculas'; 
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion,
        url: '../../Controller/controlMatricula/control_matricula.php',
        success: function(data){
            $('#cuerpoTabla').html(data);

        },
        error: function(data){
                   
        }
    });    
}


$(function() {
    $('#buscarAlumno').on('click', function(){
        $('#modalAlumno').modal({
            show:true,
            backdrop:'static',
        });

        var param_linea = $('#param_linea').val();
        var param_opcion = 'listarAlumno'; 
        //alert(linea);
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion+'&param_linea='+param_linea,
            url: '../../Controller/controlMatricula/control_matricula.php',
            success: function(data){
                $('#alumnos').DataTable().destroy();
                $('#cuerpoTabla').html(data);
                $('#alumnos').DataTable();

            },
            error: function(data){
                       
            }
        });
    });

    $('#buscarCursos').on('click', function(){
        $('#modalCursos').modal({
            show:true,
            backdrop:'static',
        });

        var param_linea = $('#param_linea').val();
        var param_opcion = 'listarCursos'; 
        //alert(linea);
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion+'&param_linea='+param_linea,
            url: '../../Controller/controlMatricula/control_matricula.php',
            success: function(data){
                $('#cursos').DataTable().destroy();
                $('#cuerpoTablaCursos').html(data);
                $('#cursos').DataTable();

            },
            error: function(data){
                       
            }
        });
    });

    $('#alumnos tbody').on('dblclick', 'tr', function () {seleccionDobleAlumno(this);});
    $('#cursos tbody').on('dblclick', 'tr', function () {seleccionDobleCursos(this);});


    $('#registroMatricula').on('click', function(){
       //alert('LISTO PARA REGISTRO');        
        var param_opcion = document.getElementById('param_opcion').value;
        var param_linea = document.getElementById('param_linea').value;
        var param_alumno = document.getElementById('param_alumno').value;
        var param_idAlumno = document.getElementById('param_idAlumno').value;
        var param_docdetMontoTotalMat = document.getElementById('param_docdetMontoTotalMat').value;

        var param_curso = document.getElementById('param_curso').value;
        var param_codigoCurso = document.getElementById('param_codigoCurso').value;
        var param_duracion = document.getElementById('param_duracion').value;

        var table = $('#tablaDetaCursos').DataTable();

        if (param_linea.length == '' ) {
            bootbox.alert("Seleccione el tipo de matricula", function() {
              
            });
        } else {
            if (param_alumno.length == '') {
                bootbox.alert("Seleccione el alumno", function() {
              
                });
            } else {
                if (param_codigoCurso.length != '') {

                    bootbox.dialog({
                      message: "Esta seguro de realizar la matricula",
                      title: "Mensaje de Confirmación",
                      buttons: {
                        success: {
                          label: "Aceptar",
                          className: "btn-success",
                          callback: function() {
                                $.ajax({
                                    type: 'POST',
                                    data: 'param_opcion='+param_opcion+'&param_linea='+param_linea+
                                        '&param_idAlumno='+param_idAlumno+
                                        '&param_codigoCurso='+cursoID+'&param_duracion='+matriculaDuracion+'&param_numeroDetalleMatricula='+numeroDetalleMatricula+
                                       '&param_matriculaDescuentoPorc='+matriculaDescuentoPorc+'&param_matriculaMontoTotal='+matriculaMontoTotal+
                                       '&param_docdetMontoTotalMat='+param_docdetMontoTotalMat,

                                    url: '../../Controller/controlMatricula/control_matricula.php',
                                    success: function(respuesta) {
                                        document.getElementById('param_dni').value = '';
                                        document.getElementById('param_linea').value = '';
                                        document.getElementById('param_idAlumno').value = '';
                                        document.getElementById('param_inscripcion').value = '';  
                                        document.getElementById('param_alumno').value = '';
                                        document.getElementById('param_docdetMontoTotalMat').value = '';
                                        document.getElementById('param_codigoCurso').value = '';
                                        document.getElementById('param_duracion').value = ''; 
                                        table
                                            .clear()
                                            .draw(); 
                                        numeroDetalleMatricula = [];
                                        cursoID = [];
                                        matriculaDuracion = [];
                                        matriculaDescuentoPorc = [];
                                        matriculaMontoTotal = [];
                                    },
                                    error: function(respuesta)
                                    {
                                        alert("ERROR AL MOSTRAR DATOS");
                                    }
                                });

                               document.getElementById('listar').disabled = false;
                          }
                        },
                        danger: {
                          label: "Cancelar",
                          className: "btn-danger",
                          callback: function() {
                            
                          }
                        }
                      }
                    });    
                    
                } else {
                    bootbox.alert("Seleccione los cursos que a los cuales desea matricular", function() {
              
                    });
                }
            }
        }

        
    });


    $('#listar').on('click', function(){
        window.location = 'listarMatriculas.php';
    });
    
});

function seleccionDobleAlumno(e){
    if ($('#alumnos tbody tr td').length == 1){
       return false;
    }
    

    if ( $(e).hasClass('selected')){
        $(e).removeClass('selected');
    }
    else {
        $('#alumnos').DataTable().$('tr.selected').removeClass('selected');
        $(e).addClass('selected');
    }
    document.getElementById('param_idAlumno').value = $('#alumnos').DataTable().cell('.selected', 0).data();
    document.getElementById('param_alumno').value = $('#alumnos').DataTable().cell('.selected', 1).data();
    document.getElementById('param_dni').value = $('#alumnos').DataTable().cell('.selected', 2).data();
    document.getElementById('param_inscripcion').value = $('#alumnos').DataTable().cell('.selected', 3).data();    
    $('#modalAlumno').modal('hide');
}


function seleccionDobleCursos(e){
    if ($('#cursos tbody tr td').length == 1){
       return false;
    }
    

    if ( $(e).hasClass('selected')){
        $(e).removeClass('selected');
    }
    else {
        $('#cursos').DataTable().$('tr.selected').removeClass('selected');
        $(e).addClass('selected');
    }
    document.getElementById('param_codigoCurso').value = $('#cursos').DataTable().cell('.selected', 0).data();
    document.getElementById('param_curso').value = $('#cursos').DataTable().cell('.selected', 1).data();
    document.getElementById('param_precio').value = $('#cursos').DataTable().cell('.selected', 2).data();
    document.getElementById('param_duracion').value = $('#cursos').DataTable().cell('.selected', 3).data();
    $('#modalCursos').modal('hide');
    document.getElementById('addRow').disabled = false; 
}


function agregarDetalleProductos()
{
    var counter = 1;
    var t = $('#tablaDetaCursos').DataTable();


    $('#addRow').on( 'click', function () {
        var codigo          = document.getElementById('param_codigoCurso').value;
        var curso          = document.getElementById('param_curso').value;
        var preciounitario = document.getElementById('param_precio').value;
        var duracion       = document.getElementById('param_duracion').value;
        var descPorc       = document.getElementById('param_docdetDsctoPorcenajeMat').value;
        var precioBruto    = 0;
        var descuento      = 0;
        var total          = 0;
        precioBruto        = (preciounitario * duracion);

        if (descPorc > 0)
        {                       
            descPorc  = precioBruto * (descPorc/100);
            descuento = descPorc;           
        }
        
        total = precioBruto - descuento;

        t.row.add( [
            codigo,
            curso,
            preciounitario,
            duracion,
            precioBruto,
            descuento,
            total,
            '<button class="btn btn-danger btn-xs center deleteValid" onclick="Eliminar('+total+','+counter+','+total+')">Eliminar</button>',
        ] ).draw( false );
 
        numeroDetalleMatricula.push(counter);
        counter++;
        montoProductos = montoProductos + total
        montoTotal = montoTotal + total;            

        cursoID.push(codigo);
        matriculaDuracion.push(duracion);

        if (descPorc!=0)
            matriculaDescuentoPorc.push(descPorc);
        else
            matriculaDescuentoPorc.push(0);
        
        matriculaMontoTotal.push(total);
        //document.getElementById('param_codigoCurso').value="";
        document.getElementById('param_curso').value="";
        document.getElementById('param_precio').value="";
        document.getElementById('param_duracion').value="";
        document.getElementById('param_docdetDsctoPorcenajeMat').value="";                
        document.getElementById('param_docdetMontoTotalMat').value=montoProductos;
        document.getElementById('addRow').disabled=true;

    } );

    $('#tablaDetaCursos tbody').on( 'click', 'button', function () {
        t
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    });
    
}




function Eliminar(total, counter, total) {
    //console.log(total);
    var pos = matriculaMontoTotal.indexOf(total);
    var pos2 = numeroDetalleMatricula.indexOf(counter);
    //console.log(pos);
    matriculaMontoTotal.splice(pos, 1);
    numeroDetalleMatricula.splice(pos2, 1);
    //matriculaMontoTotal = matriculaMontoTotal.splice(0,1);
    document.getElementById('param_docdetMontoTotalMat').value=document.getElementById('param_docdetMontoTotalMat').value -total ;
    montoProductos = montoProductos - total;
    //console.log(matriculaMontoTotal.toString());
    //alert(counter);
}

function mostrar() {
    console.log(matriculaMontoTotal.toString());
    console.log(numeroDetalleMatricula.toString());
    console.log(numeroDetalleMatricula.length);
}
