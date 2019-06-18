var con = 0;
var contraAnterior = false;
var contra = false;
var confirmarContra = false;
var avatar = false;

$(document).ready(function(){

	$("#formUsuarios").submit(function(){
		validarAvatar();
		validarConfirmarContra();
		validarContra();	
		validarContraAnterior();			
		
		con++;
		if(contraAnterior==false || contra==false|| confirmarContra==false|| avatar==false){
			return false;
		}
	});

	//Llamada al evento de liberacion de tecla de la caja de texto #nombre
	$("#txtContraAnterior").keyup(function(){
		if(con>0){
			validarContraAnterior();
		}
	});

	$("#txtPassword").keyup(function(){
		if(con>0){
			validarContra();
		}
	});

	$("#txtConfirmPassword").keyup(function(){
		if(con>0){
			validarConfirmarContra();
		}
	});

	$("#avatar").change(function(){
		if(con>0){
			validarAvatar();
		}
	});

	$("#resetear").click(resetear);

});


	/////////////// FUNCIONES PARA VALIDAR ///////////////
	function validarContraAnterior(){
		var valor = $("#txtContraAnterior").val();
		//var valor2 = $("#passwordAnterior1").val();
		//&& valor == valor2
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux>=48 && aux<=57)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtContraAnterior").attr('class','form-control is-invalid').focus();
				$("#mensajeContraAnterior").replaceWith("<div id='mensajeContraAnterior' class='invalid-feedback'><b>Por favor, solo introduzca letras o números (*)</b></di>");
				contraAnterior = false;
			}
			else{
				if(valor.length>=5 && valor.length<=30){
					$("#txtContraAnterior").attr('class','form-control is-valid');
					$("#mensajeContraAnterior").replaceWith("<div id='mensajeContraAnterior' class='valid-feedback'> Campo completado correctamente </di>");
					contraAnterior = true;
					
				}
				else{
					$("#txtContraAnterior").attr('class','form-control is-invalid').focus();
					$("#mensajeContraAnterior").replaceWith("<div id='mensajeContraAnterior' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 5 - 30</b></di>");
					contraAnterior = false;
				}
			}			
		}
		else{
			$("#txtContraAnterior").attr('class','form-control is-invalid').focus();
			$("#mensajeContraAnterior").replaceWith("<div id='mensajeContraAnterior' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			contraAnterior = false;
		}
	}


	function validarContra(){
		var valor = $("#txtPassword").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux>=48 && aux<=57)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtPassword").attr('class','form-control is-invalid').focus();
				$("#mensajePassword").replaceWith("<div id='mensajePassword' class='invalid-feedback'><b>Por favor, solo introduzca letras o números (*)</b></di>");
				contra = false;
			}
			else{
				if(valor.length>=5 && valor.length<=30){
					$("#txtPassword").attr('class','form-control is-valid');
					$("#mensajePassword").replaceWith("<div id='mensajePassword' class='valid-feedback'> Campo completado correctamente </di>");
					contra = true;
				}
				else{
					$("#txtPassword").attr('class','form-control is-invalid').focus();
					$("#mensajePassword").replaceWith("<div id='mensajePassword' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 5 - 30</b></di>");
					contra = false;
				}
			}			
		}
		else{
			$("#txtPassword").attr('class','form-control is-invalid').focus();
			$("#mensajePassword").replaceWith("<div id='mensajePassword' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			contra = false;
		}
	}

	function validarConfirmarContra(){
		var valor = $("#txtConfirmPassword").val();
		var valor2 = $("#txtPassword").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux>=48 && aux<=57)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtConfirmPassword").attr('class','form-control is-invalid').focus();
				$("#mensajeConfirmPassword").replaceWith("<div id='mensajeConfirmPassword' class='invalid-feedback'><b>Por favor, solo introduzca letras o números (*)</b></di>");
				confirmarContra = false;
			}
			else{
				if(valor.length>=5 && valor.length<=30){
					if(valor == valor2){
					$("#txtConfirmPassword").attr('class','form-control is-valid');
					$("#mensajeConfirmPassword").replaceWith("<div id='mensajeConfirmPassword' class='valid-feedback'> Las constraseñas coinciden y son correctas :) </di>");
					confirmarContra = true;
					}
					else{
						$("#txtConfirmPassword").attr('class','form-control is-invalid').focus();
						$("#mensajeConfirmPassword").replaceWith("<div id='mensajeConfirmPassword' class='invalid-feedback'><b>La constraseñas no coinciden </b></di>");
						confirmarContra = false;
					}
					
				}
				else{
					$("#txtConfirmPassword").attr('class','form-control is-invalid').focus();
					$("#mensajeConfirmPassword").replaceWith("<div id='mensajeConfirmPassword' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 5 - 30</b></di>");
					confirmarContra = false;
				}
			}			
		}
		else{
			$("#txtConfirmPassword").attr('class','form-control is-invalid').focus();
			$("#mensajeConfirmPassword").replaceWith("<div id='mensajeConfirmPassword' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			confirmarContra = false;
		}
	}


	function validarAvatar(){
		var valor = $("#avatar").val();
		if(valor==null){
			$("#avatar").attr('class','custom-select is-invalid').focus();
			$("#mensajeAvatar").replaceWith("<div id='mensajeAvatar' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			avatar = false;
		}
		else{
			$("#avatar").attr('class','custom-select is-valid');
			$("#mensajeAvatar").replaceWith("<div id='mensajeAvatar' class='invalid-feedback'><b>Campo completado correctamente </b></di>");
			avatar = true;
		}
	}

	function resetear(){
		con = 0;
		$("#txtContraAnterior").attr('class','custom-select');
		$("#txtPassword").attr('class','custom-select');
		$("#txtConfirmPassword").attr('class','form-control');
		$("#avatar").attr('class','custom-select');

		$("#mensajeContraAnterior").replaceWith("<div id='mensajeContraAnterior' class=''></di>");
		$("#mensajePassword").replaceWith("<div id='mensajePassword' class=''></di>");
		$("#mensajeConfirmPassword").replaceWith("<div id='mensajeConfirmPassword' class=''></di>");
		$("#mensajeAvatar").replaceWith("<div id='mensajeAvatar' class=''></di>");
	}