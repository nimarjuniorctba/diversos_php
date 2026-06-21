<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Base de painel administrativo com menu lateral em Smarty">
    <title>{$titulo_pagina|escape} | {$nome_sistema|escape}</title>
    <link rel="stylesheet" href="assets/css/app.css">

    {* Biblioteca externa disponível para todas as páginas. *}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>

    {* Scripts globais: carregados em todas as páginas do sistema. *}
    <script src="assets/js/common.js" defer></script>
    <script src="assets/js/core/menu.js" defer></script>

    {* Script exclusivo desta página. Em outra tela, troque este arquivo. *}
    <script src="assets/js/pages/componentes.js" defer></script>
</head>
{*
    O menu começa recolhido para liberar mais espaço ao conteúdo.
    O JavaScript respeita a preferência salva pelo usuário.
*}
<body class="menu-collapsed">
    <div class="app-shell" id="appShell">
        {* O menu fica isolado para poder ser reutilizado em qualquer página. *}
        {include file="menu_lateral.tpl"}

        {* O conteúdo também é um template independente. *}
        <main class="main-content" id="conteudoPrincipal">
            {include file="componentes.tpl"}
        </main>
    </div>
</body>
</html>
