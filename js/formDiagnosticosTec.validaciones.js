var con = 0;
var diagnostico = false;
var solucion = false;
var idCategoria = false;
var estadoDiagnostico = false;

var anioMax = 0;
var anioMin = 0;

$(document).ready(function(){
	var s = $("#tipoC").val();
	var catS = $("#catS").val();

	$("#cmbOpcion").val(s);
	obtenerComponentesPrimera(s,catS);




	$("#formDiagnosticos").submit(function(){
		/*validarEstadoDiagnostico();
		validarIdCategoria();
		validarSolucion();
		validarDiagnostico();
		con++;
		if(diagnostico==false || solucion==false || idCategoria==false || estadoDiagnostico==false){
			return false;
		}*/
	});

	//Llamada a evento de liberacion de tecla de la caja de texto #nombreCompleto
	/*$("#txtDiagnostico").keyup(function(){
		if(con>0){
			validarDiagnostico();
		}
	});

	$("#txtSolucion").keyup(function(){
		if(con>0){
			validarSolucion();
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
	});*/
	$("#cmbOpcion").change(function(){
		var aux = $(this).val();
		obtenerComponentes(aux);
	});

	$("#resetear").click(resetear);

});

///////////////////////////////////////////////////
///////INICIAN FUNCIONES DE VALIDACION/////////////
///////////////////////////////////////////////////

	/*function validarDiagnostico(){
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
				if(valor.length>=1 && valor.length<=250){
					$("#txtDiagnostico").attr('class','form-control is-valid');
					$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='valid-feedback'> Campo completado correctamente </di>");
					diagnostico = true;
				}
				else{
					$("#txtDiagnostico").attr('class','form-control is-invalid').focus();
					$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='invalid-feedback'><b>Este campo no debe quedar vacio (maximo 250 Caracteres)</b></di>");
					diagnostico = false;
				}
			}			
		}
		else{
			$("#txtDiagnostico").attr('class','form-control is-invalid').focus();
			$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class='invalid-feedback'><b>Por favor, rellene este campo (Maximo 250 Caracteres)</b></di>");
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
				if(valor.length>=1 && valor.length<=250){
					$("#txtSolucion").attr('class','form-control is-valid');
					$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='valid-feedback'> Campo completado correctamente </di>");
					solucion = true;
				}
				else{
					$("#txtSolucion").attr('class','form-control is-invalid').focus();
					$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='invalid-feedback'><b>Este campo no debe quedar vacio (maximo 250 Caracteres)</b></di>");
					solucion = false;
				}
			}			
		}
		else{
			$("#txtSolucion").attr('class','form-control is-invalid').focus();
			$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class='invalid-feedback'><b>Por favor, rellene este campo (Maximo 250 Caracteres)</b></di>");
			solucion = false;
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
	}*/

	function resetear(){
		con = 0;
		$("#txtDiagnostico").attr('class','form-control');
		$("#txtSolucion").attr('class','form-control');
		$("#cmbIdCategoria").attr('class','custom-select');
		$("#cmbEstadoDiagnostico").attr('class','custom-select');


		$("#mensajeDiagnostico").replaceWith("<div id='mensajeDiagnostico' class=''></di>");
		$("#mensajeSolucion").replaceWith("<div id='mensajeSolucion' class=''></di>");
		$("#mensajeIdCategoria").replaceWith("<div id='mensajeIdCategoria' class=''></di>");
		$("#mensajeEstadoDiagnostico").replaceWith("<div id='mensajeEstadoDiagnostico' class=''></di>");
	}


	function obtenerComponentes(valor){
		$.ajax({
			url: '../dao/DiagnosticosTec.dao.php',
			type: 'POST',
			data: {peticionC:1, tipo: valor},

		})
		.done(function(respuesta){
			let aux = JSON.parse(respuesta);
			var ids = [];
			var nombres = [];
			var salida = '<select id="cmbIdCategoria" name="idCategoria" class="custom-select">';
			for(var i=0;i<aux.length;i++){
				ids[i] = aux[i][0];
				nombres[i] = aux[i][1];
			}
			for(var i=0; i<ids.length;i++){
				salida+= '<option value='+ ids[i] + '>' + nombres[i] + '</option>';
			}
			salida+='</select>';
			$("#cmbIdCategoria").replaceWith(salida);

		})
		.fail(function(){
			console.log("Error");
		});
	}

	function obtenerComponentesPrimera(valor,id){
		$.ajax({
			url: '../dao/DiagnosticosTec.dao.php',
			type: 'POST',
			data: {peticionC:1, tipo: valor},

		})
		.done(function(respuesta){
			let aux = JSON.parse(respuesta);
			var ids = [];
			var nombres = [];
			var salida = '<select id="cmbIdCategoria" name="idCategoria" class="custom-select">';
			for(var i=0;i<aux.length;i++){
				ids[i] = aux[i][0];
				nombres[i] = aux[i][1];
			}
			for(var i=0; i<ids.length;i++){
				if(ids[i]==id){
					salida+= '<option selected value='+ ids[i] + '>' + nombres[i] + '</option>';
				}
				else{
					salida+= '<option value='+ ids[i] + '>' + nombres[i] + '</option>';
				}
				
			}
			salida+='</select>';
			$("#cmbIdCategoria").replaceWith(salida);

		})
		.fail(function(){
			console.log("Error");
		});
	}