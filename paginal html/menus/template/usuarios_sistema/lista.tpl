<header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div><p class="eyebrow">Cadastros</p><h1>{$modulo_titulo|escape}</h1></div>
    <div class="topbar__actions">
        <a class="primary-button button-link" href="{$modulo_url|escape}?acao=cadastrar">＋ Cadastrar</a>
    </div>
</header>

<section class="page-body clients-page">
    {if !empty($mensagem)}
        <div class="alert alert--{if $mensagem.tipo === 'sucesso'}success{else}danger{/if} clients-message">
            <span class="alert__icon">{if $mensagem.tipo === 'sucesso'}✓{else}×{/if}</span>
            <div><strong>{if $mensagem.tipo === 'sucesso'}Tudo certo!{else}Não foi possível concluir{/if}</strong>
                <p>{$mensagem.texto|escape}</p></div>
        </div>
    {/if}

    <div class="clients-summary">
        <div><p class="eyebrow">Controle de acesso</p>
            <h2>{$qte_registros} registro{if $qte_registros != 1}s{/if}</h2>
            <p>{$modulo_descricao|escape}</p></div>
        <div class="clients-summary__icon" aria-hidden="true">{include file="menu_icone.tpl" icone="users"}</div>
    </div>

    <div class="table-card clients-table-card">
        <div class="table-toolbar">
            <div class="search-field"><span>⌕</span>
                <input id="buscarRegistroSistema" type="search" placeholder="Buscar por ID, nome ou e-mail">
            </div>
            <span class="table-result-count" id="quantidadeRegistrosSistema">{$qte_registros} registros</span>
        </div>
        <div class="table-scroll">
            <table class="data-table clients-table system-users-table" id="tabelaRegistrosSistema">
                <thead><tr><th>ID</th><th>Nome</th><th>E-mail</th>
                    {if $mostrar_empresa}<th>Empresa</th>{/if}
                    <th>Data de criação</th><th>Status</th><th>Ações</th></tr></thead>
                <tbody>
                    {if $qte_registros > 0}
                        {foreach $registros as $registro}
                            <tr class="system-user-row">
                                <td data-label="ID"><strong class="client-id">#{$registro.id_formatado|escape}</strong></td>
                                <td data-label="Nome"><strong>{$registro.nome|escape}</strong></td>
                                <td data-label="E-mail"><a class="client-email" href="mailto:{$registro.email|escape}">{$registro.email|escape}</a></td>
                                {if $mostrar_empresa}<td data-label="Empresa">{$registro.empresa_nome|escape}</td>{/if}
                                <td data-label="Data de criação">{$registro.dt_cadastro|escape}</td>
                                <td data-label="Status"><span class="badge badge--{if $registro.status === 'a'}success{else}neutral{/if}"><i></i>{$registro.status_texto}</span></td>
                                <td data-label="Ações"><div class="client-actions">
                                    <a class="action-button action-button--edit" href="{$modulo_url|escape}?acao=editar&id={$registro.id}">
                                        <svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/></svg>
                                    </a>
                                    <form method="post" class="inline-form">
                                        <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
                                        <input type="hidden" name="operacao" value="status">
                                        <input type="hidden" name="registro_id" value="{$registro.id}">
                                        <input type="hidden" name="novo_status" value="{if $registro.status === 'a'}i{else}a{/if}">
                                        <button class="action-button action-button--status" type="submit">
                                            <svg viewBox="0 0 24 24"><path d="{if $registro.status === 'a'}M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10{else}m5 12 4 4L19 6{/if}"/></svg>
                                        </button>
                                    </form>
                                    <button class="action-button action-button--delete delete-system-user" type="button"
                                        data-id="{$registro.id}" data-name="{$registro.nome|escape}">
                                        <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/></svg>
                                    </button>
                                </div></td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr><td colspan="{if $mostrar_empresa}7{else}6{/if}"><div class="table-empty-state">
                            <span>□</span><strong>Nenhum registro cadastrado</strong>
                            <p>Use o botão cadastrar para adicionar o primeiro registro.</p>
                        </div></td></tr>
                    {/if}
                </tbody>
            </table>
        </div>
        <div class="table-empty-search" id="nenhumRegistroSistema" hidden>Nenhum registro corresponde à busca.</div>
    </div>
</section>

<div class="popup" id="popupExcluirUsuarioSistema" aria-hidden="true">
    <div class="popup__dialog" role="dialog" aria-modal="true">
        <button class="popup__close close-system-user-popup" type="button">×</button>
        <span class="popup__icon popup__icon--danger">!</span>
        <h3>Excluir registro?</h3><p>O cadastro de <strong id="nomeUsuarioSistemaExcluir"></strong> será removido.</p>
        <form method="post" class="popup__actions">
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
            <input type="hidden" name="operacao" value="excluir">
            <input type="hidden" name="registro_id" id="idUsuarioSistemaExcluir">
            <button class="secondary-button close-system-user-popup" type="button">Cancelar</button>
            <button class="danger-button" type="submit">Sim, excluir</button>
        </form>
    </div>
</div>

