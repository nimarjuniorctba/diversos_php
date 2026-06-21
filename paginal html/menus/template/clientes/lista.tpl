{*
    LISTAGEM DE CLIENTES
    Dados preparados pelo controlador clientes.php.
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
        <p class="eyebrow">Cadastros</p>
        <h1>Clientes</h1>
    </div>

    <div class="topbar__actions">
        <a class="primary-button button-link" href="clientes.php?acao=cadastrar">
            <span aria-hidden="true">＋</span>
            Cadastrar cliente
        </a>
    </div>
</header>

<section class="page-body clients-page">
    {if !empty($mensagem)}
        <div class="alert alert--{if $mensagem.tipo === 'sucesso'}success{else}danger{/if} clients-message">
            <span class="alert__icon">{if $mensagem.tipo === 'sucesso'}✓{else}×{/if}</span>
            <div>
                <strong>{if $mensagem.tipo === 'sucesso'}Tudo certo!{else}Não foi possível concluir{/if}</strong>
                <p>{$mensagem.texto|escape}</p>
            </div>
        </div>
    {/if}

    <div class="clients-summary">
        <div>
            <p class="eyebrow">Base de clientes</p>
            <h2>{$qte_registros} cliente{if $qte_registros != 1}s{/if}</h2>
            <p>Gerencie os dados, o status e os cadastros da empresa.</p>
        </div>
        <div class="clients-summary__icon" aria-hidden="true">
            {include file="menu_icone.tpl" icone="users"}
        </div>
    </div>

    <div class="table-card clients-table-card">
        <div class="table-toolbar">
            <div class="search-field">
                <span aria-hidden="true">⌕</span>
                <input
                    id="buscarCliente"
                    type="search"
                    placeholder="Buscar por nome, e-mail, celular ou ID"
                    autocomplete="off">
            </div>
            <span class="table-result-count" id="quantidadeVisivel">
                {$qte_registros} registro{if $qte_registros != 1}s{/if}
            </span>
        </div>

        <div class="table-scroll">
            <table class="data-table clients-table" id="tabelaClientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome / Razão social</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Data de criação</th>
                        <th>Status</th>
                        <th class="clients-actions-column">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {if $qte_registros > 0}
                        {foreach $array_clientes as $cliente}
                            <tr class="client-row">
                                <td data-label="ID">
                                    <strong class="client-id">#{$cliente.id_formatado|escape}</strong>
                                </td>
                                <td data-label="Tipo">
                                    <span class="client-type">{$cliente.tipo_sigla|escape}</span>
                                    <small class="client-type-label">{$cliente.tipo|escape}</small>
                                </td>
                                <td data-label="Nome / Razão social">
                                    <strong>{$cliente.nome|default:'Não informado'|escape}</strong>
                                </td>
                                <td data-label="Celular">{$cliente.celular|default:'—'|escape}</td>
                                <td data-label="E-mail">
                                    {if !empty($cliente.email)}
                                        <a class="client-email" href="mailto:{$cliente.email|escape}">{$cliente.email|escape}</a>
                                    {else}
                                        —
                                    {/if}
                                </td>
                                <td data-label="Data de criação">{$cliente.dt_cadastro|escape}</td>
                                <td data-label="Status">
                                    <span class="badge badge--{if $cliente.status === 'a'}success{else}neutral{/if}">
                                        <i></i>{$cliente.status_texto|escape}
                                    </span>
                                </td>
                                <td data-label="Ações">
                                    <div class="client-actions">
                                        <a
                                            class="action-button action-button--edit"
                                            href="clientes.php?acao=editar&id={$cliente.id}"
                                            title="Editar cliente"
                                            aria-label="Editar cliente {$cliente.nome|escape}">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/>
                                            </svg>
                                        </a>

                                        <form method="post" class="inline-form">
                                            <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
                                            <input type="hidden" name="operacao" value="status">
                                            <input type="hidden" name="cli_id" value="{$cliente.id}">
                                            <input
                                                type="hidden"
                                                name="novo_status"
                                                value="{if $cliente.status === 'a'}i{else}a{/if}">
                                            <button
                                                class="action-button action-button--status"
                                                type="submit"
                                                title="{if $cliente.status === 'a'}Desativar{else}Ativar{/if} cliente"
                                                aria-label="{if $cliente.status === 'a'}Desativar{else}Ativar{/if} cliente {$cliente.nome|escape}">
                                                {if $cliente.status === 'a'}
                                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10"/>
                                                    </svg>
                                                {else}
                                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="m5 12 4 4L19 6"/>
                                                    </svg>
                                                {/if}
                                            </button>
                                        </form>

                                        <button
                                            class="action-button action-button--delete delete-client-button"
                                            type="button"
                                            data-client-id="{$cliente.id}"
                                            data-client-name="{$cliente.nome|escape}"
                                            title="Excluir cliente"
                                            aria-label="Excluir cliente {$cliente.nome|escape}">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr class="empty-table-row">
                            <td colspan="8">
                                <div class="table-empty-state">
                                    <span aria-hidden="true">□</span>
                                    <strong>Nenhum cliente cadastrado</strong>
                                    <p>Comece adicionando o primeiro cliente da empresa.</p>
                                    <a class="primary-button button-link" href="clientes.php?acao=cadastrar">
                                        Cadastrar cliente
                                    </a>
                                </div>
                            </td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </div>

        <div class="table-empty-search" id="nenhumClienteEncontrado" hidden>
            Nenhum cliente corresponde à sua busca.
        </div>
    </div>

    <footer class="page-footer">
        <span>© {$ano_atual} {$nome_sistema|escape}</span>
        <span>Cadastro de clientes</span>
    </footer>
</section>

<div class="popup" id="popupExcluirCliente" aria-hidden="true">
    <div
        class="popup__dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="tituloExcluirCliente">
        <button class="popup__close close-delete-popup" type="button" aria-label="Fechar">×</button>
        <span class="popup__icon popup__icon--danger" aria-hidden="true">!</span>
        <h3 id="tituloExcluirCliente">Excluir cliente?</h3>
        <p>
            O cadastro de <strong id="nomeClienteExcluir"></strong> será removido
            da listagem. Esta ação usa exclusão lógica.
        </p>
        <form method="post" class="popup__actions">
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
            <input type="hidden" name="operacao" value="excluir">
            <input type="hidden" name="cli_id" id="idClienteExcluir" value="">
            <button class="secondary-button close-delete-popup" type="button">Cancelar</button>
            <button class="danger-button" type="submit">Sim, excluir</button>
        </form>
    </div>
</div>

