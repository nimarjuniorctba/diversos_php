<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

/*
 * PERSONALIZAÇÃO DO CABEÇALHO
 * Altere estas variáveis para trocar o nome e o logotipo do sistema.
 */
$tituloMenu = 'Ok MotoBoy Express';
$logoMenu = 'imagem/logo.png';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title><?= htmlspecialchars($tituloMenu, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="assets/css/mapa.css">
</head>
<body>
    <main class="app-shell">
        <div id="map" aria-label="Mapa com a localização dos condutores"></div>

        <!-- Cabeçalho principal: marca, filtros e opções rápidas do mapa. -->
        <header class="topbar">
            <div class="brand">
                <span class="brand-mark">
                    <img src="<?= htmlspecialchars($logoMenu, ENT_QUOTES, 'UTF-8') ?>"
                         alt="Logo <?= htmlspecialchars($tituloMenu, ENT_QUOTES, 'UTF-8') ?>"
                         onerror="this.hidden=true; this.nextElementSibling.hidden=false">
                    <span class="brand-fallback" aria-hidden="true" hidden>⌖</span>
                </span>
                <div>
                    <strong><?= htmlspecialchars($tituloMenu, ENT_QUOTES, 'UTF-8') ?></strong>
                    <small id="updateStatus">Carregando posições...</small>
                </div>
            </div>

            <div class="filters">
                <label class="field">
                    <span>Condutor</span>
                    <select id="driverFilter">
                        <option value="">Todos os condutores</option>
                    </select>
                </label>

                <label class="field">
                    <span>Período</span>
                    <select id="periodFilter">
                        <option value="hoje">Hoje</option>
                        <option value="ontem">Ontem</option>
                        <option value="semana">Esta semana</option>
                        <option value="mes">Este mês</option>
                    </select>
                </label>

                <label class="field">
                    <span>Status no app</span>
                    <select id="statusFilter">
                        <option value="">Todos</option>
                        <option value="a">Online</option>
                        <option value="i">Offline</option>
                    </select>
                </label>

                <label class="toggle">
                    <input type="checkbox" id="currentOnly">
                    <span class="toggle-track" aria-hidden="true"></span>
                    <span>Só posição atual</span>
                </label>

                <label class="toggle">
                    <input type="checkbox" id="hideDriverLabels">
                    <span class="toggle-track" aria-hidden="true"></span>
                    <span>Ocultar nomes</span>
                </label>

                <button type="button" id="refreshButton" class="refresh-button" title="Atualizar agora">
                    <span aria-hidden="true">↻</span>
                    Atualizar
                </button>
            </div>
        </header>

        <!-- Lista de condutores: pode ser recolhida para liberar espaço no mapa. -->
        <aside id="legend" class="legend collapsible-panel" aria-label="Etiquetas dos condutores" hidden>
            <div class="panel-heading">
                <strong>ETIQUETAS</strong>
                <button type="button" class="panel-collapse-button" id="legendCollapseButton"
                        aria-label="Minimizar etiquetas" aria-expanded="true"
                        title="Minimizar etiquetas">−</button>
            </div>
            <div id="legendItems" class="panel-content"></div>
        </aside>

        <!-- Indicadores inferiores: a seta abaixa e levanta todo o painel. -->
        <section class="stats collapsible-stats" aria-live="polite">
            <button type="button" class="stats-collapse-button" id="statsCollapseButton"
                    aria-label="Recolher indicadores" aria-expanded="true"
                    title="Recolher indicadores">⌄</button>
            <div class="stats-content">
                <div class="stat">
                    <span>Online agora</span>
                    <strong id="onlineCount" class="online-count">0</strong>
                </div>
                <div class="stat">
                    <span>Condutores no mapa</span>
                    <strong id="driverCount">0</strong>
                </div>
                <div class="stat">
                    <span>Distância aproximada</span>
                    <strong id="distanceTotal">0 km</strong>
                </div>
                <div class="stat">
                    <span>Pontos recebidos</span>
                    <strong id="pointCount">0</strong>
                </div>
                <div class="stat stat-wide">
                    <span>Último recebimento</span>
                    <strong id="lastReceived">—</strong>
                </div>
            </div>
        </section>

        <div id="errorMessage" class="error-message" role="alert" hidden></div>
    </main>

    <script>
        // Configurações compartilhadas pelos arquivos JavaScript do mapa.
        window.MAPA_CONFIG = Object.freeze({
            geoapifyKey: <?= json_encode(GEOAPIFY_API_KEY, JSON_UNESCAPED_SLASHES) ?>,
            refreshSeconds: <?= MAP_REFRESH_SECONDS ?>,
            driverIcon: <?= json_encode(DRIVER_ICON_PATH, JSON_UNESCAPED_SLASHES) ?>,
            dataUrl: 'api/dados_mapa.php',
            companiesUrl: 'api/empresas.php'
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="assets/js/mapa.js"></script>
    <script src="assets/js/empresas.js"></script>
</body>
</html>
