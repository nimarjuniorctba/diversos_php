$(document).ready(function(){

	$("input[name=pla_tipo]").change(function(){

		switch($("input[name=pla_tipo]:checked").val()){
			
			case 's':
				$(".bloco_ped_website").hide();
				$(".bloco_ped_aplicativo").hide();
				$(".bloco_ped_ecommece").hide();
				$(".bloco_ped_combos").hide();				
				$(".bloco_ped_sistema").show();
				break;			
			case 'w':
		//	alert('lkuj');
				$(".bloco_ped_sistema").hide();
				$(".bloco_ped_aplicativo").hide();
				$(".bloco_ped_ecommece").hide();
				$(".bloco_ped_combos").hide();
				$(".bloco_ped_website").hide();
				$(".bloco_ped_website").show();
				break;			
			case 'a':
				$(".bloco_ped_sistema").hide();
				$(".bloco_ped_website").hide();
				$(".bloco_ped_ecommece").hide();
				$(".bloco_ped_combos").hide();
				$(".bloco_ped_aplicativo").show();
				break;			
			case 'e':
				$(".bloco_ped_sistema").hide();
				$(".bloco_ped_website").hide();
				$(".bloco_ped_aplicativo").hide();
				$(".bloco_ped_combos").hide();
				$(".bloco_ped_ecommece").show();
				break;			
			case 'c':
				$(".bloco_ped_sistema").hide();
				$(".bloco_ped_website").hide();
				$(".bloco_ped_aplicativo").hide();
				$(".bloco_ped_ecommece").hide();
				$(".bloco_ped_combos").show();
				break;
			
		}
		
	});
	
	
	$("input[name=ped_produto_website]").change(function(){

		switch($("input[name=ped_produto_website]:checked").val()){
			
			case 'w':
				$(".ecommerce").hide();
				$(".websites").show();
				break;			
			case 'e':
				$(".websites").hide();
				$(".ecommerce").show();
				break;						
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
		
