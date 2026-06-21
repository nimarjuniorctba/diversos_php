<?php
/**
 * PONTO DE ENTRADA DA APLICAÇÃO
 *
 * Este arquivo prepara os dados e entrega a renderização ao Smarty.
 * Em um projeto real, os itens abaixo podem vir do banco de dados,
 * das permissões do usuário ou de um arquivo de configuração.
 */

declare(strict_types=1);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/template');
$smarty->setCompileDir(__DIR__ . '/templates_c');

// Dados gerais da página.
$smarty->assign([
    'titulo_pagina' => 'Painel administrativo',
    'nome_sistema' => 'OK MotoBoy Express',
    'iniciais_sistema' => 'JR',
    'nome_usuario' => 'Usuário de exemplo',
    'cargo_usuario' => 'Administrador',
    'ano_atual' => date('Y'),
]);

/**
 * MENU LATERAL
 *
 * Campos disponíveis:
 * - titulo: texto mostrado no menu;
 * - url: destino do item;
 * - icone: nome do ícone usado pelo template;
 * - ativo: destaca a página atual;
 * - badge: texto opcional à direita;
 * - filhos: cria um submenu recolhível.
 */
$menu_itens = [
    [
        'titulo' => 'Componentes',
        'url' => '#componentes',
        'icone' => 'home',
        'ativo' => true,
    ],
    [
        'titulo' => 'Cadastros',
        'url' => '#',
        'icone' => 'users',
        'filhos' => [
            ['titulo' => 'Clientes', 'url' => '#clientes'],
            ['titulo' => 'Fornecedores', 'url' => '#fornecedores'],
            ['titulo' => 'Usuários', 'url' => '#usuarios'],
        ],
    ],
    [
        'titulo' => 'Pedidos',
        'url' => '#pedidos',
        'icone' => 'bag',
        'badge' => '12',
    ],
    [
        'titulo' => 'Financeiro',
        'url' => '#',
        'icone' => 'wallet',
        'filhos' => [
            ['titulo' => 'Contas a pagar', 'url' => '#contas-pagar'],
            ['titulo' => 'Contas a receber', 'url' => '#contas-receber'],
            ['titulo' => 'Fluxo de caixa', 'url' => '#fluxo-caixa'],
        ],
    ],
    [
        'titulo' => 'Relatórios',
        'url' => '#relatorios',
        'icone' => 'chart',
    ],
    [
        'titulo' => 'Configurações',
        'url' => '#configuracoes',
        'icone' => 'settings',
    ],
];

$smarty->assign('menu_itens', $menu_itens);
$smarty->display('layout.tpl');
