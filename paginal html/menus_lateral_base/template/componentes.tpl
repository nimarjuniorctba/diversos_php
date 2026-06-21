{*
    CATÁLOGO DE COMPONENTES
    =======================
    Esta página funciona como uma referência visual do projeto.
    Cada componente possui uma demonstração e um bloco de código copiável.
*}
<header class="topbar">
    <button
        class="icon-button mobile-menu-button"
        id="mobileMenuButton"
        type="button"
        aria-label="Abrir menu"
        aria-expanded="false"
        aria-controls="sidebar">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div>
        <p class="eyebrow">Guia visual do projeto</p>
        <h1>Componentes</h1>
    </div>

    <div class="topbar__actions">
        <a class="topbar-link" href="#avisos">Avisos</a>
        <a class="topbar-link" href="#formularios">Formulários</a>
        <button class="primary-button" type="button">
            <span aria-hidden="true">＋</span>
            Nova entrega
        </button>
    </div>
</header>

<section class="page-body component-library" id="componentes">
    <div class="library-intro">
        <div>
            <span class="status-pill">Design system</span>
            <h2>Componentes prontos para reutilizar.</h2>
            <p>
                Use esta página como catálogo durante o desenvolvimento.
                Visualize o componente, copie o HTML e adapte os textos.
            </p>
        </div>
        <div class="library-intro__numbers" aria-label="Resumo da biblioteca">
            <div><strong>08</strong><span>categorias</span></div>
            <div><strong>100%</strong><span>responsivo</span></div>
        </div>
    </div>

    <nav class="component-index" aria-label="Índice de componentes">
        <a href="#avisos">Avisos</a>
        <a href="#botoes">Botões</a>
        <a href="#badges">Badges</a>
        <a href="#cards">Cards</a>
        <a href="#formularios">Formulários</a>
        <a href="#tabela">Tabela</a>
        <a href="#popups">Popups</a>
        <a href="#estado-vazio">Estado vazio</a>
    </nav>

    {* AVISOS ------------------------------------------------------------- *}
    <section class="component-section" id="avisos">
        <div class="component-section__heading">
            <div>
                <span>01</span>
                <h2>Avisos e mensagens</h2>
                <p>Feedback para sucesso, atenção, erro e informação.</p>
            </div>
        </div>

        <div class="component-demo">
            <div class="alert alert--success">
                <span class="alert__icon">✓</span>
                <div><strong>Entrega cadastrada!</strong><p>O motoboy já pode visualizar a nova solicitação.</p></div>
                <button type="button" aria-label="Fechar aviso">×</button>
            </div>
            <div class="alert alert--warning">
                <span class="alert__icon">!</span>
                <div><strong>Atenção ao endereço</strong><p>O número do local de entrega ainda não foi informado.</p></div>
                <button type="button" aria-label="Fechar aviso">×</button>
            </div>
            <div class="alert alert--danger">
                <span class="alert__icon">×</span>
                <div><strong>Não foi possível salvar</strong><p>Revise os campos destacados e tente novamente.</p></div>
                <button type="button" aria-label="Fechar aviso">×</button>
            </div>
            <div class="alert alert--info">
                <span class="alert__icon">i</span>
                <div><strong>Atualização disponível</strong><p>Existem novas informações para esta entrega.</p></div>
                <button type="button" aria-label="Fechar aviso">×</button>
            </div>
        </div>

        <div class="code-example">
            <div class="code-example__bar">
                <span>HTML — aviso de sucesso</span>
                <button class="copy-code-button" type="button">Copiar código</button>
            </div>
            <pre><code>&lt;div class="alert alert--success"&gt;
    &lt;span class="alert__icon"&gt;✓&lt;/span&gt;
    &lt;div&gt;
        &lt;strong&gt;Entrega cadastrada!&lt;/strong&gt;
        &lt;p&gt;A solicitação foi salva com sucesso.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
        </div>
    </section>

    {* BOTÕES E BADGES ---------------------------------------------------- *}
    <div class="component-columns">
        <section class="component-section" id="botoes">
            <div class="component-section__heading">
                <div>
                    <span>02</span>
                    <h2>Botões</h2>
                    <p>Ações principais e secundárias.</p>
                </div>
            </div>
            <div class="component-demo button-showcase">
                <button class="primary-button" type="button">Salvar entrega</button>
                <button class="secondary-button" type="button">Cancelar</button>
                <button class="danger-button" type="button">Excluir</button>
                <button class="text-button" type="button">Ver detalhes →</button>
                <button class="primary-button" type="button" disabled>Salvando...</button>
            </div>
            <div class="code-example">
                <div class="code-example__bar">
                    <span>HTML</span>
                    <button class="copy-code-button" type="button">Copiar código</button>
                </div>
                <pre><code>&lt;button class="primary-button" type="button"&gt;Salvar&lt;/button&gt;
&lt;button class="secondary-button" type="button"&gt;Cancelar&lt;/button&gt;
&lt;button class="danger-button" type="button"&gt;Excluir&lt;/button&gt;</code></pre>
            </div>
        </section>

        <section class="component-section" id="badges">
            <div class="component-section__heading">
                <div>
                    <span>03</span>
                    <h2>Badges e status</h2>
                    <p>Identificação rápida de estados.</p>
                </div>
            </div>
            <div class="component-demo badge-showcase">
                <span class="badge badge--success"><i></i>Concluída</span>
                <span class="badge badge--warning"><i></i>Aguardando</span>
                <span class="badge badge--danger"><i></i>Cancelada</span>
                <span class="badge badge--neutral"><i></i>Rascunho</span>
                <span class="badge badge--info"><i></i>Em rota</span>
            </div>
            <div class="code-example">
                <div class="code-example__bar">
                    <span>HTML</span>
                    <button class="copy-code-button" type="button">Copiar código</button>
                </div>
                <pre><code>&lt;span class="badge badge--success"&gt;
    &lt;i&gt;&lt;/i&gt; Concluída
&lt;/span&gt;</code></pre>
            </div>
        </section>
    </div>

    {* CARDS -------------------------------------------------------------- *}
    <section class="component-section" id="cards">
        <div class="component-section__heading">
            <div>
                <span>04</span>
                <h2>Caixas e cards</h2>
                <p>Fundos brancos para separar grupos de informações.</p>
            </div>
        </div>
        <div class="cards-showcase">
            <article class="metric-card">
                <div class="metric-card__top">
                    <span class="metric-icon">↗</span>
                    <span class="badge badge--success">+12,4%</span>
                </div>
                <p>Entregas no mês</p>
                <strong>1.248</strong>
                <small>138 a mais que no mês anterior</small>
            </article>

            <article class="delivery-card">
                <div class="delivery-card__header">
                    <div>
                        <span class="delivery-code">#ENT-2048</span>
                        <h3>Entrega para Centro</h3>
                    </div>
                    <span class="badge badge--info"><i></i>Em rota</span>
                </div>
                <div class="delivery-route">
                    <span></span>
                    <div><small>Coleta</small><strong>Av. Brasil, 1200</strong></div>
                    <span></span>
                    <div><small>Entrega</small><strong>Rua das Flores, 85</strong></div>
                </div>
                <div class="delivery-card__footer">
                    <span>Hoje, 14:30</span>
                    <button class="text-button" type="button">Abrir entrega →</button>
                </div>
            </article>
        </div>
        <div class="code-example">
            <div class="code-example__bar">
                <span>HTML — caixa branca padrão</span>
                <button class="copy-code-button" type="button">Copiar código</button>
            </div>
            <pre><code>&lt;article class="content-card"&gt;
    &lt;h3&gt;Título da caixa&lt;/h3&gt;
    &lt;p&gt;Conteúdo ou informações da seção.&lt;/p&gt;
&lt;/article&gt;</code></pre>
        </div>
    </section>

    {* FORMULÁRIO --------------------------------------------------------- *}
    <section class="component-section" id="formularios">
        <div class="component-section__heading">
            <div>
                <span>05</span>
                <h2>Formulários</h2>
                <p>Campos, seletores, textarea e estados de erro.</p>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card__header">
                <div>
                    <h3>Nova entrega</h3>
                    <p>Preencha os dados principais da solicitação.</p>
                </div>
                <span>Campos com * são obrigatórios</span>
            </div>
            <form class="sample-form">
                <div class="form-field">
                    <label for="cliente">Cliente *</label>
                    <input id="cliente" type="text" placeholder="Digite o nome do cliente">
                    <small>Use o nome cadastrado no sistema.</small>
                </div>
                <div class="form-field">
                    <label for="tipo">Tipo de serviço *</label>
                    <select id="tipo">
                        <option>Selecione uma opção</option>
                        <option>Entrega expressa</option>
                        <option>Entrega agendada</option>
                    </select>
                </div>
                <div class="form-field form-field--error">
                    <label for="telefone">Telefone *</label>
                    <input id="telefone" type="text" value="11">
                    <small>Informe um telefone válido com DDD.</small>
                </div>
                <div class="form-field form-field--full">
                    <label for="observacao">Observações</label>
                    <textarea id="observacao" rows="4" placeholder="Referência, cuidados com o pacote..."></textarea>
                </div>
                <label class="checkbox-field">
                    <input type="checkbox" checked>
                    <span>Notificar o cliente quando o motoboy sair para entrega</span>
                </label>
                <div class="form-actions">
                    <button class="secondary-button" type="button">Cancelar</button>
                    <button class="primary-button" type="button">Cadastrar entrega</button>
                </div>
            </form>
        </div>
        <div class="code-example">
            <div class="code-example__bar">
                <span>HTML — campo de formulário</span>
                <button class="copy-code-button" type="button">Copiar código</button>
            </div>
            <pre><code>&lt;div class="form-field"&gt;
    &lt;label for="cliente"&gt;Cliente *&lt;/label&gt;
    &lt;input id="cliente" type="text" placeholder="Nome do cliente"&gt;
    &lt;small&gt;Texto de ajuda opcional.&lt;/small&gt;
&lt;/div&gt;</code></pre>
        </div>
    </section>

    {* TABELA ------------------------------------------------------------- *}
    <section class="component-section" id="tabela">
        <div class="component-section__heading component-section__heading--action">
            <div>
                <span>06</span>
                <h2>Tabela de dados</h2>
                <p>Lista responsiva para cadastros e movimentações.</p>
            </div>
            <button class="secondary-button" type="button">Exportar CSV</button>
        </div>
        <div class="table-card">
            <div class="table-toolbar">
                <div class="search-field">
                    <span aria-hidden="true">⌕</span>
                    <input type="search" placeholder="Buscar entrega...">
                </div>
                <select aria-label="Filtrar por status">
                    <option>Todos os status</option>
                    <option>Em rota</option>
                    <option>Concluída</option>
                </select>
            </div>
            <div class="table-scroll">
                <table class="data-table">
                    <thead>
                        <tr><th>Código</th><th>Cliente</th><th>Destino</th><th>Status</th><th>Valor</th><th></th></tr>
                    </thead>
                    <tbody>
                        <tr><td><strong>#2048</strong></td><td>Mercado Avenida</td><td>Centro</td><td><span class="badge badge--info"><i></i>Em rota</span></td><td>R$ 28,00</td><td><button class="row-menu" type="button">•••</button></td></tr>
                        <tr><td><strong>#2047</strong></td><td>Farmácia Saúde</td><td>Jardins</td><td><span class="badge badge--success"><i></i>Concluída</span></td><td>R$ 19,50</td><td><button class="row-menu" type="button">•••</button></td></tr>
                        <tr><td><strong>#2046</strong></td><td>Loja Exemplo</td><td>Vila Nova</td><td><span class="badge badge--warning"><i></i>Aguardando</span></td><td>R$ 34,00</td><td><button class="row-menu" type="button">•••</button></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {* POPUPS ------------------------------------------------------------- *}
    <section class="component-section" id="popups">
        <div class="component-section__heading">
            <div>
                <span>07</span>
                <h2>Popups e caixas de confirmação</h2>
                <p>Exemplos funcionais em JavaScript puro e jQuery.</p>
            </div>
        </div>

        <div class="popup-showcase">
            <article class="popup-example-card">
                <span class="popup-example-card__label">JavaScript puro</span>
                <h3>Popup informativo</h3>
                <p>Abre uma janela sobre a página sem depender de bibliotecas.</p>
                <button
                    class="primary-button"
                    type="button"
                    data-popup-open="popupExemplo">
                    Abrir popup
                </button>
            </article>

            <article class="popup-example-card">
                <span class="popup-example-card__label">jQuery 3.7.1</span>
                <h3>Popup de confirmação</h3>
                <p>Exemplo para confirmar exclusões ou outras ações importantes.</p>
                <button
                    class="secondary-button"
                    id="abrirPopupJquery"
                    type="button">
                    Abrir com jQuery
                </button>
            </article>
        </div>

        <div class="code-example">
            <div class="code-example__bar">
                <span>HTML — botão e popup</span>
                <button class="copy-code-button" type="button">Copiar código</button>
            </div>
            <pre><code>&lt;button data-popup-open="meuPopup" type="button"&gt;
    Abrir popup
&lt;/button&gt;

&lt;div class="popup" id="meuPopup" aria-hidden="true"&gt;
    &lt;div class="popup__dialog" role="dialog" aria-modal="true"&gt;
        &lt;button class="popup__close" data-popup-close&gt;×&lt;/button&gt;
        &lt;h3&gt;Título do popup&lt;/h3&gt;
        &lt;p&gt;Conteúdo da mensagem.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
        </div>

        <div class="code-example">
            <div class="code-example__bar">
                <span>jQuery — abrir um popup</span>
                <button class="copy-code-button" type="button">Copiar código</button>
            </div>
            <pre><code>{literal}$('#botaoAbrir').on('click', function () {
    $('#meuPopup')
        .addClass('is-visible')
        .attr('aria-hidden', 'false');
});{/literal}</code></pre>
        </div>
    </section>

    {* ESTADO VAZIO ------------------------------------------------------- *}
    <section class="component-section" id="estado-vazio">
        <div class="component-section__heading">
            <div>
                <span>08</span>
                <h2>Estado vazio</h2>
                <p>Quando ainda não existem dados para mostrar.</p>
            </div>
        </div>
        <div class="empty-state">
            <div class="empty-state__icon" aria-hidden="true">□</div>
            <h3>Nenhuma entrega encontrada</h3>
            <p>Altere os filtros da busca ou cadastre uma nova entrega.</p>
            <button class="primary-button" type="button">＋ Nova entrega</button>
        </div>
    </section>

    {* Os popups ficam no fim do HTML e são exibidos pelo JavaScript. *}
    <div class="popup" id="popupExemplo" aria-hidden="true">
        <div
            class="popup__dialog"
            role="dialog"
            aria-modal="true"
            aria-labelledby="popupExemploTitulo">
            <button class="popup__close" type="button" data-popup-close aria-label="Fechar">×</button>
            <span class="popup__icon popup__icon--info" aria-hidden="true">i</span>
            <h3 id="popupExemploTitulo">Informação importante</h3>
            <p>Este popup foi aberto com JavaScript puro e pode ser fechado clicando fora ou pressionando Escape.</p>
            <div class="popup__actions">
                <button class="primary-button" type="button" data-popup-close>Entendi</button>
            </div>
        </div>
    </div>

    <div class="popup" id="popupJquery" aria-hidden="true">
        <div
            class="popup__dialog"
            role="dialog"
            aria-modal="true"
            aria-labelledby="popupJqueryTitulo">
            <button class="popup__close" type="button" data-popup-close aria-label="Fechar">×</button>
            <span class="popup__icon popup__icon--danger" aria-hidden="true">!</span>
            <h3 id="popupJqueryTitulo">Excluir esta entrega?</h3>
            <p>Esta ação é apenas uma demonstração e não apagará nenhum dado.</p>
            <div class="popup__actions">
                <button class="secondary-button" type="button" data-popup-close>Cancelar</button>
                <button class="danger-button" id="confirmarPopupJquery" type="button">Sim, excluir</button>
            </div>
        </div>
    </div>

    <div class="toast-message" id="mensagemPopup" role="status">
        Demonstração confirmada com jQuery.
    </div>

    <footer class="page-footer">
        <span>© {$ano_atual} {$nome_sistema|escape}</span>
        <span>Catálogo de componentes reutilizáveis</span>
    </footer>
</section>
