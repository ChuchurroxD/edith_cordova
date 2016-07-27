

$(function() {

	$('#registroProfesional').on('click', function(){
		//alert('Do');	
		var nombres = $('#param_nombres').val();
		var apellidos = $('#param_apellidos').val();
		var dni = $('#param_dni').val();
		var email = $('#param_email').val();
		var telefono = $('#param_telefono').val();
		var empresa = $('#param_empresa').val();

		if (nombres.length == '' || apellidos.length == '' || dni.length == '' || email.length == '' || telefono.length == '' || empresa.length == '') {
			$("#error").hide();
            $("#error").html('<p>Advertencia: Ingrese todos los datos requeridos.</p>').show(500).delay(2500).hide(200);
		} else {
			if (!(/^\d{8}$/.test(dni))) {
                $("#error").hide();
            	$("#error").html('<p>Advertencia: El Dni debe tener 8 digitos.</p>').show(500).delay(2500).hide(200);
            } else {
            	if (!(/\S+@\S+\.\S+/.test(email))) {
               		$("#error").hide();
            		$("#error").html('<p>Advertencia: El Email tiene un formato incorrecto.</p>').show(500).delay(2500).hide(200);
            	} else {
            		$.ajax({
						type: 'POST',
						data: $('#frmRegistroProfesional').serialize(),  
						url: 'Controller/control_alumnos.php',
						success: function(data){
							if (data == 1) {			
				            	//$("#exito").hide();
				                //$("#exito").html('<p>Registro Correcto</p>').show();  				                
				                bootbox.dialog({
								  message: "Usted ha sido registrado correctamente. En unos dias nos estaremos comunicando",
								  title: "ÉXITO",
								  buttons: {
								    success: {
								      label: "Aceptar",
								      className: "btn-success",
								      callback: function() {
								        location.href='Profesional.html';
								      }
								    }	
								  }
								}); 
								$('#param_nombres').val('');		
				                $('#param_apellidos').val('');		
				                $('#param_dni').val('');		
				                $('#param_direccion').val('');		
				                $('#param_email').val('');		
				                $('#param_telefono').val('');		
				                $('#param_empresa').val('');		
				                $('#param_cargo').val('');	
				                $("#param_capilar").prop("checked", "");
				                $("#param_corte").prop("checked", "");
				                $("#param_acabadoPerfecto").prop("checked", "");
				                $("#param_maquillaje").prop("checked", "");            	
							}
						}
					});
            	}
            	
            }			
		}
	});

	$('#registroLibres').on('click', function(){
		var nombres = $('#param_nombres2').val();
		var apellidos = $('#param_apellidos2').val();
		var dni = $('#param_dni2').val();
		var email = $('#param_email2').val();
		var telefono = $('#param_telefono2').val();
		if (nombres.length == '' || apellidos.length == '' || dni.length == '' || email.length == '' || telefono.length == '') {
			$("#error2").hide();
            $("#error2").html('<p>Advertencia: Ingrese todos los datos requeridos.</p>').show(500).delay(5500).hide(200);
		} else {
			if (!(/^\d{8}$/.test(dni))) {
                $("#error2").hide();
            	$("#error2").html('<p>Advertencia: El Dni debe tener 8 digitos.</p>').show(500).delay(5500).hide(200);
            } else {
            	if (!(/\S+@\S+\.\S+/.test(email))) {
               		$("#error2").hide();
            		$("#error2").html('<p>Advertencia: El Email tiene un formato incorrecto.</p>').show(500).delay(2500).hide(200);
            	} else {
            		$.ajax({
						type: 'POST',
						data: $('#frmRegistroLibre').serialize(),  
						url: 'Controller/control_alumnos.php',
						success: function(data){
							if (data == 1) {			
			                	//$("#exito2").hide();
			                    //$("#exito2").html('<p>Registro Correcto</p>').show();          		                
			                    bootbox.dialog({
								  message: "Usted ha sido registrado correctamente. En unos dias nos estaremos comunicando.",
								  title: "ÉXITO",
								  buttons: {
								    success: {
								      label: "Aceptar",
								      className: "btn-success",
								      callback: function() {
								        location.href='clientes.html';
								      }
								    }
								  }
								});  
								$('#param_nombres2').val('');		
			                    $('#param_apellidos2').val('');		
			                    $('#param_dni2').val('');		
			                    $('#param_direccion2').val('');		
			                    $('#param_email2').val('');		
			                    $('#param_telefono2').val('');		                   
			                    $("#param_automaquillaje").prop("checked", "");
			                    $("#param_peinados").prop("checked", "");           	
							}
						}
					});
            	}
            	
            }
		}
	});

	$('#registroInicial').on('click', function(){
		//alert('Do');	
		var nombres = $('#param_nombres').val();
		var apellidos = $('#param_apellidos').val();
		var dni = $('#param_dni').val();
		var email = $('#param_email').val();
		var telefono = $('#param_telefono').val();

		if (nombres.length == '' || apellidos.length == '' || dni.length == '' || email.length == '' || telefono.length == '') {
			$("#error").hide();
            $("#error").html('<p>Advertencia: Ingrese todos los datos requeridos.</p>').show(500).delay(2500).hide(200);
		} else {
			if (!(/^\d{8}$/.test(dni))) {
                $("#error").hide();
            	$("#error").html('<p>Advertencia: El Dni debe tener 8 digitos.</p>').show(500).delay(2500).hide(200);
            } else {
            	if (!(/\S+@\S+\.\S+/.test(email))) {
               		$("#error").hide();
            		$("#error").html('<p>Advertencia: El Email tiene un formato incorrecto.</p>').show(500).delay(2500).hide(200);
            	} else {
            		$.ajax({
						type: 'POST',
						data: $('#frmRegistroInicial').serialize(),  
						url: 'Controller/control_alumnos.php',
						success: function(data){
							if (data == 1) {			
				            	//$("#exito").hide();
				                //$("#exito").html('<p>Registro Correcto</p>').show();  				                
				                bootbox.dialog({
								  message: "Usted ha sido registrado correctamente. En unos dias nos estaremos comunicando",
								  title: "ÉXITO",
								  buttons: {
								    success: {
								      label: "Aceptar",
								      className: "btn-success",
								      callback: function() {
								        location.href='formacion.html';
								      }
								    }	
								  }
								}); 
								$('#param_nombres').val('');		
				                $('#param_apellidos').val('');		
				                $('#param_dni').val('');		
				                $('#param_direccion').val('');		
				                $('#param_email').val('');		
				                $('#param_telefono').val('');						                           
							}
						}
					});
            	}
            	
            }			
		}
	});

	$('#registroEgresados').on('click', function(){
		//alert('Do');	
		var nombres = $('#param_nombres').val();
		var apellidos = $('#param_apellidos').val();
		var dni = $('#param_dni').val();
		var email = $('#param_email').val();
		var telefono = $('#param_telefono').val();

		if (nombres.length == '' || apellidos.length == '' || dni.length == '' || email.length == '' || telefono.length == '') {
			$("#error").hide();
            $("#error").html('<p>Advertencia: Ingrese todos los datos requeridos.</p>').show(500).delay(2500).hide(200);
		} else {
			if (!(/^\d{8}$/.test(dni))) {
                $("#error").hide();
            	$("#error").html('<p>Advertencia: El Dni debe tener 8 digitos.</p>').show(500).delay(2500).hide(200);
            } else {
            	if (!(/\S+@\S+\.\S+/.test(email))) {
               		$("#error").hide();
            		$("#error").html('<p>Advertencia: El Email tiene un formato incorrecto.</p>').show(500).delay(2500).hide(200);
            	} else {
            		$.ajax({
						type: 'POST',
						data: $('#frmRegistroEgresados').serialize(),  
						url: 'Controller/control_alumnos.php',
						success: function(data){
							if (data == 1) {			
				            	//$("#exito").hide();
				                //$("#exito").html('<p>Registro Correcto</p>').show();  				                
				                bootbox.dialog({
								  message: "Usted ha sido registrado correctamente. En unos dias nos estaremos comunicando",
								  title: "ÉXITO",
								  buttons: {
								    success: {
								      label: "Aceptar",
								      className: "btn-success",
								      callback: function() {
								        location.href='egresados.html';
								      }
								    }	
								  }
								}); 
								$('#param_nombres').val('');		
				                $('#param_apellidos').val('');		
				                $('#param_dni').val('');		
				                $('#param_direccion').val('');		
				                $('#param_email').val('');		
				                $('#param_telefono').val('');						                           
							}
						}
					});
            	}
            	
            }			
		}
	});

	$('#registroCharlas').on('click', function(){
		//alert('Do');	
		var nombres = $('#param_nombres').val();
		var apellidos = $('#param_apellidos').val();
		var dni = $('#param_dni').val();
		var email = $('#param_email').val();
		var telefono = $('#param_telefono').val();		

		if (nombres.length == '' || apellidos.length == '' || dni.length == '' || email.length == '' || telefono.length == '') {
			$("#error").hide();
            $("#error").html('<p>Advertencia: Ingrese todos los datos requeridos.</p>').show(500).delay(2500).hide(200);
		} else {
			if (!(/^\d{8}$/.test(dni))) {
                $("#error").hide();
            	$("#error").html('<p>Advertencia: El Dni debe tener 8 digitos.</p>').show(500).delay(2500).hide(200);
            } else {
            	if (!(/\S+@\S+\.\S+/.test(email))) {
               		$("#error").hide();
            		$("#error").html('<p>Advertencia: El Email tiene un formato incorrecto.</p>').show(500).delay(2500).hide(200);
            	} else {
            		$.ajax({
						type: 'POST',
						data: $('#frmRegistroCharlas').serialize(),  
						url: 'Controller/control_alumnos.php',
						success: function(data){
							if (data == 1) {			
				            	//$("#exito").hide();
				                //$("#exito").html('<p>Registro Correcto</p>').show();  				                
				                bootbox.dialog({
								  message: "Usted ha sido registrado correctamente. En unos dias nos estaremos comunicando",
								  title: "ÉXITO",
								  buttons: {
								    success: {
								      label: "Aceptar",
								      className: "btn-success",
								      callback: function() {
								        location.href='workshop.html';
								      }
								    }	
								  }
								}); 
								$('#param_nombres').val('');		
				                $('#param_apellidos').val('');		
				                $('#param_dni').val('');		
				                $('#param_direccion').val('');		
				                $('#param_email').val('');		
				                $('#param_telefono').val('');		
				                $('#param_empresa').val('');		
				                $('#param_cargo').val('');	
				                $("#param_capilar").prop("checked", "");
				                $("#param_corte").prop("checked", "");
				                $("#param_acabadoPerfecto").prop("checked", "");
				                $("#param_maquillaje").prop("checked", "");            	
							}
						}
					});
            	}
            	
            }			
		}
	});


});


/*SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) AS Nombres, P.PER_dni AS DNI, P.PER_email as Email, 
P.PER_direccion as Dirección, AL.LIB_automaquillaje as Maquillaje, AL.LIB_peinados as Peinados, ' ' as Capilar, 
' ' as Corte, ' ' as Maquillaje_Profesional, ' ' as Acabado_Perfecto FROM alumno_libre AL INNER JOIN persona P 
ON P.PER_id = AL.PER_id UNION SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) AS Nombres, P.PER_dni AS DNI, P.PER_email as Email, 
P.PER_direccion as Dirección, ' ' as Maquillaje, ' ' as Peinados, AP.PRO_capilar as Capilar, AP.PRO_corte as Corte, 
AP.PRO_maquillaje as Maquillaje_Profesional, AP.PRO_acabadoPerfecto as Acabado_Perfecto FROM alumno_profesional AP 
INNER JOIN persona P ON P.PER_id = AP.PER_id */