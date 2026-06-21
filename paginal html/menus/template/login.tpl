<!DOCTYPE html>
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
                {if !empty($mensagem)}<div class="login-error">{$mensagem|escape}</div>{/if}
                <div class="form-field"><label for="loginEmail">E-mail</label><input id="loginEmail" name="email" type="email" value="{$email|default:''|escape}" required autofocus></div>
                <div class="form-field"><label for="loginSenha">Senha</label><input id="loginSenha" name="senha" type="password" required></div>
                <label class="checkbox-field"><input type="checkbox"><span>Lembrar meu acesso neste dispositivo</span></label>
                <button class="primary-button login-submit" type="submit">Entrar no painel</button>
                <small>© {$ano_atual} OK MotoBoy Express</small>
            </form>
        </section>
    </main>
</body>
</html>
