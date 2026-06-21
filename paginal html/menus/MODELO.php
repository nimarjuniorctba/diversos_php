<?php
/**
 * MODELO BASE DAS PÁGINAS
 * =======================
 * Os controladores podem definir as variáveis abaixo antes de incluir
 * este arquivo. Quando não definidas, a página de componentes é exibida.
 */

if (!isset($smarty)) {
    require_once __DIR__ . '/smarty/libs/Smarty.class.php';
    $smarty = new Smarty();
}

$smarty->setTemplateDir(__DIR__ . '/template');
$smarty->setCompileDir(__DIR__ . '/templates_c');

$titulo_pagina = $titulo_pagina ?? 'Painel administrativo';
$conteudo_template = $conteudo_template ?? 'componentes.tpl';
$pagina_script = $pagina_script ?? 'assets/js/pages/componentes.js';
$menu_ativo = $menu_ativo ?? 'dashboard';
$nome_usuario = $nome_usuario ?? ($session->getValor('USUARIO_SESSAO') ?: 'Usuário de exemplo');
$cargo_usuario = $cargo_usuario ?? 'Administrador';

$menu_itens = [
    [
        'chave' => 'componentes',
        'titulo' => 'Dashboard',
        'url' => 'index.php',
        'icone' => 'home',
        'ativo' => $menu_ativo === 'dashboard',
    ],
    [
        'chave' => 'rastreamento',
        'titulo' => 'Rastreamento',
        'url' => 'rastreamento.php',
        'icone' => 'location',
        'ativo' => $menu_ativo === 'rastreamento',
    ],
    [
        'chave' => 'cadastros',
        'titulo' => 'Módulos',
        'url' => '#',
        'icone' => 'users',
        'ativo' => in_array($menu_ativo, ['clientes', 'condutores', 'empresas', 'empresa_admin'], true),
        'filhos' => [
            [
                'titulo' => 'Clientes',
                'url' => 'clientes.php',
                'ativo' => $menu_ativo === 'clientes',
                'oculto' => true,
            ],
            [
                'titulo' => 'Condutor',
                'url' => 'condutores.php',
                'ativo' => $menu_ativo === 'condutores',
            ],
            [
                'titulo' => 'Empresas',
                'url' => 'empresas.php',
                'ativo' => $menu_ativo === 'empresas',
            ],
            [
                'titulo' => 'Usuários das empresas',
                'url' => 'empresa_admin.php',
                'ativo' => $menu_ativo === 'empresa_admin',
            ],
        ],
    ],
    [
        'chave' => 'pedidos',
        'titulo' => 'Pedidos',
        'url' => '#pedidos',
        'icone' => 'bag',
        'badge' => 'Próxima versão',
        'badge_classe' => 'menu-link__badge--future',
        'ativo' => $menu_ativo === 'pedidos',
    ],
    [
        'chave' => 'financeiro',
        'titulo' => 'Financeiro',
        'url' => '#',
        'icone' => 'wallet',
        'ativo' => $menu_ativo === 'financeiro',
        'badge' => 'Próxima versão',
        'badge_classe' => 'menu-link__badge--future',
        'filhos' => [
            ['titulo' => 'Contas a pagar', 'url' => '#contas-pagar', 'ativo' => false],
            ['titulo' => 'Contas a receber', 'url' => '#contas-receber', 'ativo' => false],
            ['titulo' => 'Fluxo de caixa', 'url' => '#fluxo-caixa', 'ativo' => false],
        ],
    ],
    [
        'chave' => 'relatorios',
        'titulo' => 'Relatórios',
        'url' => '#',
        'icone' => 'chart',
        'ativo' => $menu_ativo === 'relatorio_condutores',
        'filhos' => [
            [
                'titulo' => 'Condutores',
                'url' => 'relatorio_condutores.php',
                'ativo' => $menu_ativo === 'relatorio_condutores',
            ],
        ],
    ],
    [
        'chave' => 'configuracoes',
        'titulo' => 'Configurações',
        'url' => '#',
        'icone' => 'settings',
        'ativo' => in_array($menu_ativo, ['administradores', 'meus_dados', 'logs_rastreamento'], true),
        'filhos' => [
            [
                'titulo' => 'Usuários',
                'url' => 'administradores.php',
                'ativo' => $menu_ativo === 'administradores',
            ],
            [
                'titulo' => 'Meus dados',
                'url' => 'meus_dados.php',
                'ativo' => $menu_ativo === 'meus_dados',
            ],
            [
                'titulo' => 'Logs de rastreamento',
                'url' => 'logs_rastreamento.php',
                'ativo' => $menu_ativo === 'logs_rastreamento',
            ],
        ],
    ],
];

$smarty->assign([
    'titulo_pagina' => $titulo_pagina,
    'nome_sistema' => 'OK MotoBoy Express',
    'iniciais_sistema' => 'OK',
    'nome_usuario' => $nome_usuario,
    'cargo_usuario' => $cargo_usuario,
    'ano_atual' => date('Y'),
    'menu_itens' => $menu_itens,
    'menu_ativo' => $menu_ativo,
    'conteudo_template' => $conteudo_template,
    'pagina_script' => $pagina_script,
]);

$smarty->display('layout.tpl');
