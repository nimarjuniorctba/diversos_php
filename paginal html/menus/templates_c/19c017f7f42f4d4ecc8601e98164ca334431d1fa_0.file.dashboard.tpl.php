<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:52:23
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a361c87877235_43703933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19c017f7f42f4d4ecc8601e98164ca334431d1fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\dashboard.tpl',
      1 => 1781930696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a361c87877235_43703933 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div><p class="eyebrow">Visão operacional</p><h1>Dashboard</h1></div>
    <div class="topbar__actions"><a class="primary-button button-link" href="http://localhost/okmotoboyexpress/sistema.okmotoboyexpress.com.br/mapa/">Abrir rastreamento</a></div>
</header>
<section class="page-body dashboard-page">
    <div class="dashboard-welcome">
        <div><span class="status-pill">Operação em tempo real</span><h2>Olá, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_usuario']->value, ENT_QUOTES, 'UTF-8', true);?>
.</h2>
            <p>Acompanhe a equipe, os acessos ao aplicativo e o crescimento da operação.</p></div>
        <div class="dashboard-live"><i></i><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_online'];?>
</strong><span>condutores online</span></div>
    </div>
    <div class="dashboard-section-title"><div><p class="eyebrow">Equipe</p><h2>Condutores</h2></div><a href="condutores.php">Gerenciar condutores →</a></div>
    <div class="dashboard-metrics">
        <article><span>Total</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_total'];?>
</strong><small>cadastrados</small></article>
        <article class="metric-green"><span>Online</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_online'];?>
</strong><small>no aplicativo</small></article>
        <article><span>Offline</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_offline'];?>
</strong><small>fora do aplicativo</small></article>
        <article class="metric-green"><span>Ativos</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_ativos'];?>
</strong><small>cadastro liberado</small></article>
        <article class="metric-red"><span>Inativos</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_inativos'];?>
</strong><small>acesso bloqueado</small></article>
        <article><span>Hoje</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_hoje'];?>
</strong><small>novos cadastros</small></article>
        <article><span>Esta semana</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_semana'];?>
</strong><small>novos cadastros</small></article>
        <article><span>Este mês</span><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['condutores_mes'];?>
</strong><small>novos cadastros</small></article>
    </div>
    <div class="dashboard-grid">
        <article class="dashboard-panel"><div class="dashboard-section-title"><div><p class="eyebrow">Empresas</p><h2>Visão comercial</h2></div></div>
            <div class="dashboard-company-numbers"><div><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['empresas_total'];?>
</strong><span>empresas cadastradas</span></div><div><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['empresas_ativas'];?>
</strong><span>empresas ativas</span></div></div>
            <a class="secondary-button button-link" href="empresas.php">Abrir empresas</a></article>
        <article class="dashboard-panel"><div class="dashboard-section-title"><div><p class="eyebrow">Rastreamento</p><h2>Movimentação de hoje</h2></div></div>
            <div class="dashboard-highlight"><strong><?php echo $_smarty_tpl->tpl_vars['metricas']->value['pontos_hoje'];?>
</strong><span>pontos GPS recebidos</span></div>
            <a class="secondary-button button-link" href="logs_rastreamento.php">Consultar logs</a></article>
    </div>
    <div class="dashboard-section-title"><div><p class="eyebrow">Próximas atualizações</p><h2>Ideias para a evolução</h2></div></div>
    <div class="future-grid">
        <article><span>01</span><h3>Central de pedidos</h3><p>Receber pedidos dos clientes, calcular prioridade e encaminhar ao motoboy disponível.</p><button disabled>Em breve</button></article>
        <article><span>02</span><h3>Distribuição inteligente</h3><p>Sugerir o condutor mais próximo da coleta considerando localização e carga atual.</p><button disabled>Em breve</button></article>
        <article><span>03</span><h3>Indicadores de entrega</h3><p>Tempo médio, entregas concluídas, cancelamentos e desempenho por condutor.</p><button disabled>Em breve</button></article>
        <article><span>04</span><h3>Portal do cliente</h3><p>Acompanhamento do pedido, previsão de chegada e comprovante de entrega.</p><button disabled>Em breve</button></article>
    </div>
</section>
<?php }
}
