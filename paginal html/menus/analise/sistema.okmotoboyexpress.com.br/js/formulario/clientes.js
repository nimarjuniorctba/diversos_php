$(document).ready(function(){

	var cep						=	$("#end_cep");
	var cepCadastro				=	$("#end_cep_cadastro");
	cep.blur(BuscaCep);
	cepCadastro.blur(BuscaCepCadastro);

	
	$(".meu_tipo_cad").change(function(){
		if($(".meu_tipo_cad:checked").val()=='f'){
			$("#fisico").show();	
			$("#juridico").hide();	
		}else{
			$("#fisico").hide();	
			$("#juridico").show();	
		}		
	});		

	$("#cancelar-senha").click(function(){
		$("#alterar_senha").slideUp();	
		LimparFormulario("senha");
	});		
	
    $(".btn-excluir").click(function(){
      ConfirmarExclusao($(this).attr('data-id',));	
	});		
	
	$(".editar-endereco").click(function(){
		$("#novo-endereco").slideDown();	
		$("#adicionar-endereco").hide();

		var end_id = $(this).attr('data-id',);
		
		
		$(".titulo-endereco").text("Editar endereço");
		
		$.ajax({
			url : $("#host").val()+'altera_endereco_cliente.php',
			data : { 	tipo			:	'visualiza', 
						idurl 			: 	end_id
					},
			type : 'POST',
			dataType : 'json',
			
			success : function(json){
				$("#end_rua").val(json.end_rua);
				$("#end_numero").val(json.end_numero);
				$("#end_comp").val(json.end_comp);
				$("#end_cep").val(json.end_cep);
				$("#end_bairro").val(json.end_bairro);
				$("#end_cidade").val(json.end_cidade);
				$("#end_estado").val(json.end_estado);									
				$(".titulo-endereco").attr('data-id',json.end_idurl);
				$("#end_rua").focus();
			}
		});		
	});		
	
	$(".excluir-endereco").click(function(){
		
		var end_id = $(this).attr('data-id',);				
		$.ajax({
				url : $("#host").val()+'altera_endereco_cliente.php',
				data : { 	tipo			:	'deletar', 
							idurl			: 	end_id
						},
				type : 'POST',
				dataType : 'json',				
				success : function(json){	
						location.reload();						
				}
		});		
	});	
	
	$("#adicionar-endereco").click(function(){
		$("#novo-endereco").slideDown();	
		$("#adicionar-endereco").hide();
		$(".titulo-endereco").text("Novo endereço");
		LimparFormulario();		
	});	
	
	$("#busca-cep").click(function(){
		BuscaCep();		
	});	
	
	$("#buscar-cep-cad").click(function(){
		BuscaCepCadastro();		
	});		
	
	$("#cancelar-endereco").click(function(){
		$("#novo-endereco").slideUp();	
		$("#adicionar-endereco").show();
		LimparFormulario();
	});		
	
	$("#salvar-endereco").click(function(){
		
		var cliente		=	$("#cli_idurl").val();
		var end_cep		=	$("#end_cep").val();
		var end_numero	=	$("#end_numero").val();
		var end_rua		=	$("#end_rua").val();
		var end_comp	=	$("#end_comp").val();
		var end_bairro	=	$("#end_bairro").val();
		var end_cidade	=	$("#end_cidade").val();
		var end_estado	=	$("#end_estado").val();
		var nome		=	$("#nome").val();
		
			if($(".titulo-endereco").attr('data-id',)!=''){
				var id = $(".titulo-endereco").attr('data-id',);
					$.ajax({
						
						url : $("#host").val()+'altera_endereco_cliente.php',
						data : { 	tipo			:	'alterar', 
									idurl			: 	id, 
									end_cep 		: 	end_cep, 
									end_numero 		: 	end_numero, 
									end_rua			: 	end_rua, 
									end_comp		:	end_comp, 
									end_bairro		:	end_bairro, 
									end_cidade		:	end_cidade, 
									end_estado		:	end_estado 
								},
						type : 'POST',
						dataType : 'json',
						success : function(json){
							$("#novo-endereco").slideUp();	
							$("#adicionar-endereco").show();
							location.reload();
						}
					});					
			}else{	
					$.ajax({
					
						url : $("#host").val()+'altera_endereco_cliente.php',
						data : { 	tipo			:	'cadastrar', 
									cliente			: 	cliente, 
									end_cep 		: 	end_cep, 
									end_numero 		: 	end_numero, 
									end_rua			: 	end_rua, 
									end_comp		:	end_comp, 
									end_bairro		:	end_bairro, 
									end_cidade		:	end_cidade, 
									end_estado		:	end_estado 
								},
						type : 'POST',
						dataType : 'json',
						success : function(json){
							$("#novo-endereco").slideUp();	
							$("#adicionar-endereco").show();
							location.reload();
						}
					});		
			}			
	
	});	

  	function BuscaCep(){		
		var cep =	$('#end_cep');	
		if(cep.val().length==8){
			$.get("https://viacep.com.br/ws/" + cep.val() + "/json/", function(resposta) {
				
				if (!resposta.erro) {
					var logradouro = resposta.logradouro;
					var bairro = resposta.bairro;
					var uf = resposta.uf;
					
					$("#end_cep").removeClass("errado");					
					$("input#end_rua").val( resposta.logradouro ).removeClass("errado");
					$("input#end_bairro").val( resposta.bairro ).removeClass("errado");
					$("input#end_cidade").val( resposta.localidade ).removeClass("errado");
					$("input#end_estado").val( resposta.uf ).removeClass("errado");
					
				} else {
					$('#end_rua').attr({ value: '' }).removeClass("certo").addClass("errado");
					$('#end_bairro').attr({ value: '' }).removeClass("certo").addClass("errado");						
					$('#end_cidade').attr({ value: '' }).removeClass("certo").addClass("errado");
					$('#end_estado').attr({ value: '' }).removeClass("certo").addClass("errado");
					$('#emp_rua').focus();   
					$("#end_cep").removeClass("certo");
					$("#end_cep").addClass("errado");						
				   alert(result.message || "CEP nao encontrado Por favor insira os dados Manualmente");
				}
			}, "json");	
		}else{
			$("#end_cep").addClass("errado");	
			$('#end_cep').focus();
		}
	}	

  	function BuscaCepCadastro(){
		alert("123");
		var cep =	$("#cli_end_cep");	
		if(cep.val().length==8){
			$.get("https://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep.val() },
			 function(result){
				if(result.status!=1 && result.status!=200){
					$('#cli_end_rua').attr({ value: '' });
					$('#cli_end_bairro').attr({ value: '' });						
					$('#cli_end_numero').attr({ value: '' });
					$('#cli_end_estado').attr({ value: '' });
					$('#cli_end_cidade').attr({ value: '' });
					$('#cli_end_rua').focus();   					
				   alert(result.message || "CEP nao encontrado Por favor insira os dados Manualmente");
				   return;
				}else{				
					$("#cli_end_rua").val( result.address );
					$("#cli_end_bairro").val( result.district );					
					$("#cli_end_estado").val( result.state );
					$("#cli_end_cidade").val( result.city );
					$('#cli_end_numero').focus();
				}
			 });	
		}
	}

	function LimparFormulario(){	
		$('#end_cep').val('');
		$('#end_rua').val('');
		$('#end_comp').val('');
		$('#end_bairro').val('');				
		$('#end_numero').val('');
		$('#end_estado').val('');
		$('#end_cidade').val('');			
		$(".titulo-endereco").attr('data-id','');
	}		

    $('#tabela').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        }
		
		
    });


//fim do ready	
});		


	



function ConfirmarExclusao(valor){

  $( "#dialog-excluir" ).dialog({
	modal: true,
	minWidth: 500,
	buttons: {

		Cancelar: function() {
		  $( this ).dialog( "close" );
		},
		Confirmar: function() {
		  
		  window.location.href = $("#pagina_base").val()+"clientes/excluir/"+valor;
		  
		  $( this ).dialog( "close" );
		}

	}
  });
}
		
