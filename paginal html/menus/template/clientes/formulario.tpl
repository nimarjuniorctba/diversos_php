{*
    FORMULÁRIO DE CLIENTES
    O mesmo template atende cadastro e edição.
*}
<header class="topbar">
    <button
        class="icon-button mobile-menu-button"
        id="mobileMenuButton"
        type="button"
        aria-label="Abrir menu"
        aria-expanded="false"
        aria-controls="sidebar">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div>
        <p class="eyebrow">Clientes</p>
        <h1>{if $modo_edicao}Editar cliente{else}Cadastrar cliente{/if}</h1>
    </div>

    <div class="topbar__actions">
        <a class="secondary-button button-link" href="clientes.php">Voltar à lista</a>
    </div>
</header>

<section class="page-body clients-page">
    {if !empty($erros)}
        <div class="alert alert--danger clients-message">
            <span class="alert__icon">×</span>
            <div>
                <strong>Revise os dados informados</strong>
                <ul class="form-error-list">
                    {foreach $erros as $erro}
                        <li>{$erro|escape}</li>
                    {/foreach}
                </ul>
            </div>
        </div>
    {/if}

    <form method="post" class="client-form" id="formCliente" novalidate>
        <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
        <input type="hidden" name="operacao" value="salvar">
        <input type="hidden" name="cli_id" value="{$cliente_formulario.id}">

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Identificação</p>
                    <h2>Tipo de cadastro</h2>
                    <p>Escolha pessoa física ou jurídica para exibir os campos correspondentes.</p>
                </div>
                {if $modo_edicao}
                    <span class="client-edit-id">ID #{$cliente_formulario.id|string_format:"%06d"}</span>
                {/if}
            </div>

            <div class="client-type-selector">
                <label class="type-option">
                    <input
                        type="radio"
                        name="cli_tipo_cad"
                        value="f"
                        {if $cliente_formulario.tipo_cadastro !== 'j'}checked{/if}>
                    <span>
                        <strong>Pessoa física</strong>
                        <small>Cadastro com nome e CPF</small>
                    </span>
                </label>
                <label class="type-option">
                    <input
                        type="radio"
                        name="cli_tipo_cad"
                        value="j"
                        {if $cliente_formulario.tipo_cadastro === 'j'}checked{/if}>
                    <span>
                        <strong>Pessoa jurídica</strong>
                        <small>Cadastro com razão social e CNPJ</small>
                    </span>
                </label>
            </div>
        </article>

        <article class="form-card client-form-card client-fields-pf">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Pessoa física</p>
                    <h2>Dados pessoais</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field form-field--full">
                    <label for="cli_pf_nome">Nome completo *</label>
                    <input
                        id="cli_pf_nome"
                        name="cli_pf_nome"
                        type="text"
                        maxlength="255"
                        value="{$cliente_formulario.pf_nome|escape}"
                        placeholder="Nome completo do cliente">
                </div>
                <div class="form-field">
                    <label for="cli_pf_cpf">CPF *</label>
                    <input
                        id="cli_pf_cpf"
                        name="cli_pf_cpf"
                        type="text"
                        maxlength="14"
                        value="{$cliente_formulario.pf_cpf|escape}"
                        placeholder="000.000.000-00"
                        data-mask="cpf">
                </div>
                <div class="form-field">
                    <label for="cli_pf_dt_nascimento">Data de nascimento</label>
                    <input
                        id="cli_pf_dt_nascimento"
                        name="cli_pf_dt_nascimento"
                        type="text"
                        maxlength="10"
                        value="{$cliente_formulario.pf_dt_nascimento|escape}"
                        placeholder="00/00/0000"
                        data-mask="date">
                </div>
            </div>
        </article>

        <article class="form-card client-form-card client-fields-pj">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Pessoa jurídica</p>
                    <h2>Dados da empresa</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="cli_pj_cnpj">CNPJ *</label>
                    <input
                        id="cli_pj_cnpj"
                        name="cli_pj_cnpj"
                        type="text"
                        maxlength="18"
                        value="{$cliente_formulario.pj_cnpj|escape}"
                        placeholder="00.000.000/0000-00"
                        data-mask="cnpj">
                </div>
                <div class="form-field">
                    <label for="cli_pj_fantasia">Nome fantasia</label>
                    <input
                        id="cli_pj_fantasia"
                        name="cli_pj_fantasia"
                        type="text"
                        maxlength="255"
                        value="{$cliente_formulario.pj_fantasia|escape}">
                </div>
                <div class="form-field form-field--full">
                    <label for="cli_pj_razao">Razão social *</label>
                    <input
                        id="cli_pj_razao"
                        name="cli_pj_razao"
                        type="text"
                        maxlength="255"
                        value="{$cliente_formulario.pj_razao|escape}">
                </div>
                <div class="form-field">
                    <label for="cli_pj_ie">Inscrição estadual</label>
                    <input
                        id="cli_pj_ie"
                        name="cli_pj_ie"
                        type="text"
                        maxlength="45"
                        value="{$cliente_formulario.pj_ie|escape}">
                </div>
                <label class="checkbox-field client-ie-checkbox">
                    <input
                        id="cli_pj_ie_isento"
                        name="cli_pj_ie_isento"
                        type="checkbox"
                        value="s"
                        {if $cliente_formulario.pj_ie_isento === 's'}checked{/if}>
                    <span>Cliente isento de inscrição estadual</span>
                </label>
                <div class="form-field form-field--full">
                    <label for="cli_pj_responsavel">Responsável</label>
                    <input
                        id="cli_pj_responsavel"
                        name="cli_pj_responsavel"
                        type="text"
                        maxlength="255"
                        value="{$cliente_formulario.pj_responsavel|escape}">
                </div>
            </div>
        </article>

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Contato</p>
                    <h2>Telefones e e-mail</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="cli_telefone">Telefone</label>
                    <input
                        id="cli_telefone"
                        name="cli_telefone"
                        type="text"
                        maxlength="15"
                        value="{$cliente_formulario.telefone|escape}"
                        placeholder="(00) 0000-0000"
                        data-mask="phone">
                </div>
                <div class="form-field">
                    <label for="cli_celular">Celular</label>
                    <input
                        id="cli_celular"
                        name="cli_celular"
                        type="text"
                        maxlength="15"
                        value="{$cliente_formulario.celular|escape}"
                        placeholder="(00) 00000-0000"
                        data-mask="phone">
                </div>
                <div class="form-field form-field--full">
                    <label for="cli_email">E-mail *</label>
                    <input
                        id="cli_email"
                        name="cli_email"
                        type="email"
                        maxlength="255"
                        value="{$cliente_formulario.email|escape}"
                        placeholder="cliente@exemplo.com">
                </div>
            </div>
        </article>

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Redes sociais</p>
                    <h2>Perfis do cliente</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="cli_facebook">Facebook</label>
                    <input
                        id="cli_facebook"
                        name="cli_facebook"
                        type="text"
                        maxlength="255"
                        value="{$cliente_formulario.facebook|escape}"
                        placeholder="Link ou nome do perfil">
                </div>
                <div class="form-field">
                    <label for="cli_instagram">Instagram</label>
                    <input
                        id="cli_instagram"
                        name="cli_instagram"
                        type="text"
                        maxlength="255"
                        value="{$cliente_formulario.instagram|escape}"
                        placeholder="@usuario">
                </div>
            </div>
        </article>

        <div class="client-form-actions">
            <a class="secondary-button button-link" href="clientes.php">Cancelar</a>
            <button class="primary-button" type="submit">
                {if $modo_edicao}Salvar alterações{else}Cadastrar cliente{/if}
            </button>
        </div>
    </form>

    <footer class="page-footer">
        <span>© {$ano_atual} {$nome_sistema|escape}</span>
        <span>{if $modo_edicao}Edição{else}Cadastro{/if} de cliente</span>
    </footer>
</section>
