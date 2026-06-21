$(document).ready(function(){


	var form					=	$("#form");
	
	
	$(".meu_tipo_cad").change(function(){
		if($(".meu_tipo_cad:checked").val()=='f'){
			$("#fisico").show();	
			$("#juridico").hide();	
		}else{
			$("#fisico").hide();	
			$("#juridico").show();	
		}		
	});	
	
	
    $(".btn-excluir").click(function(){
      ConfirmarExclusao($(this).attr('data-id',));	
	});		
	
});		

	$("#busca-cep").click(function(){
		BuscaCep();		
	});	
	   
  	function BuscaCep(){	//	alert('ads');
		var cep =	$('#emp_cep');	
		if(cep.val().length==8){
			$.get("https://viacep.com.br/ws/" + cep.val() + "/json/", function(resposta) {
				
				if (!resposta.erro) {
					var logradouro = resposta.logradouro;
					var bairro = resposta.bairro;
					var uf = resposta.uf;
					
					$("#emp_cep").removeClass("errado");					
					$("input#emp_rua").val( resposta.logradouro ).removeClass("errado");
					$("input#emp_bairro").val( resposta.bairro ).removeClass("errado");
					$("input#emp_cidade").val( resposta.localidade ).removeClass("errado");
					$("input#emp_estado").val( resposta.uf ).removeClass("errado");
					
				} else {
					$('#emp_rua').attr({ value: '' }).removeClass("certo").addClass("errado");
					$('#emp_bairro').attr({ value: '' }).removeClass("certo").addClass("errado");						
					$('#emp_cidade').attr({ value: '' }).removeClass("certo").addClass("errado");
					$('#emp_estado').attr({ value: '' }).removeClass("certo").addClass("errado");
					$('#emp_rua').focus();   
					$("#emp_cep").removeClass("certo");
					$("#emp_cep").addClass("errado");						
				   alert(result.message || "CEP nao encontrado Por favor insira os dados Manualmente");
				}
			}, "json");	
		}else{
			$("#emp_cep").addClass("errado");	
			$('#emp_cep').focus();
		}
	}	
	
	
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
		  
		  window.location.href = $("#pagina_base").val()+"empresas/excluir/"+valor;
		  
		  $( this ).dialog( "close" );
		}

	}
  });
}
		
