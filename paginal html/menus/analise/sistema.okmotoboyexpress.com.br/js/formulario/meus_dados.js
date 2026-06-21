$(document).ready(function(){

	var form					=	$("#form");
	
	$("#emp_pj_cnpj").mask("99.999.999/9999-99");
	$("#emp_pf_cpf").mask("999.999.999-99");
	
	$("#buscar-cep").blur(()=>{BuscaCep();});
	
	$(".meu_tipo_cad").change(function(){
		if($(".meu_tipo_cad:checked").val()=='f'){
			$("#fisico").show();	
			$("#juridico").hide();	
		}else{
			$("#fisico").hide();	
			$("#juridico").show();	
		}		
	});		
	
	$("#buscar-cep").click(function(){
		BuscaCep();
	});		
	
  	function BuscaCep(){		
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


//fim do ready
});

