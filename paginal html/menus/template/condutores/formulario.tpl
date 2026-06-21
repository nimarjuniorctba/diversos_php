<header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div>
        <p class="eyebrow">Condutores</p>
        <h1>{if $modo_edicao}Editar condutor{else}Cadastrar condutor{/if}</h1>
    </div>
    <div class="topbar__actions">
        <a class="secondary-button button-link" href="condutores.php">Voltar à lista</a>
    </div>
</header>

<section class="page-body clients-page">
    {if !empty($erros)}
        <div class="alert alert--danger clients-message">
            <span class="alert__icon">×</span>
            <div><strong>Revise os dados informados</strong>
                <ul class="form-error-list">{foreach $erros as $erro}<li>{$erro|escape}</li>{/foreach}</ul>
            </div>
        </div>
    {/if}

    <form method="post" class="client-form" id="formCondutor" novalidate>
        <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
        <input type="hidden" name="operacao" value="salvar">
        <input type="hidden" name="con_id" value="{$condutor_formulario.id}">

        {if !$modo_edicao}
        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Identificação</p>
                    <h2>Dados do condutor</h2>
                    <p>Informações utilizadas na administração e no aplicativo.</p>
                </div>
                {if $modo_edicao}<span class="client-edit-id">ID #{$condutor_formulario.id|string_format:"%06d"}</span>{/if}
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field form-field--full">
                    <label for="con_nome">Nome completo *</label>
                    <input id="con_nome" name="con_nome" type="text" maxlength="100"
                        value="{$condutor_formulario.nome|escape}" required>
                </div>
                <div class="form-field">
                    <label for="con_telefone">Telefone *</label>
                    <input id="con_telefone" name="con_telefone" type="text" maxlength="20"
                        value="{$condutor_formulario.telefone|escape}" placeholder="(00) 00000-0000"
                        data-mask="phone" required>
                </div>
                <div class="form-field">
                    <label for="con_placa">Placa do veículo *</label>
                    <input id="con_placa" name="con_placa" type="text" maxlength="10"
                        value="{$condutor_formulario.placa|escape}" placeholder="ABC1D23"
                        class="uppercase-input" required>
                </div>
                <div class="form-field form-field--full">
                    <label for="con_email">E-mail de acesso *</label>
                    <input id="con_email" name="con_email" type="email" maxlength="100"
                        value="{$condutor_formulario.email|escape}" placeholder="condutor@exemplo.com" required>
                </div>
            </div>
        </article>

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Segurança</p>
                    <h2>{if $modo_edicao}Alterar senha{else}Senha de acesso{/if}</h2>
                    <p>{if $modo_edicao}Deixe os campos vazios para manter a senha atual.{else}Senha usada pelo condutor no aplicativo.{/if}</p>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="con_senha">Senha {if !$modo_edicao}*{/if}</label>
                    <input id="con_senha" name="con_senha" type="password" maxlength="100"
                        autocomplete="new-password" {if !$modo_edicao}required{/if}>
                </div>
                <div class="form-field">
                    <label for="con_senha_confirmacao">Confirmar senha {if !$modo_edicao}*{/if}</label>
                    <input id="con_senha_confirmacao" name="con_senha_confirmacao" type="password"
                        maxlength="100" autocomplete="new-password" {if !$modo_edicao}required{/if}>
                    <small id="senhaCondutorAviso"></small>
                </div>
            </div>
        </article>
        {/if}

        <div class="client-form-actions">
            {if $modo_edicao}
                <button class="danger-button edit-driver-action" type="button" data-action="excluir">Excluir</button>
                <button class="secondary-button edit-driver-action" type="button" data-action="{if $condutor_formulario.status === 'a'}desativar{else}ativar{/if}">
                    {if $condutor_formulario.status === 'a'}Desativar{else}Ativar{/if}
                </button>
                <button class="secondary-button" id="toggleDriverPassword" type="button">Alterar senha</button>
            {/if}
            <a class="secondary-button button-link" href="condutores.php">Cancelar</a>
            <button class="primary-button" type="submit">
                {if $modo_edicao}Salvar alterações{else}Cadastrar condutor{/if}
            </button>
        </div>
    </form>

    {if $modo_edicao}
        <article class="form-card client-form-card separate-password-card" id="driverPasswordCard" hidden>
            <div class="form-card__header"><div><p class="eyebrow">Segurança</p><h2>Alterar senha</h2><p>A senha será salva separadamente por AJAX.</p></div></div>
            <form class="ajax-password-form" data-type="condutor">
                <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
                <input type="hidden" name="id" value="{$condutor_formulario.id}">
                <div class="sample-form client-form-grid">
                    <div class="form-field"><label>Nova senha</label><input name="senha" type="password" required></div>
                    <div class="form-field"><label>Confirmar senha</label><input name="confirmacao" type="password" required></div>
                </div>
                <div class="password-ajax-message" role="status"></div>
                <div class="password-card-actions"><button class="primary-button" type="submit">Salvar nova senha</button></div>
            </form>
        </article>
        <form method="post" id="driverEditActionForm" hidden>
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
            <input type="hidden" name="operacao" id="driverEditOperation">
            <input type="hidden" name="con_id" value="{$condutor_formulario.id}">
            <input type="hidden" name="novo_status" id="driverEditStatus">
        </form>
    {/if}
</section>
