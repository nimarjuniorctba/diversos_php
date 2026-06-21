(() => {
    'use strict';

    const config = window.MAPA_CONFIG;
    // Paleta usada para diferenciar visualmente cada condutor e seu trajeto.
    const colors = [
        '#2563eb', '#dc2626', '#16a34a', '#9333ea', '#ea580c',
        '#0891b2', '#db2777', '#65a30d', '#4f46e5', '#ca8a04'
    ];

    const $elements = {
        driverFilter: $('#driverFilter'),
        periodFilter: $('#periodFilter'),
        statusFilter: $('#statusFilter'),
        currentOnly: $('#currentOnly'),
        hideDriverLabels: $('#hideDriverLabels'),
        refreshButton: $('#refreshButton'),
        updateStatus: $('#updateStatus'),
        errorMessage: $('#errorMessage'),
        legend: $('#legend'),
        legendCollapseButton: $('#legendCollapseButton'),
        legendItems: $('#legendItems'),
        stats: $('.stats'),
        statsCollapseButton: $('#statsCollapseButton'),
        onlineCount: $('#onlineCount'),
        driverCount: $('#driverCount'),
        distanceTotal: $('#distanceTotal'),
        pointCount: $('#pointCount'),
        lastReceived: $('#lastReceived')
    };

    const map = L.map('map', {
        zoomControl: false,
        preferCanvas: true
    }).setView([-23.5505, -46.6333], 12);
    window.MAPA_APP = Object.freeze({ map });

    L.control.zoom({ position: 'bottomright' }).addTo(map);

    L.tileLayer(
        `https://maps.geoapify.com/v1/tile/{mapStyle}/{z}/{x}/{y}.png?apiKey=${encodeURIComponent(config.geoapifyKey)}`,
        {
            mapStyle: 'osm-bright',
            maxZoom: 20,
            attribution: '© OpenStreetMap contributors © Geoapify'
        }
    ).addTo(map);

    const mapLayers = L.layerGroup().addTo(map);
    let ajaxRequest = null;
    let firstSuccessfulLoad = true;
    let refitOnNextLoad = true;
    let driverOptionsLoaded = false;
    let lastMapData = null;

    // Retorna sempre a mesma cor para um determinado ID de condutor.
    function colorFor(driverId) {
        const numericId = Number(driverId) || 0;
        return colors[Math.abs(numericId) % colors.length];
    }

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value ?? '';
        return div.innerHTML;
    }

    function formatDate(value) {
        if (!value) return '—';
        const normalized = value.includes('T') ? value : value.replace(' ', 'T');
        const date = new Date(normalized);
        if (Number.isNaN(date.getTime())) return value;
        return new Intl.DateTimeFormat('pt-BR', {
            dateStyle: 'short',
            timeStyle: 'medium'
        }).format(date);
    }

    function formatDistance(value) {
        return `${Number(value || 0).toLocaleString('pt-BR', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        })} km`;
    }

    function whatsappUrl(number) {
        const digits = String(number || '').replace(/\D/g, '');
        if (!digits) return '';
        const internationalNumber = digits.startsWith('55') ? digits : `55${digits}`;
        return `https://wa.me/${internationalNumber}`;
    }

    // Monta o ícone do motoboy e, se permitido, sua etiqueta com nome e placa.
    function createDriverIcon(driver, color) {
        const lastPoint = driver.ultima_posicao;
        const statusClass = driver.app_ativo ? 'is-online' : 'is-offline';
        const statusLabel = driver.app_ativo ? 'Online' : 'Offline';
        const hideLabel = $elements.hideDriverLabels.is(':checked');
        const html = `
            <div class="driver-marker ${statusClass}" style="--driver-color:${color}">
                <span class="driver-marker-icon">
                    <img src="${escapeHtml(config.driverIcon)}" alt="">
                    <i class="driver-status-dot" title="${statusLabel}"></i>
                </span>
                ${hideLabel ? '' : `<span class="driver-marker-label">
                    <strong>${escapeHtml(driver.nome)} <em>${statusLabel}</em></strong>
                    <small>${escapeHtml(driver.placa)} · ${escapeHtml(formatDate(lastPoint?.enviado_em))}</small>
                </span>`}
            </div>
        `;

        return L.divIcon({
            className: 'driver-div-icon',
            html,
            iconSize: hideLabel ? [52, 52] : [260, 52],
            iconAnchor: [25, 45]
        });
    }

    // Conteúdo exibido ao clicar no marcador de um condutor.
    function popupContent(driver, color) {
        const last = driver.ultima_posicao;
        const whatsappLink = whatsappUrl(driver.telefone);
        const speed = last?.velocidade === null || last?.velocidade === undefined
            ? 'Não informada'
            : `${Number(last.velocidade).toLocaleString('pt-BR', { maximumFractionDigits: 1 })} km/h`;

        return `
            <div class="driver-popup">
                <div class="popup-heading">
                    <span style="background:${color}"></span>
                    <strong>${escapeHtml(driver.nome)}</strong>
                </div>
                <dl>
                    <div><dt>Status</dt><dd class="${driver.app_ativo ? 'status-online' : 'status-offline'}">${driver.app_ativo ? 'Online' : 'Offline'}</dd></div>
                    <div><dt>Placa</dt><dd>${escapeHtml(driver.placa)}</dd></div>
                    <div><dt>Último envio</dt><dd>${escapeHtml(formatDate(last?.enviado_em))}</dd></div>
                    <div><dt>Velocidade</dt><dd>${escapeHtml(speed)}</dd></div>
                    <div><dt>Distância</dt><dd>${escapeHtml(formatDistance(driver.distancia_km))}</dd></div>
                    <div><dt>Pontos</dt><dd>${driver.pontos.length}</dd></div>
                </dl>
                ${whatsappLink ? `
                    <a class="whatsapp-button" href="${escapeHtml(whatsappLink)}"
                       target="_blank" rel="noopener noreferrer">
                        Abrir WhatsApp
                    </a>
                ` : ''}
            </div>
        `;
    }

    // Redesenha trajetos, marcadores, etiquetas, legenda e indicadores.
    function renderMap(data) {
        lastMapData = data;
        mapLayers.clearLayers();
        $elements.legendItems.empty();
        const bounds = [];
        const showOnlyCurrent = $elements.currentOnly.is(':checked');

        data.condutores.forEach((driver) => {
            if (!driver.ultima_posicao) return;

            const color = colorFor(driver.id);
            const points = driver.pontos.map((point) => [point.latitude, point.longitude]);
            const last = driver.ultima_posicao;

            if (!showOnlyCurrent && points.length > 1) {
                L.polyline(points, {
                    color,
                    weight: 5,
                    opacity: 0.85,
                    lineCap: 'round',
                    lineJoin: 'round'
                }).addTo(mapLayers);

                L.polyline(points, {
                    color: '#ffffff',
                    weight: 8,
                    opacity: 0.35,
                    lineCap: 'round',
                    lineJoin: 'round'
                }).bringToBack().addTo(mapLayers);
            }

            const marker = L.marker(
                [last.latitude, last.longitude],
                { icon: createDriverIcon(driver, color), zIndexOffset: 1000 }
            ).bindPopup(popupContent(driver, color), {
                maxWidth: 330,
                className: 'driver-popup-container'
            });

            marker.addTo(mapLayers);
            points.forEach((point) => bounds.push(point));

            const $item = $('<button>', {
                type: 'button',
                class: 'legend-item',
                html: `
                <span class="legend-color" style="background:${color}"></span>
                <span>${escapeHtml(driver.nome)}</span>
                <small><i class="legend-status ${driver.app_ativo ? 'is-online' : 'is-offline'}"></i>${driver.app_ativo ? 'Online' : 'Offline'} · ${escapeHtml(driver.placa)}</small>
                `
            }).on('click', () => {
                map.flyTo([last.latitude, last.longitude], Math.max(map.getZoom(), 15));
                marker.openPopup();
            });
            $elements.legendItems.append($item);
        });

        $elements.legend.prop('hidden', data.condutores.length === 0);
        $elements.onlineCount.text(data.resumo.online);
        $elements.driverCount.text(data.resumo.condutores);
        $elements.distanceTotal.text(formatDistance(data.resumo.distancia_km));
        $elements.pointCount.text(Number(data.resumo.pontos).toLocaleString('pt-BR'));
        $elements.lastReceived.text(formatDate(data.resumo.ultimo_recebimento));

        if (bounds.length && (firstSuccessfulLoad || refitOnNextLoad)) {
            map.fitBounds(bounds, {
                paddingTopLeft: [40, 120],
                paddingBottomRight: [40, 130],
                maxZoom: 16
            });
            firstSuccessfulLoad = false;
            refitOnNextLoad = false;
        }
    }

    // Atualiza o seletor de condutores usando os registros recebidos da API.
    function populateDrivers(drivers) {
        const selected = $elements.driverFilter.val();

        $elements.driverFilter.find('option:not(:first-child)').remove();
        drivers.forEach((driver) => {
            $elements.driverFilter.append(
                $('<option>', {
                    value: driver.id,
                    text: `${driver.nome} · ${driver.placa}`
                })
            );
        });
        if ($elements.driverFilter.find(`option[value="${selected}"]`).length) {
            $elements.driverFilter.val(selected);
        } else {
            $elements.driverFilter.val('');
        }
        driverOptionsLoaded = true;
    }

    function showError(message) {
        $elements.errorMessage.text(message).prop('hidden', false);
    }

    function hideError() {
        $elements.errorMessage.prop('hidden', true);
    }

    // Consulta a API de localizações e entrega os dados para renderMap().
    function loadLocations({ manual = false } = {}) {
        if (ajaxRequest) {
            ajaxRequest.abort();
        }

        $elements.refreshButton.prop('disabled', true).addClass('is-loading');
        $elements.updateStatus.text(manual ? 'Atualizando agora...' : 'Consultando posições...');

        const parametros = {
            periodo: $elements.periodFilter.val(),
            condutor: $elements.driverFilter.val(),
            status: $elements.statusFilter.val()
        };

        ajaxRequest = $.ajax({
            url: config.dataUrl,
            method: 'GET',
            dataType: 'json',
            cache: false,
            data: parametros
        })
            .done((data) => {
                if (!data.ok) {
                    showError(data.mensagem || 'Erro ao carregar as posições.');
                    return;
                }

                populateDrivers(data.condutores_disponiveis);

                renderMap(data);
                hideError();
                $elements.updateStatus.text(`Atualizado às ${new Intl.DateTimeFormat('pt-BR', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                }).format(new Date())}`);
            })
            .fail((xhr, status) => {
                if (status === 'abort') return;

                const message = xhr.responseJSON?.mensagem
                    || 'Não foi possível carregar as posições.';
                showError(message);
                $elements.updateStatus.text('Falha na atualização');
            })
            .always(() => {
                $elements.refreshButton.prop('disabled', false).removeClass('is-loading');
                ajaxRequest = null;
            });
    }

    $elements.driverFilter.on('change', () => {
        refitOnNextLoad = true;
        loadLocations({ manual: true });
    });
    $elements.periodFilter.on('change', () => {
        refitOnNextLoad = true;
        loadLocations({ manual: true });
    });
    $elements.statusFilter.on('change', () => {
        refitOnNextLoad = true;
        $elements.driverFilter.val('');
        loadLocations({ manual: true });
    });
    $elements.currentOnly.on('change', () => {
        loadLocations({ manual: true });
    });
    $elements.hideDriverLabels.on('change', () => {
        if (lastMapData) renderMap(lastMapData);
    });

    // Recolhe a lista lateral, mantendo somente o título "ETIQUETAS".
    $elements.legendCollapseButton.on('click', () => {
        const collapsed = $elements.legend.toggleClass('is-collapsed').hasClass('is-collapsed');
        $elements.legendCollapseButton
            .text(collapsed ? '+' : '−')
            .attr('aria-expanded', String(!collapsed))
            .attr('aria-label', collapsed ? 'Expandir etiquetas' : 'Minimizar etiquetas')
            .attr('title', collapsed ? 'Expandir etiquetas' : 'Minimizar etiquetas');
    });

    // Abaixa os indicadores; a seta permanece disponível para fazê-los subir.
    $elements.statsCollapseButton.on('click', () => {
        const collapsed = $elements.stats.toggleClass('is-collapsed').hasClass('is-collapsed');
        $elements.statsCollapseButton
            .text(collapsed ? '⌃' : '⌄')
            .attr('aria-expanded', String(!collapsed))
            .attr('aria-label', collapsed ? 'Mostrar indicadores' : 'Recolher indicadores')
            .attr('title', collapsed ? 'Mostrar indicadores' : 'Recolher indicadores');
    });

    $elements.refreshButton.on('click', () => loadLocations({ manual: true }));

    loadLocations();
    window.setInterval(loadLocations, Math.max(5, Number(config.refreshSeconds)) * 1000);
})();
