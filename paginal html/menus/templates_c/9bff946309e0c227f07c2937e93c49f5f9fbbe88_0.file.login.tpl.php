<?php
/* Smarty version 4.1.0, created on 2026-06-20 02:48:05
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a36299540ac50_54822339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bff946309e0c227f07c2937e93c49f5f9fbbe88' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\login.tpl',
      1 => 1781934236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a36299540ac50_54822339 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | OK MotoBoy Express</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="login-body">
    <main class="login-shell">
        <section class="login-brand-panel">
            <img src="imagens/logo/logo.png" alt="OK MotoBoy Express">
            <div>
                <span class="status-pill">Gestão e rastreamento</span>
                <h1>Sua operação em movimento, no mesmo lugar.</h1>
                <p>Acompanhe condutores, trajetos, empresas e relatórios com clareza.</p>
            </div>
        </section>
        <section class="login-form-panel">
            <form method="post" class="login-form">
                <div class="login-mobile-logo"><img src="imagens/logo/logo.png" alt=""></div>
                <p class="eyebrow">Acesso administrativo</p>
                <h2>Bem-vindo de volta</h2>
                <p class="login-intro">Informe seus dados para entrar no painel.</p>
                <?php if (!empty($_smarty_tpl->tpl_vars['mensagem']->value)) {?><div class="login-error"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mensagem']->value, ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                <div class="form-field"><label for="loginEmail">E-mail</label><input id="loginEmail" name="email" type="email" value="<?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" required autofocus></div>
                <div class="form-field"><label for="loginSenha">Senha</label><input id="loginSenha" name="senha" type="password" required></div>
                <label class="checkbox-field"><input type="checkbox"><span>Lembrar meu acesso neste dispositivo</span></label>
                <button class="primary-button login-submit" type="submit">Entrar no painel</button>
                <small>© <?php echo $_smarty_tpl->tpl_vars['ano_atual']->value;?>
 OK MotoBoy Express</small>
            </form>
        </section>
    </main>
</body>
</html>
<?php }
}
