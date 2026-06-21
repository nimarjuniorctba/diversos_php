<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
<div class="titulo-aba">:: {$pagina->titulo}</div>  
	{if $pagina->opcao != 'meus-dados'}
		  <li class="nav-item" style="margin-top: 5px;">
			<a class="nav-link {if $pagina->acao=='listar'}active{/if}" aria-current="page" href="{$pagina->base}{$pagina->opcao}/listar">Listar</a>
		  </li>
		{if $pagina->acao=='cadastrar' || $pagina->acao=='listar'} 
		  <li class="nav-item" style="margin-top: 5px;margin-right: 4px;">
			<a class="nav-link {if $pagina->acao=='cadastrar'}active{/if}" href="{$pagina->base}{$pagina->opcao}/cadastrar">Cadastrar</a>
		  </li>  
		{elseif $pagina->acao=='alterar'}
		  <li class="nav-item" style="margin-top: 5px;margin-right: 4px;">
			<a class="nav-link {if $pagina->acao=='alterar'}active{/if}" href="{$pagina->base}{$pagina->opcao}/alterar">Alterar</a>
		  </li>
		{/if}
	{else}
	
		  <li class="nav-item" style="margin-top: 5px;margin-right: 4px;visibility:hidden">
			<a class="nav-link" href="">Alterar</a>
		  </li>
	
	
	{/if}
</ul>



<!--<input type="hidden" id="pagina_debug" value="{$pagina->opcao}">-->