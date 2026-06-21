(() => {
    'use strict';

    const config = window.MAPA_CONFIG;
    const map = window.MAPA_APP?.map;
    if (!config || !map) return;

    // Camada independente com todos os marcadores de empresas.
    const companyLayer = L.layerGroup().addTo(map);
    const geocodeCacheKey = 'mapa_empresas_geocodificacao_v1';
    const $panel = $(`
        <aside class="company-list collapsible-panel" aria-label="Empresas no mapa" hidden>
            <div class="panel-heading">
                <strong>EMPRESAS</strong>
                <button type="button" class="panel-collapse-button"
                        aria-label="Minimizar empresas" aria-expanded="true"
                        title="Minimizar empresas">−</button>
            </div>
            <div class="company-list-items panel-content"></div>
        </aside>
    `).appendTo('.app-shell');
    const $items = $panel.find('.company-list-items');
    const $collapseButton = $panel.find('.panel-collapse-button');

    // Recolhe o painel lateral, mantendo somente seu título.
    $collapseButton.on('click', () => {
        const collapsed = $panel.toggleClass('is-collapsed').hasClass('is-collapsed');
        $collapseButton
            .text(collapsed ? '+' : '−')
            .attr('aria-expanded', String(!collapsed))
            .attr('aria-label', collapsed ? 'Expandir empresas' : 'Minimizar empresas')
            .attr('title', collapsed ? 'Expandir empresas' : 'Minimizar empresas');
    });

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value ?? '';
        return div.innerHTML;
    }

    function field(company, ...names) {
        for (const name of names) {
            if (company[name]) return company[name];
        }
        return '';
    }

    function whatsappUrl(number) {
        const digits = String(number || '').replace(/\D/g, '');
        if (!digits) return '';
        const internationalNumber = digits.startsWith('55') ? digits : `55${digits}`;
        return `https://wa.me/${internationalNumber}`;
    }

    // Guarda coordenadas já encontradas para evitar consultas repetidas.
    function loadCache() {
        try {
            return JSON.parse(localStorage.getItem(geocodeCacheKey) || '{}');
        } catch {
            return {};
        }
    }

    function saveCache(cache) {
        try {
            localStorage.setItem(geocodeCacheKey, JSON.stringify(cache));
        } catch {
            // O mapa continua funcionando mesmo se o armazenamento estiver indisponível.
        }
    }

    function geocodeAddress(address, cache) {
        if (cache[address]) {
            return Promise.resolve(cache[address]);
        }

        return $.ajax({
            url: 'https://api.geoapify.com/v1/geocode/search',
            method: 'GET',
            dataType: 'json',
            data: {
                text: address,
                lang: 'pt',
                limit: 1,
                filter: 'countrycode:br',
                apiKey: config.geoapifyKey
            }
        }).then((response) => {
            const coordinates = response.features?.[0]?.geometry?.coordinates;
            if (!coordinates) return null;

            const result = {
                latitude: Number(coordinates[1]),
                longitude: Number(coordinates[0])
            };
            cache[address] = result;
            saveCache(cache);
            return result;
        });
    }

    // Monta o marcador amarelo e a etiqueta com o nome da empresa.
    function createCompanyIcon(company) {
        const name = field(company, 'nome') || 'Empresa';
        return L.divIcon({
            className: 'company-div-icon',
            html: `
                <div class="company-marker">
                    <span class="company-marker-icon" aria-hidden="true">🏪</span>
                    <strong>${escapeHtml(name)}</strong>
                </div>
            `,
            iconSize: [230, 48],
            iconAnchor: [22, 44]
        });
    }

    // Monta as informações exibidas ao clicar em uma empresa.
    function popupContent(company) {
        const name = field(company, 'nome') || 'Empresa';
        const whatsapp = field(company, 'whatsapp');
        const whatsappLink = whatsappUrl(whatsapp);
        const entries = [
            ['Código', field(company, 'codigo')],
            ['Ramo', field(company, 'ramo')],
            ['Responsável', field(company, 'responsavel')],
            ['Telefone', field(company, 'telefone')],
            ['WhatsApp', whatsapp],
            ['E-mail', field(company, 'email')],
            ['Endereço', field(company, 'endereco')],
            ['Condutores', field(company, 'condutores')],
            ['Plano', field(company, 'plano')]
        ].filter(([, value]) => value);

        return `
            <div class="company-popup">
                <div class="company-popup-heading">
                    <span aria-hidden="true">🏪</span>
                    <strong>${escapeHtml(name)}</strong>
                </div>
                <dl>
                    ${entries.map(([label, value]) => `
                        <div>
                            <dt>${escapeHtml(label)}</dt>
                            <dd>${escapeHtml(value)}</dd>
                        </div>
                    `).join('')}
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

    // Adiciona a empresa ao mapa e também à lista lateral.
    function addCompany(company, coordinates) {
        const name = field(company, 'nome') || 'Empresa';
        const position = [coordinates.latitude, coordinates.longitude];
        const marker = L.marker(position, {
            icon: createCompanyIcon(company),
            zIndexOffset: 500
        }).bindPopup(popupContent(company), {
            maxWidth: 360,
            className: 'company-popup-container'
        }).addTo(companyLayer);

        $('<button>', {
            type: 'button',
            class: 'company-list-item',
            html: `
                <span aria-hidden="true">🏪</span>
                <span>
                    <strong>${escapeHtml(name)}</strong>
                    <small>${escapeHtml(field(company, 'ramo') || field(company, 'endereco'))}</small>
                </span>
            `
        }).on('click', () => {
            map.flyTo(position, Math.max(map.getZoom(), 16));
            marker.openPopup();
        }).appendTo($items);
    }

    // Carrega as empresas, localiza os endereços e monta o painel.
    function loadCompanies() {
        const cache = loadCache();

        $.ajax({
            url: config.companiesUrl,
            method: 'GET',
            dataType: 'json',
            cache: false
        }).done((data) => {
            if (!data.ok || !Array.isArray(data.empresas)) return;

            const jobs = data.empresas.map((company) => {
                const address = field(company, 'endereco');
                if (!address) return Promise.resolve();

                return geocodeAddress(address, cache)
                    .then((coordinates) => {
                        if (coordinates) addCompany(company, coordinates);
                    })
                    .catch(() => {
                        console.warn(`Não foi possível localizar a empresa: ${field(company, 'nome') || address}`);
                    });
            });

            Promise.allSettled(jobs).then(() => {
                $panel.prop('hidden', $items.children().length === 0);
            });
        });
    }

    loadCompanies();
})();
