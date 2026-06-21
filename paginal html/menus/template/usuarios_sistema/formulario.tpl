<header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div><p class="eyebrow">{$modulo_titulo|escape}</p><h1>{if $modo_edicao}Editar{else}Cadastrar{/if}</h1></div>
    <div class="topbar__actions"><a class="secondary-button button-link" href="{$modulo_url|escape}">Voltar</a></div>
</header>
<section class="page-body clients-page">
    {if !empty($erros)}<div class="alert alert--danger clients-message"><span class="alert__icon">×</span>
        <div><strong>Revise os dados</strong><ul class="form-error-list">{foreach $erros as $erro}<li>{$erro|escape}</li>{/foreach}</ul></div></div>{/if}
    <form method="post" class="client-form" id="formUsuarioSistema" novalidate>
        <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
        <input type="hidden" name="operacao" value="salvar">
        <input type="hidden" name="registro_id" value="{$registro_formulario.id}">
        {if !$modo_edicao}
        <article class="form-card client-form-card">
            <div class="form-card__header"><div><p class="eyebrow">Identificação</p>
                <h2>Dados de acesso</h2><p>Nome, e-mail e credenciais do usuário.</p></div>
                {if $modo_edicao}<span class="client-edit-id">ID #{$registro_formulario.id|string_format:"%06d"}</span>{/if}
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field form-field--full"><label for="registro_nome">Nome *</label>
                    <input id="registro_nome" name="registro_nome" type="text" maxlength="255" value="{$registro_formulario.nome|escape}" required></div>
                <div class="form-field form-field--full"><label for="registro_email">E-mail *</label>
                    <input id="registro_email" name="registro_email" type="email" maxlength="255" value="{$registro_formulario.email|escape}" required></div>
                {if $mostrar_empresa}
                    <div class="form-field form-field--full"><label for="registro_empresa">Empresa *</label>
                        <select id="registro_empresa" name="registro_empresa" required>
                            <option value="">Selecione</option>
                            {foreach $empresas_opcoes as $empresa}
                                <option value="{$empresa.id}" {if $registro_formulario.empresa == $empresa.id}selected{/if}>{$empresa.nome|escape}</option>
                            {/foreach}
                        </select></div>
                {/if}
            </div>
        </article>
        <article class="form-card client-form-card">
            <div class="form-card__header"><div><p class="eyebrow">Segurança</p><h2>Senha</h2>
                <p>{if $modo_edicao}Deixe vazio para manter a senha atual.{else}Defina a senha de acesso.{/if}</p></div></div>
            <div class="sample-form client-form-grid">
                <div class="form-field"><label for="registro_senha">Senha {if !$modo_edicao}*{/if}</label>
                    <input id="registro_senha" name="registro_senha" type="password" maxlength="255" {if !$modo_edicao}required{/if}></div>
                <div class="form-field"><label for="registro_senha_confirmacao">Confirmar senha {if !$modo_edicao}*{/if}</label>
                    <input id="registro_senha_confirmacao" name="registro_senha_confirmacao" type="password" maxlength="255" {if !$modo_edicao}required{/if}></div>
            </div>
        </article>
        {/if}
        <div class="client-form-actions"><a class="secondary-button button-link" href="{$modulo_url|escape}">Cancelar</a>
            {if $modo_edicao}<button class="secondary-button" id="toggleSystemPassword" type="button">Alterar senha</button>{/if}
            <button class="primary-button" type="submit">Salvar</button></div>
    </form>
    {if $modo_edicao}
        <article class="form-card client-form-card separate-password-card" id="systemPasswordCard" hidden>
            <div class="form-card__header"><div><p class="eyebrow">Segurança</p><h2>Alterar senha</h2><p>Esta operação é independente do cadastro.</p></div></div>
            <form class="ajax-password-form" data-type="{$modulo_tipo_senha|escape}">
                <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
                <input type="hidden" name="id" value="{$registro_formulario.id}">
                <div class="sample-form client-form-grid">
                    <div class="form-field"><label>Nova senha</label><input name="senha" type="password" required></div>
                    <div class="form-field"><label>Confirmar senha</label><input name="confirmacao" type="password" required></div>
                </div>
                <div class="password-ajax-message" role="status"></div>
                <div class="password-card-actions"><button class="primary-button" type="submit">Salvar nova senha</button></div>
            </form>
        </article>
    {/if}
</section>
