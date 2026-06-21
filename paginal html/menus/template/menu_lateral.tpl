{*
    MENU LATERAL REUTILIZÁVEL
    -------------------------
    Os itens são recebidos pela variável $menu_itens, definida no PHP.
    Evite escrever links diretamente aqui: assim o mesmo template pode
    montar menus diferentes conforme o usuário ou o projeto.

    Estados controlados pelo JavaScript:
    - body.menu-collapsed: menu estreito no computador;
    - body.menu-mobile-open: menu aberto em telas pequenas;
    - .is-open: submenu expandido.
*}

{* Fundo escuro exibido atrás do menu em celulares. *}
<button
    class="menu-overlay"
    id="menuOverlay"
    type="button"
    aria-label="Fechar menu"
    tabindex="-1">
</button>

<aside class="sidebar" id="sidebar" aria-label="Menu principal">
    <div class="sidebar__header">
        <a class="brand" href="index.php" aria-label="Ir para a página inicial">
            {* Logo principal. Troque apenas o caminho abaixo em outros projetos. *}
            <span class="brand__mark" aria-hidden="true">
                <img src="imagens/logo/logo.png" alt="">
            </span>
            <span class="brand__text">{$nome_sistema|escape}</span>
        </a>

        {* No computador, alterna entre 280px e 88px. *}
        <button
            class="icon-button sidebar__collapse"
            id="menuCollapseButton"
            type="button"
            aria-label="Expandir menu"
            aria-expanded="false"
            aria-controls="sidebar">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </button>

        {* Em celulares, este botão fecha o painel. *}
        <button
            class="icon-button sidebar__close"
            id="menuCloseButton"
            type="button"
            aria-label="Fechar menu">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18 6 6 18M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="sidebar__body">
        <nav>
            <ul class="menu-list">
                {foreach $menu_itens as $item}
                    {$tem_filhos = isset($item.filhos) && count($item.filhos) > 0}
                    <li class="menu-item{if !empty($item.ativo)} is-active is-open{/if}">
                        {if $tem_filhos}
                            {* Um item com filhos vira botão e abre seu submenu. *}
                            <button
                                class="menu-link submenu-toggle"
                                type="button"
                                aria-expanded="{if !empty($item.ativo)}true{else}false{/if}">
                                <span class="menu-link__icon" aria-hidden="true">
                                    {include file="menu_icone.tpl" icone=$item.icone}
                                </span>
                                <span class="menu-link__label">{$item.titulo|escape}</span>
                                {if !empty($item.badge)}
                                    <span class="menu-link__badge{if !empty($item.badge_classe)} {$item.badge_classe|escape}{/if}">{$item.badge|escape}</span>
                                {/if}
                                <svg class="menu-link__arrow" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </button>

                            <ul class="submenu">
                                {foreach $item.filhos as $filho}
                                    <li{if !empty($filho.oculto)} style="display:none;"{/if}>
                                        <a class="submenu__link{if !empty($filho.ativo)} is-active{/if}" href="{$filho.url|escape}">
                                            <span aria-hidden="true"></span>
                                            {$filho.titulo|escape}
                                        </a>
                                    </li>
                                {/foreach}
                            </ul>
                        {else}
                            <a class="menu-link" href="{$item.url|escape}">
                                <span class="menu-link__icon" aria-hidden="true">
                                    {include file="menu_icone.tpl" icone=$item.icone}
                                </span>
                                <span class="menu-link__label">{$item.titulo|escape}</span>
                                {if !empty($item.badge)}
                                    <span class="menu-link__badge{if !empty($item.badge_classe)} {$item.badge_classe|escape}{/if}">{$item.badge|escape}</span>
                                {/if}
                            </a>
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </nav>
    </div>

    <div class="sidebar__footer">
        <div class="user-card">
            <span class="user-card__avatar" aria-hidden="true">UE</span>
            <span class="user-card__info">
                <strong>{$nome_usuario|escape}</strong>
                <small>{$cargo_usuario|escape}</small>
            </span>
            <button class="user-card__more" type="button" aria-label="Opções do usuário">•••</button>
        </div>
    </div>
</aside>
