<header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button>
    <div><p class="eyebrow">Cadastros</p><h1>Empresas</h1></div>
    <div class="topbar__actions"><a class="primary-button button-link" href="empresas.php?acao=cadastrar">＋ Cadastrar empresa</a></div>
</header>
<section class="page-body clients-page">
    {if !empty($mensagem)}<div class="alert alert--{if $mensagem.tipo==='sucesso'}success{else}danger{/if} clients-message">
        <span class="alert__icon">{if $mensagem.tipo==='sucesso'}✓{else}×{/if}</span><div><strong>Empresas</strong><p>{$mensagem.texto|escape}</p></div></div>{/if}
    <div class="clients-summary"><div><p class="eyebrow">Empresas do sistema</p><h2>{$qte_registros} empresa{if $qte_registros!=1}s{/if}</h2>
        <p>Cadastros, validade da licença e situação de acesso.</p></div>
        <div class="clients-summary__icon">{include file="menu_icone.tpl" icone="bag"}</div></div>
    <div class="table-card clients-table-card">
        <div class="table-toolbar"><div class="search-field"><span>⌕</span><input id="buscarEmpresa" type="search" placeholder="Buscar empresa"></div>
            <span class="table-result-count" id="quantidadeEmpresas">{$qte_registros} registros</span></div>
        <div class="table-scroll"><table class="data-table clients-table companies-table" id="tabelaEmpresas">
            <thead><tr><th>ID</th><th>Tipo</th><th>Nome</th><th>CPF/CNPJ</th><th>E-mail</th><th>Cidade/UF</th><th>Validade</th><th>Status</th><th>Ações</th></tr></thead>
            <tbody>{if $qte_registros>0}{foreach $registros as $r}<tr class="company-row">
                <td data-label="ID"><strong class="client-id">#{$r.id_formatado}</strong></td><td data-label="Tipo"><span class="client-type">{$r.tipo}</span></td>
                <td data-label="Nome"><strong>{$r.nome|escape}</strong></td><td data-label="Documento">{$r.documento|escape}</td>
                <td data-label="E-mail">{$r.email|default:'—'|escape}</td><td data-label="Cidade/UF">{$r.cidade|default:'—'|escape}{if $r.estado}/{$r.estado|escape}{/if}</td>
                <td data-label="Validade">{$r.validade|date_format:"%d/%m/%Y"}</td>
                <td data-label="Status"><span class="badge badge--{if $r.status==='a'}success{else}neutral{/if}"><i></i>{$r.status_texto}</span></td>
                <td data-label="Ações"><div class="client-actions">
                    <a class="action-button action-button--edit" href="empresas.php?acao=editar&id={$r.id}"><svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/></svg></a>
                    <form method="post" class="inline-form"><input type="hidden" name="csrf_token" value="{$csrf_token}"><input type="hidden" name="operacao" value="status"><input type="hidden" name="emp_id" value="{$r.id}">
                        <input type="hidden" name="novo_status" value="{if $r.status==='a'}i{else}a{/if}"><button class="action-button action-button--status" type="submit"><svg viewBox="0 0 24 24"><path d="{if $r.status==='a'}M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10{else}m5 12 4 4L19 6{/if}"/></svg></button></form>
                    <button class="action-button action-button--delete delete-company" data-id="{$r.id}" data-name="{$r.nome|escape}" type="button"><svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/></svg></button>
                </div></td></tr>{/foreach}{else}<tr><td colspan="9"><div class="table-empty-state"><span>□</span><strong>Nenhuma empresa cadastrada</strong></div></td></tr>{/if}</tbody>
        </table></div><div class="table-empty-search" id="nenhumaEmpresa" hidden>Nenhuma empresa encontrada.</div>
    </div>
</section>
<div class="popup" id="popupExcluirEmpresa" aria-hidden="true"><div class="popup__dialog" role="dialog" aria-modal="true">
    <button class="popup__close close-company-popup" type="button">×</button><span class="popup__icon popup__icon--danger">!</span>
    <h3>Excluir empresa?</h3><p>A empresa <strong id="nomeEmpresaExcluir"></strong> será removida da listagem.</p>
    <form method="post" class="popup__actions"><input type="hidden" name="csrf_token" value="{$csrf_token}"><input type="hidden" name="operacao" value="excluir">
        <input type="hidden" name="emp_id" id="idEmpresaExcluir"><button class="secondary-button close-company-popup" type="button">Cancelar</button><button class="danger-button">Excluir</button></form>
</div></div>

