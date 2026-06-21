<header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div>
        <p class="eyebrow">Cadastros</p>
        <h1>Condutores</h1>
    </div>
    <div class="topbar__actions">
        <a class="primary-button button-link" href="condutores.php?acao=cadastrar">
            <span aria-hidden="true">＋</span>Cadastrar condutor
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

    <div class="clients-summary driver-summary">
        <div>
            <p class="eyebrow">Equipe de entregas</p>
            <h2>{$qte_registros} condutor{if $qte_registros != 1}es{/if}</h2>
            <p>Gerencie os acessos, veículos e situação dos condutores.</p>
        </div>
        <div class="clients-summary__icon driver-summary__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 21v-2a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v2M8 3h8"/>
            </svg>
        </div>
    </div>

    <div class="table-card clients-table-card">
        <div class="table-toolbar">
            <div class="search-field">
                <span aria-hidden="true">⌕</span>
                <input id="buscarCondutor" type="search"
                    placeholder="Buscar por nome, e-mail, telefone, placa ou ID" autocomplete="off">
            </div>
            <span class="table-result-count" id="quantidadeCondutoresVisiveis">
                {$qte_registros} registro{if $qte_registros != 1}s{/if}
            </span>
        </div>

        <div class="table-scroll">
            <table class="data-table clients-table drivers-table" id="tabelaCondutores">
                <thead>
                    <tr>
                        <th>ID</th><th>Nome</th><th>Telefone</th><th>E-mail</th>
                        <th>Placa</th><th>Cadastro</th><th>Aplicativo</th>
                        <th>Data de criação</th><th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {if $qte_registros > 0}
                        {foreach $array_condutores as $condutor}
                            <tr class="driver-row">
                                <td data-label="ID"><strong class="client-id">#{$condutor.id_formatado|escape}</strong></td>
                                <td data-label="Nome"><strong>{$condutor.nome|default:'Não informado'|escape}</strong></td>
                                <td data-label="Telefone">{$condutor.telefone_formatado|default:'—'|escape}</td>
                                <td data-label="E-mail"><a class="client-email" href="mailto:{$condutor.email|escape}">{$condutor.email|escape}</a></td>
                                <td data-label="Placa"><span class="vehicle-plate">{$condutor.placa|default:'—'|escape}</span></td>
                                <td data-label="Cadastro">
                                    <span class="badge badge--{if $condutor.status === 'a'}success{else}neutral{/if}">
                                        <i></i>{$condutor.status_texto|escape}
                                    </span>
                                </td>
                                <td data-label="Aplicativo">
                                    <span class="badge badge--{if $condutor.app_status === 'a'}info{else}neutral{/if}">
                                        <i></i>{$condutor.app_status_texto|escape}
                                    </span>
                                </td>
                                <td data-label="Data de criação">{$condutor.dt_cadastro|escape}</td>
                                <td data-label="Ações">
                                    <div class="client-actions">
                                        {if !empty($condutor.whatsapp)}
                                            <a class="action-button action-button--whatsapp"
                                                href="https://wa.me/55{$condutor.whatsapp|escape}"
                                                target="_blank"
                                                rel="noopener"
                                                title="Enviar mensagem pelo WhatsApp">
                                                <svg viewBox="0 0 24 24"><path d="M20.5 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20l1.2-4.7a8.5 8.5 0 1 1 16.3-3.8zM8.5 7.5c.4 3 2.3 5 5.5 6l1.2-1.2c.2-.2.5-.2.7-.1l2 .9"/></svg>
                                            </a>
                                        {/if}
                                        <a class="action-button action-button--edit"
                                            href="condutores.php?acao=editar&id={$condutor.id}"
                                            title="Editar condutor" aria-label="Editar condutor {$condutor.nome|escape}">
                                            <svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/></svg>
                                        </a>
                                        <form method="post" class="inline-form">
                                            <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
                                            <input type="hidden" name="operacao" value="status">
                                            <input type="hidden" name="con_id" value="{$condutor.id}">
                                            <input type="hidden" name="novo_status" value="{if $condutor.status === 'a'}i{else}a{/if}">
                                            <button class="action-button action-button--status" type="submit"
                                                title="{if $condutor.status === 'a'}Desativar{else}Ativar{/if} condutor">
                                                {if $condutor.status === 'a'}
                                                    <svg viewBox="0 0 24 24"><path d="M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10"/></svg>
                                                {else}
                                                    <svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg>
                                                {/if}
                                            </button>
                                        </form>
                                        <button class="action-button action-button--delete delete-driver-button"
                                            type="button" data-driver-id="{$condutor.id}"
                                            data-driver-name="{$condutor.nome|escape}" title="Excluir condutor">
                                            <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr class="empty-table-row"><td colspan="9">
                            <div class="table-empty-state">
                                <span aria-hidden="true">□</span>
                                <strong>Nenhum condutor cadastrado</strong>
                                <p>Comece adicionando o primeiro condutor.</p>
                                <a class="primary-button button-link" href="condutores.php?acao=cadastrar">Cadastrar condutor</a>
                            </div>
                        </td></tr>
                    {/if}
                </tbody>
            </table>
        </div>
        <div class="table-empty-search" id="nenhumCondutorEncontrado" hidden>
            Nenhum condutor corresponde à sua busca.
        </div>
    </div>
</section>

<div class="popup" id="popupExcluirCondutor" aria-hidden="true">
    <div class="popup__dialog" role="dialog" aria-modal="true" aria-labelledby="tituloExcluirCondutor">
        <button class="popup__close close-driver-popup" type="button" aria-label="Fechar">×</button>
        <span class="popup__icon popup__icon--danger" aria-hidden="true">!</span>
        <h3 id="tituloExcluirCondutor">Excluir condutor?</h3>
        <p>O cadastro de <strong id="nomeCondutorExcluir"></strong> será removido e o acesso ao aplicativo ficará offline.</p>
        <form method="post" class="popup__actions">
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape}">
            <input type="hidden" name="operacao" value="excluir">
            <input type="hidden" name="con_id" id="idCondutorExcluir" value="">
            <button class="secondary-button close-driver-popup" type="button">Cancelar</button>
            <button class="danger-button" type="submit">Sim, excluir</button>
        </form>
    </div>
</div>
