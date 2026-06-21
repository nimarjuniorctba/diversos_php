<?php
/* Smarty version 4.1.0, created on 2026-06-20 02:25:22
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\menu_lateral.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a362442ec1998_10904457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be53137ccf92ef3a5bc39e16a55b586e31d86442' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\menu_lateral.tpl',
      1 => 1781932868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_icone.tpl' => 2,
  ),
),false)) {
function content_6a362442ec1998_10904457 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
                        <span class="brand__mark" aria-hidden="true">
                <img src="imagens/logo/logo.png" alt="">
            </span>
            <span class="brand__text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_sistema']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
        </a>

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
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_itens']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('tem_filhos', (isset($_smarty_tpl->tpl_vars['item']->value['filhos'])) && count($_smarty_tpl->tpl_vars['item']->value['filhos']) > 0);?>
                    <li class="menu-item<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['ativo'])) {?> is-active is-open<?php }?>">
                        <?php if ($_smarty_tpl->tpl_vars['tem_filhos']->value) {?>
                                                        <button
                                class="menu-link submenu-toggle"
                                type="button"
                                aria-expanded="<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['ativo'])) {?>true<?php } else { ?>false<?php }?>">
                                <span class="menu-link__icon" aria-hidden="true">
                                    <?php $_smarty_tpl->_subTemplateRender("file:menu_icone.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icone'=>$_smarty_tpl->tpl_vars['item']->value['icone']), 0, true);
?>
                                </span>
                                <span class="menu-link__label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['titulo'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['badge'])) {?>
                                    <span class="menu-link__badge<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['badge_classe'])) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['badge_classe'], ENT_QUOTES, 'UTF-8', true);
}?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['badge'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php }?>
                                <svg class="menu-link__arrow" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </button>

                            <ul class="submenu">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['filhos'], 'filho');
$_smarty_tpl->tpl_vars['filho']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['filho']->value) {
$_smarty_tpl->tpl_vars['filho']->do_else = false;
?>
                                    <li<?php if (!empty($_smarty_tpl->tpl_vars['filho']->value['oculto'])) {?> style="display:none;"<?php }?>>
                                        <a class="submenu__link<?php if (!empty($_smarty_tpl->tpl_vars['filho']->value['ativo'])) {?> is-active<?php }?>" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filho']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <span aria-hidden="true"></span>
                                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filho']->value['titulo'], ENT_QUOTES, 'UTF-8', true);?>

                                        </a>
                                    </li>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php } else { ?>
                            <a class="menu-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <span class="menu-link__icon" aria-hidden="true">
                                    <?php $_smarty_tpl->_subTemplateRender("file:menu_icone.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icone'=>$_smarty_tpl->tpl_vars['item']->value['icone']), 0, true);
?>
                                </span>
                                <span class="menu-link__label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['titulo'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['badge'])) {?>
                                    <span class="menu-link__badge<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['badge_classe'])) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['badge_classe'], ENT_QUOTES, 'UTF-8', true);
}?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['badge'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php }?>
                            </a>
                        <?php }?>
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </nav>
    </div>

    <div class="sidebar__footer">
        <div class="user-card">
            <span class="user-card__avatar" aria-hidden="true">UE</span>
            <span class="user-card__info">
                <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_usuario']->value, ENT_QUOTES, 'UTF-8', true);?>
</strong>
                <small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cargo_usuario']->value, ENT_QUOTES, 'UTF-8', true);?>
</small>
            </span>
            <button class="user-card__more" type="button" aria-label="Opções do usuário">•••</button>
        </div>
    </div>
</aside>
<?php }
}
