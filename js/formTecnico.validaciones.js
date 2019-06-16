var con = 0;
var nombre1 = false;
var nombre2 = false;
var nombre3 = false;
var nombre4 = false;
var direccion = false;
var telefono = false;
var dui = false;
var espe = false;
var fecha = false;
var usuario = false;


$(document).ready(function(){

	$("#formTecnicos").submit(function(){

		validarNombre();
		validarNombre1();
		validarNombre2();
		validarNombre3();
		validarDireccion();
		validarTelefono();
		validarDui();
		validarEspecialidad();
		validarFecha();
		validarUsuario();

		con++;
		if(nombre1==false || nombre2 == false || nombre3 == false || nombre4 == false || direccion == false || telefono == false || dui == false || espe == false || fecha == false || usuario == false){
			return false;
		}
	});


	$("#txtNombre1").keyup(function(){
		if(con>0){
			validarNombre();
		}
	});

	$("#txtNombre2").keyup(function(){
		if(con>0){
			validarNombre1();
		}
	});

	$("#txtApellido1").keyup(function(){
		if(con>0){
			validarNombre2();
		}
	});

	$("#txtApellido2").keyup(function(){
		if(con>0){
			validarNombre3();
		}
	});

	$("#txtDireccion").keyup(function(){
		if(con>0){
			validarDireccion();
		}
	});

	$("#txtTelefono").keyup(function(){
		if(con>0){
			validarTelefono();
		}
	});

	$("#txtDui").keyup(function(){
		if(con>0){
			validarDui();
		}
	});

	$("#txtEspecialidad").keyup(function(){
		if(con>0){
			validarEspecialidad();
		}
	});

	$("#txtFecha").change(function(){
		if(con>0){
			validarFecha();
		}
	});

	$("#usuarioC").change(function(){
		if(con>0){
			validarUsuario();
		}
	});

	});


function validarNombre(){
		var valor = $("#txtNombre1").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==233)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtNombre1").attr('class','form-control is-invalid').focus();
				$("#mensajeNombre1").replaceWith("<div id='mensajeNombre1' class='invalid-feedback'><b>Por favor, solo introduzca letras sin espacios (*)</b></di>");
				nombre1 = false;
			}
			else{
				if(valor.length>=3 && valor.length<=20){
					$("#txtNombre1").attr('class','form-control is-valid');
					$("#mensajeNombre1").replaceWith("<div id='mensajeNombre1' class='valid-feedback'><b>Campo completado correctamente</b></di>");
					nombre1 = true;
				}
				else{
					$("#txtNombre1").attr('class','form-control is-invalid').focus();
					$("#mensajeNombre1").replaceWith("<div id='mensajeNombre1' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 3 - 20</b></di>");
					nombre1 = false;
				}
			}			
		}
		else{
			$("#txtNombre1").attr('class','form-control is-invalid').focus();
			$("#mensajeNombre1").replaceWith("<div id='mensajeNombre1' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre1 = false;
		}
	}


		function validarNombre1(){
		var valor = $("#txtNombre2").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==233)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtNombre2").attr('class','form-control is-invalid').focus();
				$("#mensajeNombre2").replaceWith("<div id='mensajeNombre2' class='invalid-feedback'><b>Por favor, solo introduzca letras sin espacios (*)</b></di>");
				nombre2 = false;
			}
			else{
				if(valor.length>=3 && valor.length<=20){
					$("#txtNombre2").attr('class','form-control is-valid');
					$("#mensajeNombre2").replaceWith("<div id='mensajeNombre2' class='valid-feedback'><b>Campo completado correctamente</b></di>");
					nombre2 = true;
				}
				else{
					$("#txtNombre2").attr('class','form-control is-invalid').focus();
					$("#mensajeNombre2").replaceWith("<div id='mensajeNombre2' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 3 - 20</b></di>");
					nombre2 = false;
				}
			}			
		}
		else{
			$("#txtNombre2").attr('class','form-control is-invalid').focus();
			$("#mensajeNombre2").replaceWith("<div id='mensajeNombre2' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre2 = false;
		}
	}

	function validarNombre2(){
		var valor = $("#txtApellido1").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==233)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtApellido1").attr('class','form-control is-invalid').focus();
				$("#mensajeNombre3").replaceWith("<div id='mensajeNombre3' class='invalid-feedback'><b>Por favor, solo introduzca letras sin espacios (*)</b></di>");
				nombre3 = false;
			}
			else{
				if(valor.length>=3 && valor.length<=20){
					$("#txtApellido1").attr('class','form-control is-valid');
					$("#mensajeNombre3").replaceWith("<div id='mensajeNombre3' class='valid-feedback'><b>Campo completado correctamente</b></di>");
					nombre3 = true;
				}
				else{
					$("#txtApellido1").attr('class','form-control is-invalid').focus();
					$("#mensajeNombre3").replaceWith("<div id='mensajeNombre3' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 3 - 20</b></di>");
					nombre3 = false;
				}
			}			
		}
		else{
			$("#txtApellido1").attr('class','form-control is-invalid').focus();
			$("#mensajeNombre3").replaceWith("<div id='mensajeNombre3' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre3 = false;
		}
	}
	

	function validarNombre3(){
		var valor = $("#txtApellido2").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==233)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtApellido2").attr('class','form-control is-invalid').focus();
				$("#mensajeNombre4").replaceWith("<div id='mensajeNombre4' class='invalid-feedback'><b>Por favor, solo introduzca letras sin espacios (*)</b></di>");
				nombre4 = false;
			}
			else{
				if(valor.length>=3 && valor.length<=20){
					$("#txtApellido2").attr('class','form-control is-valid');
					$("#mensajeNombre4").replaceWith("<div id='mensajeNombre4' class='valid-feedback'><b>Campo completado correctamente</b></di>");
					nombre4 = true;
				}
				else{
					$("#txtApellido2").attr('class','form-control is-invalid').focus();
					$("#mensajeNombre4").replaceWith("<div id='mensajeNombre4' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 3 - 20</b></di>");
					nombre4 = false;
				}
			}			
		}
		else{
			$("#txtApellido2").attr('class','form-control is-invalid').focus();
			$("#mensajeNombre4").replaceWith("<div id='mensajeNombre4' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre4 = false;
		}
	}

	function validarDireccion(){
		var valor = $("#txtDireccion").val();
		if(valor!=""){
			
			
				if(valor.length>=10 && valor.length<=150){
					$("#txtDireccion").attr('class','form-control is-valid');
					$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
					direccion = true;
				}
				else{
					$("#txtDireccion").attr('class','form-control is-invalid').focus();
					$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 10 - 150</b></di>");
					direccion = false;
				}
						
		}
		else{
			$("#txtDireccion").attr('class','form-control is-invalid').focus();
			$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			direccion = false;
		}
	}

		function validarTelefono(){
		var valor = $("#txtTelefono").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=48 && aux<=57) || (aux==45)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtTelefono").attr('class','form-control is-invalid').focus();
				$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='invalid-feedback'><b>Por favor, solo introduzca números sin espacios (*)</b></di>");
				nombre2 = false;
			}
			else{
				if(valor.length==9){
					$("#txtTelefono").attr('class','form-control is-valid');
					$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='valid-feedback'><b>Campo completado correctamente</b></di>");
					nombre2 = true;
				}
				else{
					$("#txtTelefono").attr('class','form-control is-invalid').focus();
					$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='invalid-feedback'><b>Por favor, Introduzca los primeros 4 números y separelos del siguiente grupo con un guión</b></di>");
					nombre2 = false;
				}
			}			
		}
		else{
			$("#txtTelefono").attr('class','form-control is-invalid').focus();
			$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre2 = false;
		}
	}

	function validarDui(){
		var valor = $("#txtDui").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=48 && aux<=57) || (aux==45)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtDui").attr('class','form-control is-invalid').focus();
				$("#mensajeDui").replaceWith("<div id='mensajeDui' class='invalid-feedback'><b>Por favor, solo introduzca números sin espacios (*)</b></di>");
				dui = false;
			}
			else{
				if(valor.length==10){
					$("#txtDui").attr('class','form-control is-valid');
					$("#mensajeDui").replaceWith("<div id='mensajeDui' class='valid-feedback'><b>Campo completado correctamente</b></di>");
					dui = true;
				}
				else{
					$("#txtDui").attr('class','form-control is-invalid').focus();
					$("#mensajeDui").replaceWith("<div id='mensajeDui' class='invalid-feedback'><b>Por favor, Introduzca el formato correcto del DUI</b></di>");
					dui = false;
				}
			}			
		}
		else{
			$("#txtDui").attr('class','form-control is-invalid').focus();
			$("#mensajeDui").replaceWith("<div id='mensajeDui' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			dui = false;
		}
	}

	function validarEspecialidad(){
		var valor = $("#txtEspecialidad").val();
		if(valor!=""){
			
			
				if(valor.length<=8){
					$("#txtEspecialidad").attr('class','form-control is-valid');
					$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
					espe = true;
				}
				else{
					$("#txtEspecialidad").attr('class','form-control is-invalid').focus();
					$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='invalid-feedback'><b>Por favor, Introduzca no mas de 8 caracteres</b></di>");
					espe = false;
				}
						
		}
		else{
			$("#txtEspecialidad").attr('class','form-control is-invalid').focus();
			$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
		espe = false;
		}
	}

	function validarFecha(){
		var valor = $("#txtFecha").val();
		if(valor!=""){
			$("#txtFecha").attr('class','custom-select is-valid');
			$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			fecha = true;
			
			
		}
		else{
			$("#txtFecha").attr('class','custom-select is-invalid').focus();
			$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class='invalid-feedback'><b>Por favor, seleccione una opción (*)</b></di>");
			fecha = false;
		}
	}

	function validarUsuario(){
		var valor = $("#usuarioC").val();
		if(valor!=""){
			$("#usuarioC").attr('class','custom-select is-valid');
			$("#mensajeUsuario").replaceWith("<div id='mensajeUsuario' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			usuario = true;
			
			
		}
		else{
			$("#usuarioC").attr('class','custom-select is-invalid').focus();
			$("#mensajeUsuario").replaceWith("<div id='mensajeUsuario' class='invalid-feedback'><b>Por favor, seleccione una opción (*)</b></di>");
			usuario = false;
		}
	}