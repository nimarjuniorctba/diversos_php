$(document).ready(function(){


	$('.adm_altera_senha').on('change', function(){
		
		
		if($('input[name=adm_altera_senha]:checked').val()=='s'){			
			
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
	var senha = $("#adm_senha").val();	
	var csenha = $("#adm_csenha").val();	
	if(senha==csenha){
			var id 			= 		$("#adm_id").val();
			var senha 		= 		$("#adm_senha").val();
			
				$.ajax({
						url : $("#host").val()+'altera_senha_usuario.php',
						data : { 	tipo			:	'alterar-admin', 
									opcao 			: 	'senha',							
									id 				: 	id, 
									senha 			: 	senha 
								},
						type : 'POST',
						dataType : 'json',
						success : function(json){
						//	$("#alterar_senha").slideUp();	
						//	LimparFormulario("senha");
						//	location.reload();
						}
				});				
			
		}else{
			
			alert("Senhas não conferem!");
			return false;
			
		}	
		
	});	
	
	
    $(".btn-excluir").click(function(){
      ConfirmarExclusao($(this).attr('data-id',));	
	});		
	
});		


	
	
function LimparFormulario(tipo){
	
	switch(tipo){
			case 'senha':
						$("#adm_senha").val('');
						$("#adm_csenha").val('');
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
		  
		  window.location.href = $("#pagina_base").val()+"administradores/excluir/"+valor;
		  
		  $( this ).dialog( "close" );
		}

	}
  });
}
		
