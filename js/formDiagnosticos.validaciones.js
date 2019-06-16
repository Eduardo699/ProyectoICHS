var con = 0;
var fechaAsignacion = false;
var fechaCierre = false;
var diagnostico = false;
var solucion = false;
var idTecnico = false;
var idTicket = false;
var idCategoria = false;
var estadoDiagnostico = false;

var anioMax = 0;
var anioMin = 0;

$(document).ready(function(){
	colocarFechaMaxMin();
		//Llamada al evento submit del formulario

	$("#txtFechaAsignacion").change(function(){
		var min = $("#txtFechaAsignacion").val();
		$("#txtFechaCierre").prop('disabled',false);
		$("#txtFechaCierre").attr('min',min);
	});

	$("#formDiagnosticos").submit(function(){
		validarEstadoDiagnostico();
		validarIdCategoria();
		validarIdTicket();
		validarIdTecnico();
		validarSolucion();
		validarDiagnostico();
		validarFechaCierre();
		validarFechaAsignacion();
		con++;
		if(fechaAsignacion == false || fechaCierre == false || diagnostico==false || solucion==false || idTecnico==false || idTicket==false || idCategoria==false || estadoDiagnostico==false){
			return false;
		}
	});

	//Llamada a evento de liberacion de tecla de la caja de texto #nombreCompleto
	$("#txtFechaAsignacion").change(function(){
			if(con>0){
				validarFechaAsignacion();
			}
		});

	$("#txtFechaCierre").change(function(){
			if(con>0){
				validarFechaCierre();
			}
		});

	$("#txtDiagnostico").keyup(function(){
		if(con>0){
			validarDiagnostico();
		}
	});

	$("#txtSolucion").keyup(function(){
		if(con>0){
			validarSolucion();
		}
	});

	$("#cmbIdTecnico").change(function(){
		if(con>0){
			validarIdTecnico();
		}
	});

	$("#cmbIdTicket").change(function(){
		if(con>0){
			validarIdTicket();
		}
	});

	$("#cmbIdCategoria").change(function(){
		if(con>0){
			validarIdCategoria();
		}
	});

	$("#cmbEstadoDiagnostico").change(function(){
		if(con>0){
			validarEstadoDiagnostico();
		}
	});

	$("#resetear").click(resetear);

});

///////////////////////////////////////////////////
///////INICIAN FUNCIONES DE VALIDACION/////////////
///////////////////////////////////////////////////
	function validarFechaAsignacion(){
		var valor = $("#txtFechaAsignacion").val();
			if(valor!=""){
				if(valor.length==10){
					var aux = valor.substring(4,0);
					if(aux<anioMin || aux>anioMax){
						$("#txtFechaAsignacion").attr('class','form-control is-invalid');
						$("#mensajeFechaAsignacion").replaceWith("<div id='mensajeFechaAsignacion' class='invalid-feedback'><b>Por favor, ingrese un año existente en el rango de " + anioMin + " a " + anioMax + "(*)</b></di>");
						fechaAsignacion = false;
					}
					else{
						$("#txtFechaAsignacion").attr('class','form-control is-valid');
						$("#mensajeFechaAsignacion").replaceWith("<div id='mensajeFechaAsignacion' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
						fechaAsignacion = true;
					}	
				}
				else{
					$("#txtFechaAsignacion").attr('class','form-control is-invalid').focus();
					$("#mensajeFechaAsignacion").replaceWith("<div id='mensajeFechaAsignacion' class='invalid-feedback'><b>Por favor, rellene este campo completamente (*)</b></di>");
					fechaAsignacion = false;
				}
		}
		else{
			$("#txtFechaAsignacion").attr('class','form-control is-invalid').focus();
			$("#mensajeFechaAsignacion").replaceWith("<div id='mensajeFechaAsignacion' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			fechaAsignacion = false;
		}
	}


	function validarFechaCierre(){
		var valor = $("#txtFechaCierre").val();
			if(valor!=""){
				if(valor.length==10){
					var aux = valor.substring(4,0);
					if(aux<anioMin || aux>anioMax){
						$("#txtFechaCierre").attr('class','form-control is-invalid');
						$("#mensajeFechaCierre").replaceWith("<div id='mensajeFechaCierre' class='invalid-feedback'><b>Por favor, ingrese un año existente en el rango de " + anioMin + " a " + anioMax + "(*)</b></di>");
						fechaCierre = false;
					}
					else{
						$("#txtFechaCierre").attr('class','form-control is-valid');
						$("#mensajeFechaCierre").replaceWith("<div id='mensajeFechaCierre' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
						fechaCierre = true;
					}	
				}
				else{
					$("#txtFechaCierre").attr('class','form-control is-invalid').focus();
					$("#mensajeFechaCierre").replaceWith("<div id='mensajeFechaCierre' class='invalid-feedback'><b>Por favor, rellene este campo completamente (*)</b></di>");
					fechaCierre = false;
				}
		}
		else{
			$("#txtFechaCierre").attr('class','form-control is-invalid').focus();
			$("#mensajeFechaCierre").replaceWith("<div id='mensajeFechaCierre' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			fechaCierre = false;
		}
	}

	function validarDiagnostico(){
		var valor = $("#txtDiagnostico").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || aux==209 || aux==241 || aux==32 || aux==225 || aux==233 || aux==237 || aux==243 ||
				aux==250 || aux==193 || aux==201 || aux==205 || aux==218 || aux==44 || aux==46 || (aux>=48 && aux<=57)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtDiagnostico").attr('class','form-control is-invalid').focus();
				$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='invalid-feedback'><b>Por favor, solo introduzca letras, números y caracteres especiales ( .  , ) (*)</b></di>");
				diagnostico = false;
			}
			else{
				if(valor.length>=10 && valor.length<=200){
					$("#txtDiagnostico").attr('class','form-control is-valid');
					$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='valid-feedback'> Campo completado correctamente </di>");
					diagnostico = true;
				}
				else{
					$("#txtDiagnostico").attr('class','form-control is-invalid').focus();
					$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 10 - 200</b></di>");
					diagnostico = false;
				}
			}			
		}
		else{
			$("#txtDiagnostico").attr('class','form-control is-invalid').focus();
			$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			diagnostico = false;
		}
	}

	function validarSolucion(){
		var valor = $("#txtSolucion").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || aux==209 || aux==241 || aux==32 || aux==225 || aux==233 || aux==237 || aux==243 ||
				aux==250 || aux==193 || aux==201 || aux==205 || aux==218 || aux==44 || aux==46 || (aux>=48 && aux<=57)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtSolucion").attr('class','form-control is-invalid').focus();
				$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='invalid-feedback'><b>Por favor, solo introduzca letras, números y caracteres especiales ( .  , ) (*)</b></di>");
				solucion = false;
			}
			else{
				if(valor.length>=10 && valor.length<=200){
					$("#txtSolucion").attr('class','form-control is-valid');
					$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='valid-feedback'> Campo completado correctamente </di>");
					solucion = true;
				}
				else{
					$("#txtSolucion").attr('class','form-control is-invalid').focus();
					$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 10 - 200</b></di>");
					solucion = false;
				}
			}			
		}
		else{
			$("#txtSolucion").attr('class','form-control is-invalid').focus();
			$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			solucion = false;
		}
	}

	function validarIdTecnico(){
		var valor = $("#cmbIdTecnico").val();
		if(valor==null){
			$("#cmbIdTecnico").attr('class','custom-select is-invalid').focus();
			$("#mensajeIdTecnico").replaceWith("<div id='mensajeIdTecnico' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			idTecnico = false;
		}
		else{
			$("#cmbIdTecnico").attr('class','custom-select is-valid');
			$("#mensajeIdTecnico").replaceWith("<div id='mensajeIdTecnico' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			idTecnico = true;
		}
	}

	function validarIdTicket(){
		var valor = $("#cmbIdTicket").val();
		if(valor==null){
			$("#cmbIdTicket").attr('class','custom-select is-invalid').focus();
			$("#mensajeIdTicket").replaceWith("<div id='mensajeIdTicket' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			idTicket = false;
		}
		else{
			$("#cmbIdTicket").attr('class','custom-select is-valid');
			$("#mensajeIdTicket").replaceWith("<div id='mensajeIdTicket' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			idTicket = true;
		}
	}

	function validarIdCategoria(){
		var valor = $("#cmbIdCategoria").val();
		if(valor==null){
			$("#cmbIdCategoria").attr('class','custom-select is-invalid').focus();
			$("#mensajeIdCategoria").replaceWith("<div id='mensajeIdCategoria' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			idCategoria = false;
		}
		else{
			$("#cmbIdCategoria").attr('class','custom-select is-valid');
			$("#mensajeIdCategoria").replaceWith("<div id='mensajeIdCategoria' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			idCategoria = true;
		}
	}

	function validarEstadoDiagnostico(){
		var valor = $("#cmbEstadoDiagnostico").val();
		if(valor==null){
			$("#cmbEstadoDiagnostico").attr('class','custom-select is-invalid').focus();
			$("#mensajeEstadoDiagnostico").replaceWith("<div id='mensajeEstadoDiagnostico' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			estadoDiagnostico = false;
		}
		else{
			$("#cmbEstadoDiagnostico").attr('class','custom-select is-valid');
			$("#mensajeEstadoDiagnostico").replaceWith("<div id='mensajeEstadoDiagnostico' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			estadoDiagnostico = true;
		}
	}

	function colocarFechaMaxMin(){
		var fechaMax;
		var fechaMin;

		var fecha = new Date();
		var anio = fecha.getFullYear();

		
		anioMax = anio + 31;
        anioMin = anioMax - 49;
		fechaMax = anioMax  + "-12-31";
		fechaMin = anioMin + "-01-01";

		
		$("#txtFechaAsignacion").attr('max',fechaMax);
		$("#txtFechaAsignacion").attr('min',fechaMin);

		$("#txtFechaCierre").attr('max',fechaMax);
		$("#txtFechaCierre").attr('min',fechaMin);

	}


	function resetear(){
		con = 0;
		$("#txtFechaAsignacion").attr('class','form-control');
		$("#txtFechaCierre").attr('class','form-control');
		$("#txtDiagnostico").attr('class','form-control');
		$("#txtSolucion").attr('class','form-control');
		$("#cmbIdTecnico").attr('class','custom-select');
		$("#cmbIdTicket").attr('class','custom-select');
		$("#cmbIdCategoria").attr('class','custom-select');
		$("#cmbEstadoDiagnostico").attr('class','custom-select');



		$("#mensajeFechaAsignacion").replaceWith("<div id='mensajeFechaAsignacion' class=''></di>");
		$("#mensajeFechaCierre").replaceWith("<div id='mensajeFechaCierre' class=''></di>");
		$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class=''></di>");
		$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class=''></di>");
		$("#mensajeIdTecnico").replaceWith("<div id='mensajeIdTecnico' class=''></di>");
		$("#mensajeIdTicket").replaceWith("<div id='mensajeIdTicket' class=''></di>");
		$("#mensajeIdCategoria").replaceWith("<div id='mensajeIdCategoria' class=''></di>");
		$("#mensajeEstadoDiagnostico").replaceWith("<div id='mensajeEstadoDiagnostico' class=''></di>");
	}