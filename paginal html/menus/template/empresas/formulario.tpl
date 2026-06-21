<header class="topbar"><button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar">
    <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button>
    <div><p class="eyebrow">Empresas</p><h1>{if $modo_edicao}Editar empresa{else}Cadastrar empresa{/if}</h1></div>
    <div class="topbar__actions"><a class="secondary-button button-link" href="empresas.php">Voltar</a></div></header>
<section class="page-body clients-page">
{if !empty($erros)}<div class="alert alert--danger clients-message"><span class="alert__icon">×</span><div><strong>Revise os dados</strong><ul class="form-error-list">{foreach $erros as $e}<li>{$e|escape}</li>{/foreach}</ul></div></div>{/if}
<form method="post" class="client-form" id="formEmpresa"><input type="hidden" name="csrf_token" value="{$csrf_token}"><input type="hidden" name="operacao" value="salvar"><input type="hidden" name="emp_id" value="{$empresa_formulario.id}">
<article class="form-card client-form-card"><div class="form-card__header"><div><p class="eyebrow">Identificação</p><h2>Tipo de cadastro</h2></div>{if $modo_edicao}<span class="client-edit-id">ID #{$empresa_formulario.id|string_format:"%06d"}</span>{/if}</div>
<div class="client-type-selector"><label class="type-option"><input type="radio" name="emp_tipo_cad" value="f" {if $empresa_formulario.tipo==='f'}checked{/if}><span><strong>Pessoa física</strong><small>CPF e nome</small></span></label>
<label class="type-option"><input type="radio" name="emp_tipo_cad" value="j" {if $empresa_formulario.tipo!=='f'}checked{/if}><span><strong>Pessoa jurídica</strong><small>CNPJ e razão social</small></span></label></div></article>
<article class="form-card client-form-card company-pf"><div class="form-card__header"><div><h2>Dados da pessoa física</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field form-field--full"><label>Nome *</label><input name="emp_pf_nome" value="{$empresa_formulario.pf_nome|escape}"></div>
<div class="form-field"><label>CPF *</label><input name="emp_pf_cpf" data-mask="cpf" maxlength="15" value="{$empresa_formulario.pf_cpf|escape}"></div>
<div class="form-field"><label>Data de nascimento</label><input name="emp_pf_dt_nascimento" data-mask="date" maxlength="10" value="{$empresa_formulario.pf_nascimento|escape}"></div></div></article>
<article class="form-card client-form-card company-pj"><div class="form-card__header"><div><h2>Dados da pessoa jurídica</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>CNPJ *</label><input name="emp_pj_cnpj" data-mask="cnpj" maxlength="18" value="{$empresa_formulario.pj_cnpj|escape}"></div>
<div class="form-field"><label>Nome fantasia</label><input name="emp_pj_fantasia" value="{$empresa_formulario.pj_fantasia|escape}"></div>
<div class="form-field form-field--full"><label>Razão social *</label><input name="emp_pj_razao" value="{$empresa_formulario.pj_razao|escape}"></div>
<div class="form-field"><label>Inscrição estadual</label><input name="emp_pj_ie" value="{$empresa_formulario.pj_ie|escape}"></div>
<label class="checkbox-field"><input type="checkbox" name="emp_pj_ie_isento" value="s" {if $empresa_formulario.pj_ie_isento==='s'}checked{/if}><span>Isento</span></label>
<div class="form-field form-field--full"><label>Responsável</label><input name="emp_pj_responsavel" value="{$empresa_formulario.pj_responsavel|escape}"></div></div></article>
<article class="form-card client-form-card"><div class="form-card__header"><div><h2>Endereço</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>CEP</label><input name="emp_cep" data-mask="cep" maxlength="10" value="{$empresa_formulario.cep|escape}"></div>
<div class="form-field"><label>Rua</label><input name="emp_rua" value="{$empresa_formulario.rua|escape}"></div>
<div class="form-field"><label>Número</label><input name="emp_numero" value="{$empresa_formulario.numero|escape}"></div>
<div class="form-field"><label>Complemento</label><input name="emp_complemento" value="{$empresa_formulario.complemento|escape}"></div>
<div class="form-field"><label>Bairro</label><input name="emp_bairro" value="{$empresa_formulario.bairro|escape}"></div>
<div class="form-field"><label>Cidade</label><input name="emp_cidade" value="{$empresa_formulario.cidade|escape}"></div>
<div class="form-field"><label>Estado</label><input name="emp_estado" maxlength="2" class="uppercase-input" value="{$empresa_formulario.estado|escape}"></div></div></article>
<article class="form-card client-form-card"><div class="form-card__header"><div><h2>Contato e licença</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>Telefone</label><input name="emp_telefone" data-mask="phone" value="{$empresa_formulario.telefone|escape}"></div>
<div class="form-field"><label>Celular</label><input name="emp_celular" data-mask="phone" value="{$empresa_formulario.celular|escape}"></div>
<div class="form-field form-field--full"><label>E-mail</label><input type="email" name="emp_email" value="{$empresa_formulario.email|escape}"></div>
<div class="form-field"><label>Facebook</label><input name="emp_facebook" value="{$empresa_formulario.facebook|escape}"></div>
<div class="form-field"><label>Instagram</label><input name="emp_instagram" value="{$empresa_formulario.instagram|escape}"></div>
<div class="form-field"><label>Validade do sistema *</label><input type="date" name="emp_validade_sistema" value="{$empresa_formulario.validade|escape}" required></div></div></article>
<div class="client-form-actions"><a class="secondary-button button-link" href="empresas.php">Cancelar</a><button class="primary-button">Salvar empresa</button></div></form></section>

