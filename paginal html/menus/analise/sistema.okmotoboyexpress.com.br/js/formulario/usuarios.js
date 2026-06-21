$(document).ready(function(){

	var form		=	$('#form_cadastro');
	var senha		=	$("#usu_senha");
	var senha2		=	$("#usu_senha2");
	var infoSenha	=	$('#info-senha');

	senha.blur(validaSenha);
	senha2.blur(validaSenha2);

	$('.usu_altera_senha').on('change', function(){				
		if($('input[name=usu_altera_senha]:checked').val()=='s'){			
			
			$("#alterar_senha").slideDown();			
		}else{
			$("#alterar_senha").slideUp();			
		}			
	});	

	$("#cancelar-senha").click(function(){
		$("#alterar_senha").slideUp();	
		LimparFormulario("senha");
	});		
	
	$("#alterar-senha").click(function(){
				
		var senha = $("#usu_senha").val();	
		var csenha = $("#usu_senha2").val();	
		alert("1");
		if(senha==csenha){
			var id 			= 		$("#usu_id").val();
			var senha 		= 		$("#usu_senha").val();
		alert("2");		
		
				$.ajax({
						url : $("#host").val()+'altera_senha_usuario.php',
						data : { 	tipo			:	'alterar', 
									opcao 			: 	'senha',							
									id 				: 	id, 
									senha 			: 	senha 
								},
						type : 'POST',
						dataType : 'json',
						success : function(json){
alert("3");
						//	$("#alterar_senha").slideUp();	
						//	LimparFormulario("senha");
						//	location.reload();
						}
				});	

console.log($("#host").val()+'altera_senha_usuario.php');
			return false;	
		}else{
			
			alert("Senhas não conferem!");
			return false;
			
		}					
	});		
    $(".btn-excluir").click(function(){
      ConfirmarExclusao($(this).attr('data-id',));	
	});	


	function validaSenha(){
		var	campo	=	senha;
		var	info	=	infoSenha;
		if(campo.val() == ''){
			info.text('Por favor Preencha o campo senha!');
			$("#alert-senha").show();
			return false;
		}else if(campo.val().length < 6){
			info.addClass('errado');
			info.text('A senha deve conter no m\u00ednimo 6 caracteres');
			$("#alert-senha").show();
			return false;
		}else{
			$("#alert-senha").hide();
			info.text('');
			return true;
		}
	}
	
	function validaSenha2(){
		var	campo1	=	senha;
		var	campo	=	senha2;
		var	info	=	infoSenha;

		if(campo.val() == ''){
			info.text('Por favor Preencha o campo senha!');
			$("#alert-senha").show();
			return false;
		}else if(campo.val().length < 6){
			info.addClass('errado');
			info.text('A senha deve conter no m\u00ednimo 6 caracteres');
			$("#alert-senha").show();
			return false;
		}else if(campo.val() != campo1.val()){
			info.text('As senhas n\u00e3o s\u00e3o iguais');
			$("#alert-senha").show();
			return false;
		}else{
			$("#alert-senha").hide();
			return true;
		}
	}
	
//fim do ready	
});		
	
function LimparFormulario(tipo){
	
	switch(tipo){
			case 'senha':
						$("#usu_senha").val('');
						$("#usu_csenha").val('');
						break;					
	}
}	


function ConfirmarExclusao(valor){

  $( "#dialog-excluir" ).dialog({
	modal: true,
	minWidth: 500,
	buttons: {

		Cancelar: function() {
		  $( this ).dialog( "close" );
		},
		Confirmar: function() {
		  
		  window.location.href = $("#pagina_base").val()+"usuarios/excluir/"+valor;
		  
		  $( this ).dialog( "close" );
		  location.reload();
		}

	}
  });
}
		
