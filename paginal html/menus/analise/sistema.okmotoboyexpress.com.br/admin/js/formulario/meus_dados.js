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


//fim do ready
});

